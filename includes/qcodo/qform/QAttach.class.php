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
			$this->TemporaryUploadPath = 'C:/xampp/htdocs/tracmor/uploads/attachments';
			$this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/common/QAttach.tpl.php';
			$this->DialogBoxCssClass = 'file_asset_dbox';
			$this->UploadText = QApplication::Translate('Upload');
			$this->CancelText = QApplication::Translate('Cancel');
			$this->btnUpload->Text = '<input type="button" class="button" value="Attach">';
			$this->DialogBoxHtml = '<h1>Upload a File</h1><p>Please select a file to upload.</p>';
			$this->DisplayStyle = QDisplayStyle::Inline;
			$this->EntityId = $intEntityId;
			$this->EntityQtypeId = $intEntityQtypeId;
		}
		
		public function dlgFileAsset_Upload() {
			parent::dlgFileAsset_Upload();
			
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