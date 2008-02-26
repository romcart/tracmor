<?php
/*
 * Copyright (c)  2006, Universal Diagnostic Solutions, Inc. 
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

	class QAttach extends QFileAssetBase {
		
		protected $intEntityId;
		protected $intEntityQtypeId;
		
		public function __construct($objParentObject, $strControlId = null, $intEntityQtypeId = null, $intEntityId = null) {
			parent::__construct($objParentObject, $strControlId);
			// Setup Default Properties
			$this->TemporaryUploadPath = __DOCROOT__ . __SUBDIRECTORY__ . '/uploads/attachments';
			$this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/common/QAttach.tpl.php';
			$this->DialogBoxCssClass = 'file_asset_dbox';
			$this->UploadText = QApplication::Translate('Upload');
			$this->CancelText = QApplication::Translate('Cancel');
			$this->btnUpload->Text = '<input type="button" class="button" value="Attach">';
			$this->DialogBoxHtml = '<h1>Upload a File</h1><p>Please select a file to upload.</p>';
			$this->DisplayStyle = QDisplayStyle::Inline;
			$this->EntityId = $intEntityId;
			$this->EntityQtypeId = $intEntityQtypeId;
			
			$this->dlgFileAsset->lblError->ForeColor = 'red';
			
			$this->dlgFileAsset->flcFileAsset = new QFileControlExt($this->dlgFileAsset);
			
			// This is appalling, but the best I could come up with
			// So I remove all of the actions that are created on btnUpload in QFileAssetBase
			// Then I add them back, but only after changing the src URI for the spinner gif. Gross.
			$this->dlgFileAsset->btnUpload->RemoveAllActions('onclick');
			$this->dlgFileAsset->btnUpload->AddAction(new QClickEvent(), new QToggleEnableAction($this->dlgFileAsset->btnUpload));
			$this->dlgFileAsset->btnUpload->AddAction(new QClickEvent(), new QToggleEnableAction($this->dlgFileAsset->btnCancel));
			$this->dlgFileAsset->objSpinner->Text = sprintf('<img src="%s/spinner_white.gif" width="14" height="14" alt="Please Wait..."/>', __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__);
			$this->dlgFileAsset->btnUpload->AddAction(new QClickEvent(), new QToggleDisplayAction($this->dlgFileAsset->objSpinner));
			$this->dlgFileAsset->btnUpload->AddAction(new QClickEvent(), new QServerControlAction($this->dlgFileAsset, 'btnUpload_Click'));
		}
		
		public function dlgFileAsset_Upload() {

			// This is from QFileAssetBase.class.php, with only adding a period to the regular expression below to allow for files like test.class.php
			// This will be reported to Mike Ho and hopefully put in the core.
			// File Not Uploaded
			if (!file_exists($this->dlgFileAsset->flcFileAsset->File) || !$this->dlgFileAsset->flcFileAsset->Size) {
				$this->dlgFileAsset->ShowError($this->strUnacceptableMessage);

			// File Has Incorrect MIME Type (only if an acceptiblemimearray is setup)
			} else if (is_array($this->strAcceptibleMimeArray) && (!array_key_exists($this->dlgFileAsset->flcFileAsset->Type, $this->strAcceptibleMimeArray))) {
				$this->dlgFileAsset->ShowError($this->strUnacceptableMessage);

			// File Successfully Uploaded
			} else {
				// Setup Filename, Base Filename and Extension
				$strFilename = $this->dlgFileAsset->flcFileAsset->FileName;
				$intPosition = strrpos($strFilename, '.');

				if (is_array($this->strAcceptibleMimeArray) && array_key_exists($this->dlgFileAsset->flcFileAsset->Type, $this->strAcceptibleMimeArray))
					$strExtension = $this->strAcceptibleMimeArray[$this->dlgFileAsset->flcFileAsset->Type];
				else {
					if ($intPosition) {
						$strExtension = substr($strFilename, $intPosition + 1);
						$strExtension = strtolower($strExtension);
						$strBaseFilename = substr($strFilename, 0, $intPosition);
					}
					else {
						$strExtension = null;
						$strBaseFilename = $strFilename;
					}
				}

				// Save the File in a slightly more permanent temporary location
				$strTempFilePath = $this->strTemporaryUploadPath . '/' . basename($this->dlgFileAsset->flcFileAsset->File) . rand(1000, 9999) . '.' . $strExtension;
				copy($this->dlgFileAsset->flcFileAsset->File, $strTempFilePath);
				$this->File = $strTempFilePath;

				// Cleanup and Save Filename
				$this->strFileName = preg_replace('/[^A-Z^a-z^0-9_\-.]/', '', $strBaseFilename);
				if ($strExtension) {
					$this->strFileName .= '.' . $strExtension;
				}

				// Hide the Dialog Box
				$this->dlgFileAsset->HideDialogBox();

				// Refresh Thyself
				$this->Refresh();
			}
			
			if (!file_exists($this->dlgFileAsset->flcFileAsset->File) || !$this->dlgFileAsset->flcFileAsset->Size) {
				if ($this->dlgFileAsset->flcFileAsset->Error == 1 || $this->dlgFileAsset->flcFileAsset->Error == 2) {
					$this->dlgFileAsset->ShowError("The filesize is too large. File must be under 10MB");
				}
				else {
					$this->dlgFileAsset->ShowError("That is an unacceptable file");
				}
			}
			else {
			
				$objAttachment = new Attachment();
				$objAttachment->EntityQtypeId = $this->intEntityQtypeId;
				$objAttachment->EntityId = $this->intEntityId;
				$objAttachment->Filename = $this->FileName;
				$arrPath = array_reverse(explode("\\", $this->File));
				if (count($arrPath) <= 1) {
					$arrPath = array_reverse(explode("/", $this->File));
				}
				$objAttachment->TmpFilename = $arrPath[0];
				$objAttachment->FileType = $this->dlgFileAsset->flcFileAsset->Type;
				$objAttachment->Path = $this->File;
				$objAttachment->Size = filesize($this->File);
				$objAttachment->Save();

				if (AWS_S3) {
					MoveToS3(__DOCROOT__ . __SUBDIRECTORY__ . '/uploads/attachments', $objAttachment->TmpFilename, $objAttachment->FileType, '/attachments');

					$objAttachment->Path = 'http://s3.amazonaws.com/' . AWS_BUCKET . '/attachments/' . $objAttachment->TmpFilename;
					$objAttachment->Save();
				}

				if ($this->objParentControl) {
					$this->objParentControl->pnlAttachments_Create();
				}
				else {
					$this->objForm->pnlAttachments_Create();
				}
			}
		}
		
		public function __get($strName) {
			switch ($strName) {
				case 'EntityQtypeId': return $this->intEntityQtypeId;
				case 'EntityId': return $this->intEntityId;
				
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
		
		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {
				case 'EntityQtypeId':
					try {
						return ($this->intEntityQtypeId = $mixValue);
					} catch (QCallerException $objExc) {						
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
					case 'EntityId':
					try {
						return ($this->intEntityId = $mixValue);
					} catch (QCallerException $objExc) {						
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
					default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
?>