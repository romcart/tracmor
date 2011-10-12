<?php
/*
 * Copyright (c)  2009, Tracmor, LLC
 *
 * This file is part of Tracmor.
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

	// Include prepend.inc to load Qcodo
	require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
	QApplication::Authenticate();

	class AdminIndexForm extends QForm {
		// Header Menu
		protected $ctlHeaderMenu;

		// Inputs
		protected $flaCompanyLogo;
		protected $txtMinAssetCode;
		protected $chkPortablePinRequired;
		protected $chkStrictCheckinPolicy;
		protected $pnlSaveNotification;
		protected $txtSearchResultsPerPage;

		// Buttons
		protected $btnSave;

		protected function Form_Create() {
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();

			// Create Inputs
			$this->flaCompanyLogo_Create();
			$this->txtMinAssetCode_Create();
			$this->chkPortablePinRequired_Create();
			//$this->chkStrictCheckinPolicy_Create();
			$this->txtSearchResultsPerPage_Create();

			// Create Buttons
			$this->btnSave_Create();

			// Create Panels
			$this->pnlSaveNotification_Create();
		}

		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}

		// Create and Setup the CompanyLogo QFileAsset control
		protected function flaCompanyLogo_Create() {
			$this->flaCompanyLogo = new QFileAsset($this);
			$this->flaCompanyLogo->TemporaryUploadPath = __TRACMOR_TMP__;
			$this->flaCompanyLogo->FileAssetType = QFileAssetType::Image;
			$this->flaCompanyLogo->CssClass = 'file_asset';
            $this->flaCompanyLogo->imgFileIcon->CssClass = 'file_asset_icon';
			$this->flaCompanyLogo->DialogBoxHtml = '<h1>Upload Company Logo</h1><p>Please select an image file to upload.</p>';

			if (!QApplication::$TracmorSettings->CompanyLogo) {
				$this->flaCompanyLogo->imgFileIcon->ImagePath = '../images/empty.gif';
			} else {
				if (AWS_S3) {
					$this->flaCompanyLogo->imgFileIcon->ImagePath = 'http://s3.amazonaws.com/' . AWS_BUCKET . '/images/' . QApplication::$TracmorSettings->CompanyLogo;
				} else {
					$this->flaCompanyLogo->imgFileIcon->ImagePath = '../images/' . QApplication::$TracmorSettings->CompanyLogo;
				}
			}
		}

		// Create and Setup the MinAssetCode Text Field
		protected function txtMinAssetCode_Create() {
			$this->txtMinAssetCode = new QTextBox($this);
			$this->txtMinAssetCode->Name = 'Minimum Asset Code';
			$this->txtMinAssetCode->Text = QApplication::$TracmorSettings->MinAssetCode;
			$this->txtMinAssetCode->Width = 64;
		}

		// Create and Setup the PortablePinRequired Checkbox
		protected function chkPortablePinRequired_Create() {
			$this->chkPortablePinRequired = new QCheckBox($this);
			$this->chkPortablePinRequired->Name = 'Portabl Pin Required';
			if (QApplication::$TracmorSettings->PortablePinRequired == '1') {
				$this->chkPortablePinRequired->Checked = true;
			}
			else {
				$this->chkPortablePinRequired->Checked = false;
			}
		}

		protected function chkStrictCheckinPolicy_Create() {
			$this->chkStrictCheckinPolicy = new QCheckBox($this);
			$this->chkStrictCheckinPolicy->Name = 'Strict Check-In Policy';
			if (QApplication::$TracmorSettings->StrictCheckinPolicy == '1') {
				$this->chkStrictCheckinPolicy->Checked = true;
			} else {
				$this->chkStrictCheckinPolicy->Checked = false;
			}
		}

		// Create and Setup the SearchResultsPerPage Text Field
		protected function txtSearchResultsPerPage_Create() {
			$this->txtSearchResultsPerPage = new QTextBox($this);
			$this->txtSearchResultsPerPage->Name = 'Search Results Per Page';
			$this->txtSearchResultsPerPage->Text = QApplication::$TracmorSettings->SearchResultsPerPage;
			$this->txtSearchResultsPerPage->Width = 64;
			if (QApplication::$TracmorSettings->SearchResultsPerPage) {
				$this->txtSearchResultsPerPage->Text = QApplication::$TracmorSettings->SearchResultsPerPage;
			}
		}

		// Create and Setup the Save Buttons
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CausesValidation = true;
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
		}

		// Create and Setup the Save Notification Panel
		protected function pnlSaveNotification_Create() {
			$this->pnlSaveNotification = new QPanel($this);
			$this->pnlSaveNotification->Name = 'Save Notification';
			$this->pnlSaveNotification->Text = 'Your settings have been saved';
			$this->pnlSaveNotification->CssClass="save_notification";
			$this->pnlSaveNotification->Display = false;
		}

		// Save button click action
		// Setting a TracmorSetting saves it to the database automagically because the __set() method has been altered
		protected function btnSave_Click() {
			$this->pnlSaveNotification->Display = false;
			QApplication::$TracmorSettings->MinAssetCode = $this->txtMinAssetCode->Text;

			// Make sure a valid number is entered for Search Results Per Page setting
			if (!is_numeric(trim($this->txtSearchResultsPerPage->Text)) || intval(trim($this->txtSearchResultsPerPage->Text)) < 1) {
				$this->txtSearchResultsPerPage->Warning = QApplication::Translate('Please enter a valid number');
				$this->txtSearchResultsPerPage->Blink();
				$this->txtSearchResultsPerPage->Focus();
				return;
			} else {
				QApplication::$TracmorSettings->SearchResultsPerPage = intval(trim($this->txtSearchResultsPerPage->Text));
			}

			// If a customer logo was uploaded, save it to the appropriate location
			if ($this->flaCompanyLogo->File) {
				$arrImageInfo = getimagesize($this->flaCompanyLogo->File);

				// Resize the image if necessary
				$strMimeType = image_type_to_mime_type($arrImageInfo[2]);
				$intSrcWidth = $arrImageInfo[0];
				$intSrcHeight = $arrImageInfo[1];

				if ($intSrcHeight > 50) {
					$intDstHeight = 50;
					$intDstWidth = round((50 / $intSrcHeight) * $intSrcWidth);
					$imgResampled = imagecreatetruecolor($intDstWidth, $intDstHeight);
					$strTransparentColor = imagecolorallocatealpha($imgResampled, 0, 0, 0, 127);
					imagealphablending($imgResampled, false);
					imagefilledrectangle($imgResampled, 0, 0, $intDstWidth, $intDstHeight, $strTransparentColor);
					imagealphablending($imgResampled, true);
					imagesavealpha($imgResampled, true);

					switch ($strMimeType) {
							case 'image/gif':
									$image = imageCreateFromGIF($this->flaCompanyLogo->File);
									break;
							case 'image/jpeg':
							case 'image/pjpeg':
						$image = imageCreateFromJPEG($this->flaCompanyLogo->File);
						break;
							case 'image/png':
							case 'image/x-png':
									$image = imageCreateFromPNG($this->flaCompanyLogo->File);
									break;
					}

					imagecopyresampled($imgResampled, $image, 0, 0, 0, 0, $intDstWidth, $intDstHeight, $intSrcWidth, $intSrcHeight);

					switch ($strMimeType) {
							case 'image/gif':
									imagegif($imgResampled, $this->flaCompanyLogo->File);
									break;
							case 'image/jpeg':
							case 'image/pjpeg':
									imagejpeg($imgResampled, $this->flaCompanyLogo->File);
						break;
							case 'image/png':
							case 'image/x-png':
									imagepng($imgResampled, $this->flaCompanyLogo->File);
									break;
					}
				}

				rename($this->flaCompanyLogo->File, '../images/' . $this->flaCompanyLogo->FileName);


				if (AWS_S3) {
					QApplication::MoveToS3(__DOCROOT__ . __IMAGE_ASSETS__, $this->flaCompanyLogo->FileName, $strMimeType, '/images');
				}

				// Save the setting to the database
				QApplication::$TracmorSettings->CompanyLogo = $this->flaCompanyLogo->FileName;
			}

			// We have to cast these to string because the admin_settings value column is TEXT, and checkboxes give boolean values
			QApplication::$TracmorSettings->PortablePinRequired = (string) $this->chkPortablePinRequired->Checked;
			//QApplication::$TracmorSettings->StrictCheckinPolicy = (string) $this->chkStrictCheckinPolicy->Checked;

			// Show saved notification
			$this->pnlSaveNotification->Display = true;
		}
	}

  	// Go ahead and run this form object to generate the page
	AdminIndexForm::Run('AdminIndexForm', 'index.tpl.php');
?>