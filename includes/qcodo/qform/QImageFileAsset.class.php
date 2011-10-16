<?php
	class QImageFileAsset extends QFileAsset {
		///////////////////////////
		// Private Member Variables
		///////////////////////////
	
		// MISC
		protected $strWebPath = null;
		protected $strThumbWebPath = null;
		protected $strUploadPath = null;
		protected $strThumbUploadPath = null;
		protected $boolBuildThumbs = false;
		protected $intThumbWidth = 240;
		protected $intThumbHeight = 240;
		protected $intThumbQuality = 60;
		protected $strThumbPrefix = null;
		protected $strPrefix = null;
		protected $strSuffix = null;
		protected $strFileMimeType;

		protected $strTemporaryUploadPath = __TRACMOR_TMP__;
		
		//////////
		// Methods
		//////////
		
		public function __construct($objParentObject, $strControlId = null) {
			parent::__construct($objParentObject, $strControlId);

			// Setup Default Properties
			$this->strTemplate = __QCODO_CORE__ . '/assets/QFileAsset.tpl.php';
			$this->DialogBoxCssClass = 'fileassetDbox';
			$this->UploadText = QApplication::Translate('Upload');
			$this->CancelText = QApplication::Translate('Cancel');
			$this->btnUpload->Text = '<img src="' . __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__ . '/add.png" alt="' . QApplication::Translate('Upload') . '" border="0"/> ' . QApplication::Translate('Upload');
			$this->btnDelete->Text = '<img src="' . __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__ . '/delete.png" alt="' . QApplication::Translate('Delete') . '" border="0"/> ' . QApplication::Translate('Delete');
			$this->DialogBoxHtml = '<h1>Upload a File</h1><p>Please select a file to upload.</p>';
		}
		
		/**
		 * Save the uploaded file to the file system
		 *
		 */
		public function ProcessUpload() {
			if($this->FileAssetType == QFileAssetType::Image) {
				copy($this->strFile, __DOCROOT__ . $this->strTemporaryUploadPath . '/' . $this->strUploadPath . $this->strFileName);
				@unlink($this->strFile);
				
				if ($this->boolBuildThumbs) {
				    $this->CreateThumbnail(  __DOCROOT__ . $this->strTemporaryUploadPath . '/' . $this->strUploadPath . $this->strFileName,
				                            $this->strThumbUploadPath.$this->strThumbPrefix.$this->strFileName,
				                            $this->intThumbWidth,
				                            $this->intThumbHeight,
				                            $this->intThumbQuality);
				}
			}
			if (AWS_S3) {
				QApplication::MoveToS3($this->strUploadPath, $this->strFileName, $this->strType, '/images/asset_models');
				if ($this->boolBuildThumbs) {
					if (file_exists($this->strThumbUploadPath.$this->strFileName)) {
						QApplication::MoveToS3($this->strThumbUploadPath, $this->strFileName, $this->strType, '/images/asset_models/thumbs');
					}
				}
			}
			
			$this->SetFile('');
		}
	
		/**
		 * Creates a thumbnail of the image passed and saves it to $thumbnail
		 * Thumbnail uses either width or height, whichever is larger in the original, and then maintains aspect ratio
		 *
		 * @param string $original path and filename of original/uploaded image
		 * @param string $thumbnail location to store thumbnail image
		 * @param integer $width
		 * @param integer $height
		 * @param integer $quality
		 */
		protected function CreateThumbnail ($original, $thumbnail, $width, $height, $quality) {
			list($width_orig, $height_orig) = getimagesize($original);
			if ($width && ($width_orig < $height_orig)) {
				$width = ($height / $height_orig) * $width_orig;
			}
			else {
		    $height = ($width / $width_orig) * $height_orig;
			}
			
			// thumbnail should not be bigger than original/actual image
			if ($width > $width_orig || $height > $height_orig) {
				$width = $width_orig;
				$height = $height_orig;
			}
			
			$image_p = imagecreatetruecolor($width, $height);

			// alpha transperancy
			$strTransparentColor = imagecolorallocatealpha($image_p, 0, 0, 0, 127);
			imagealphablending($image_p, false);
			imagefilledrectangle($image_p, 0, 0, $width, $height, $strTransparentColor);
			imagealphablending($image_p, true);
			imagesavealpha($image_p, true);
			
			switch ($this->strFileMimeType) {
				case 'image/gif':
					$image = imageCreateFromGIF($original);
					break;
				case 'image/jpeg':
				case 'image/pjpeg':
			    	$image = imageCreateFromJPEG($original);
			    break;
				case 'image/png':
				case 'image/x-png':
					$image = imageCreateFromPNG($original);
					break;
				case 'image/wbmp':
					$image = imageCreateFromWBMP($original) ;
					break;
			}
			
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			imagejpeg($image_p, $thumbnail, $quality);
		}
		
		/**
		 * Returns the HTML IMG tag to display with a link to a copy of the image
		 *
		 * @param string $strImagePath
		 * @return string $strToReturn An HTML image tag with link
		 */
		public function GetDisplayHtml($strImagePath, $targetWindow = "") {
			if ($strImagePath) {
				if (AWS_S3) {
					$href = 'http://s3.amazonaws.com/' . AWS_BUCKET . '/images/asset_models/' . $strImagePath;
					$src = 'http://s3.amazonaws.com/' . AWS_BUCKET . '/images/asset_models/thumbs/' . $strImagePath;
				}
				else {
					$href = $this->strWebPath . $strImagePath;
					$src = $this->strThumbWebPath . $this->strThumbPrefix . $strImagePath;
				}
				
				if ($targetWindow == "") {
					$strToReturn = sprintf('<a href="%s"><img src="%s" border="0" /></a>', $href, $src);
				}
				else {
					$strToReturn = sprintf('<a href="%s" target="%s"><img src="%s" border="0" /></a>', $href, $targetWindow, $src);
				}
				
			}
			else {
				$strToReturn = "";
			}
			return $strToReturn;
		}
		
		/**
		 * Deletes the image and thumbnail from the filesystem
		 *
		 * @param string $strImagePath path of the image as stored in the db
		 */
		public function Delete($strImagePath) {
			if ($strImagePath) {
				$filename = $this->strUploadPath.$strImagePath;
				if (is_file($filename)) {
					unlink($this->strUploadPath.$strImagePath);
				}
				else {
					// throw new Exception('File '.$filename.' does not exist to delete.');
				}
				$filename_thumb = $this->strThumbUploadPath.$this->strThumbPrefix.$strImagePath;
				if (is_file($filename_thumb)) {
					unlink($this->strThumbUploadPath.$this->strThumbPrefix.$strImagePath);
				}
				else {
					// throw new Exception('File '.$filename_thumb.' does not exist to delete.');
				}
			}
		}
	
		public function Validate() {
		
			// there is no error until we find one
			$returnValue = true;
			$this->strValidationError = "";
			
			if ($this->strFileName) {
				// Check the MIME type of the file
				if($this->FileAssetType != QFileAssetType::Image) {
					$this->strValidationError = sprintf("%s is not an image", $this->strFileName);
					return false;
				}
				// Check that there is only one period in the filename, separating name from extension
				$explosion = explode(".", $this->strFileName);

				if (count($explosion) != 2) {
					$this->strValidationError = "Please upload a well formed filename: xxxxx.xxx";
					return false;
				}
				/*$fileTemp = fopen($this->strFile, "r");
				$fileBinary = fread($fileTemp, filesize($this->strFile));*/
				if (!@getimagesize($this->strFile)) {
					$this->strValidationError = "That is not a valid image file.";
					return false;
				}
				// Check for jpg, jpeg, gif, or png extensions
				if ($explosion[count($explosion) -1] != "jpg" && $explosion[count($explosion) -1] != "JPG" && $explosion[count($explosion) -1] != "jpeg" && $explosion[count($explosion) -1] != "JPEG" && $explosion[count($explosion) -1] != "png" && $explosion[count($explosion) -1] != "PNG" && $explosion[count($explosion) -1] != "gif" && $explosion[count($explosion) -1] != "GIF") {
					$this->strValidationError = "Invalid file type. Image must be either .jpg, .gif, or .png";
					return false;
				}
			}
			// Only if it is a required field, check if it is empty.
			if ($this->blnRequired) {
				if (strlen($this->strFileName) < 0) {
					$this->strValidationError = sprintf("%s is required", $this->strName);
					$returnValue = false;
				}
			}			
			return $returnValue;
		}

		public function dlgFileAsset_Upload() {
			$this->strFileMimeType = $this->dlgFileAsset->flcFileAsset->Type;
			parent::dlgFileAsset_Upload();
		}
	
		public function GetControlHtml() {
			if (!empty($this->strFile)) {
				return sprintf('<div style="height: 85px;"><img src="../tmp/' . basename($this->strFile) . '" style="height: 85px"/></div>') . str_replace('<img ', '<img style="display: none;" ', parent::GetControlHtml());
			}
			else {
				return parent::GetControlHtml();
			} 
		}

		/////////////////////////
		// Public Properties: GET
		/////////////////////////
		public function __get($strName) {
			switch ($strName) {
				// MISC
				case "FileName": return $this->strFileName;
				case "Type": return $this->FileAssetType;
				case 'FileMimeType': return $this->strFileMimeType;
				case "Size": return $this->intSize;
				case "File": return $this->strFile;
				case "UploadPath": return $this->strUploadPath;
				case "WebPath": return $this->strWebPath;
				case "ThumbUploadPath": return $this->strThumbUploadPath;
				case "ThumbWebPath": return $this->strThumbWebPath;
				case "BuildThumbs": return $this->boolBuildThumbs;
				case "ThumbWidth": return $this->intThumbWidth;
				case "ThumbHeight": return $this->intThumbHeight;
				case "ThumbPrefix": return $this->strThumbPrefix;
				case "Prefix": return $this->strPrefix;
				case "Suffix": return $this->strSuffix;
				
				
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	
	/////////////////////////
	// Public Properties: SET
	/////////////////////////
	
	public function __set($strName, $mixValue) {
	    switch ($strName) {
	        case "FileName": $this->strFileName = $mixValue;
	        break;
	        case "Type": $this->FileAssetType = $mixValue;
	        break;
	        case "Size": $this->intSize = $mixValue;
	        break;
	        case "File": $this->strFile = $mixValue;
	        break;
	        case "UploadPath": $this->strUploadPath = $mixValue;
	        break;
	        case "WebPath": $this->strWebPath = $mixValue;
	        break;
	        case "ThumbUploadPath": $this->strThumbUploadPath = $mixValue;
	        break;
	        case "ThumbWebPath": $this->strThumbWebPath = $mixValue;
	        break;
	        case "BuildThumbs": $this->boolBuildThumbs = (bool) $mixValue;
	        break;
	        case "ThumbWidth": $this->intThumbWidth = (int) $mixValue;
	        break;
	        case "ThumbHeight": $this->intThumbHeight = (int) $mixValue;
	        break;
	        case "ThumbPrefix": $this->strThumbPrefix = $mixValue;
	        break;
	        case "Prefix": $this->strPrefix = $mixValue;
	        break;
	        case "Suffix": $this->strSuffix = $mixValue;
	        break;
	
	        default:
	            try {
	                parent::__set($strName, $mixValue);
	            } catch (QCallerException $objExc) {
	                $objExc->IncrementOffset();
	                throw $objExc;
	            }
	            break;
	    }
	}
		
}
?>