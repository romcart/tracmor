<?php
	class QImageControl extends QImageControlBase {
		// If you wish to set a cache for the generated images so that they
		// are not dynamically recreated every time, specify a default CacheFolder here.
		//
		// The Cache Folder is an absolute folder location relative to the root of the
		// qcodo application.  So for example, if you have the qcodo application installed
		// at /var/web/wwwroot/my_application, and if docroot is "/var/web/wwwroot" and if
		// you therefore have a subfolder defined as "/my_application", then if you specify
		// a CacheFolder of "/text_images", the following will happen:
		// * Cached images will be stored at /var/web/wwwroot/my_application/text_images/...
		// * Cached images will be accessed by <img src="/my_application/text_images/...">
		//
		// Remember: CacheFolder *must* have a leading "/" and no trailing "/", and also
		// be sure that the webserver process has WRITE access to the CacheFolder, itself.
		protected $strCacheFolder = __TRACMOR_TMP__;
		
		///////////////////////////////
		// Public Properties: SET
		//
		// Overriding base version to
		// add remote image support
		///////////////////////////////
		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {
				// APPEARANCE
				case "ScaleCanvasDown":
					try {
						$this->blnScaleCanvasDown = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "ScaleImageUp":
					try {
						$this->blnScaleImageUp = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				// BEHAVIOR
				case "ImageType":
					try {
						$this->strImageType = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "Quality":
					try {
						$this->intQuality = QType::Cast($mixValue, QType::Integer);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "CacheFolder":
					try {
						$this->strCacheFolder = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "CacheFilename":
					try {
						$this->strCacheFilename = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "ImagePath":
					try {
						$this->strImagePath = QType::Cast($mixValue, QType::String);
						
						if (!$this->strImagePath)
							throw new QCallerException('ImagePath is not defined');
						
						// Only do the file check if not a remote file
						if (!strpos($this->strImagePath, '://')) {
							if (!$this->strImagePath || !is_file($this->strImagePath))
								throw new QCallerException('ImagePath does not exist');
		
							$this->strImagePath = realpath($this->strImagePath);
						}

						$strSourceImageType = trim(strtolower(substr($this->strImagePath, strrpos($this->strImagePath, '.') + 1)));
						
						switch ($strSourceImageType) {
							case 'jpeg':
							case 'jpg':
								$this->strSourceImageType = QImageType::Jpeg;
								break;
							case 'png':
								$this->strSourceImageType = QImageType::Png;
								break;
							case 'gif':
								$this->strSourceImageType = QImageType::Gif;
								break;
							default:
								throw new QCallerException('Image Type cannot be determined: ' . $mixValue);
						}

						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "AlternateText":
					try {
						$this->strAlternateText = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				// OVERRIDDEN SETTERS
				case "BackColor":
					try {
						$mixValue = strtolower(QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

					if (strlen($mixValue) != 6)
						throw new QInvalidCastException('BackColor must be a 6-digit hexadecimal value');

					// Verify ControlId is only Hexadecimal Digits
					$strMatches = array();
					$strPattern = '/[a-f0-9]*/';
					preg_match($strPattern, $mixValue, $strMatches);
					if (count($strMatches) && ($strMatches[0] == $mixValue))
						return ($this->strBackColor = $mixValue);
					else
						throw new QInvalidCastException('BackColor must be a 6-digit hexadecimal value');

					break;

				case "Width":
					try {
						$this->strWidth = QType::Cast($mixValue, QType::Integer);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "Height":
					try {
						$this->strHeight = QType::Cast($mixValue, QType::Integer);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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
		
		public function RenderAsImgSrc($blnDisplayOutput = true) {
			// If not a visible control, then don't process anything
			if (!$this->blnVisible) return;

			// Ensure that the ImagePath is Valid (only if not a remote image)
			if (!strpos($this->strImagePath, '://')) {
				if (!$this->strImagePath || !file_exists($this->strImagePath))
					throw new QCallerException('ImagePath is not defined or does not exist');
			}
			// Serialize and Hash Data
			$strSerialized = $this->Serialize();
			$strHash = md5($strSerialized);

			// Figure Out Image Filename
			if ($this->strCacheFilename)
				$strImageFilename = $this->strCacheFilename;
			else if ($this->strImageType)
				$strImageFilename = $strHash . '.' . $this->strImageType;
			else
				$strImageFilename = $strHash . '.' . $this->strSourceImageType;

			// Figure out IMG SRC path based on Caching prefs
			if ($this->strCacheFolder) {
				$strFilePath = sprintf('%s%s/%s',
					__DOCROOT__,
					str_replace(__VIRTUAL_DIRECTORY__, '', $this->strCacheFolder),
					$strImageFilename);
				if (!file_exists($strFilePath))
					$this->RenderImage($strFilePath);

				$strPath = sprintf('%s/%s',
					$this->strCacheFolder,
					$strImageFilename);

				// Store Cache Filepath Info
				$this->strCachedActualFilePath = $strFilePath;
			} else {
				$strPath = sprintf('%s/_core/image.php/%s?q=%s',
					__VIRTUAL_DIRECTORY__ . __PHP_ASSETS__,
					$strImageFilename,
					$strSerialized
				);
			}

			// Output or Display
			if ($blnDisplayOutput)
				print($strPath);
			else
				return $strPath;
		}
	}
?>