<?php
	/**
	 * This class creates a panel that lists the attachments for any particular record.
	 * It will allow the user to download or delete any of the attachments.
	 *
	 */
	class QAttachments extends QPanel {
		
		protected $intAttachmentCount;
		protected $objAttachmentArray;
		protected $lblAttachments;
		protected $pnlAttachments;
		protected $arrAttachments;

		public function __construct($objParentObject, $strControlId = null, $intEntityQtypeId = null, $intEntityId = null) {
			parent::__construct($objParentObject, $strControlId);
			
			$this->intAttachmentCount = Attachment::CountByEntityQtypeIdEntityId($intEntityQtypeId, $intEntityId);
			if ($this->intAttachmentCount > 0) {
				$this->strTemplate = __DOCROOT__ .  __SUBDIRECTORY__ . '/common/QAttachments.tpl.php';
				
				$this->lblAttachments_Create();
				
				$this->pnlAttachments = new QPanel($this);
				$this->pnlAttachments->strTemplate = __DOCROOT__  . __SUBDIRECTORY__ . '/common/attachments.tpl.php';
				$this->pnlAttachments->Display = false;
				$this->objAttachmentArray = Attachment::LoadArrayByEntityQtypeIdEntityId($intEntityQtypeId, $intEntityId);
				$this->arrAttachments = array();
				foreach ($this->objAttachmentArray as $key => $objAttachment) {
					
					$strAttachment = sprintf('<a href="http://localhost/tracmor/includes/php/download.php?tmp_filename=%s&attachment_id=%s" target="_blank">%s</a> (%s bytes) %s by %s  ', $objAttachment->TmpFilename, $objAttachment->AttachmentId, $objAttachment->Filename, $objAttachment->Size, $objAttachment->CreationDate, $objAttachment->CreatedByObject->__toStringFullName());
					
					$lblDelete = new QLabel($this->pnlAttachments);
					$lblDelete->Text = 'Delete<br/>';
					$lblDelete->ForeColor = 'gray';
					$lblDelete->FontUnderline = true;
					$lblDelete->SetCustomStyle('cursor', 'pointer');
					$lblDelete->HtmlEntities = false;
					$lblDelete->ActionParameter = $objAttachment->AttachmentId;
					$lblDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you sure you want to delete this attachment?'));
					$lblDelete->AddAction(new QClickEvent(), new QServerControlAction($this, 'lblDelete_Click'));
					QApplication::AuthorizeControl($objAttachment, $lblDelete, 3);
					
					$this->arrAttachments[$key]['strAttachment'] = $strAttachment;
					$this->arrAttachments[$key]['lblDelete'] = $lblDelete;
				}
			}
			else {
				$this->Display = false;
			}
		}
		
		protected function lblAttachments_Create() {
			$this->lblAttachments = new QLabel($this);
			if ($this->intAttachmentCount == 1) {
				$this->lblAttachments->Text = sprintf('%s Attachment', $this->intAttachmentCount);
			}
			else {
				$this->lblAttachments->Text = sprintf('%s Attachments', $this->intAttachmentCount);
			}
			$this->lblAttachments->ForeColor = 'gray';
			$this->lblAttachments->FontUnderline = true;
			$this->lblAttachments->FontBold = true;
			$this->lblAttachments->SetCustomStyle('cursor', 'pointer');
			$this->lblAttachments->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'lblAttachments_Click'));
		}
		
		public function lblAttachments_Click($strFormId, $strControlId, $strParameter) {
			if ($this->pnlAttachments->Display) {
				$this->pnlAttachments->Display = false;
				$this->lblAttachments->Text = sprintf('%s Attachments', $this->intAttachmentCount);
			}
			else {
				$this->pnlAttachments->Display = true;
				$this->lblAttachments->Text = 'Hide Attachments';
			}
		}
		
		public function lblDelete_Click($strFormId, $strControlId, $strParameter) {
			$objAttachment = Attachment::Load($strParameter);
			if (AWS_S3) {
				require( __DOCROOT__ . __PHP_ASSETS__ . '/s3.class.php');
				$objS3 = new S3();
				$objS3->deleteObject('attachments/' . $objAttachment->TmpFilename, AWS_BUCKET);
			}
			else {
				if (file_exists($objAttachment->Path)) {
					unlink($objAttachment->Path);
				}
			}
			$objAttachment->Delete();
			if ($this->objParentControl) {
				$this->objParentControl->pnlAttachments_Create();
			}
			else {
				$this->objForm->pnlAttachments_Create();
			}
		}

		public function GetControlHtml() {
/*			if ($this->objFileAsset) {
				$this->strCssClass = 'FileAssetPanelItem';
				$this->SetCustomStyle('background', 'url(' . $this->objFileAsset->ThumbnailUrl() . ') no-repeat');
			} else {
				$this->strCssClass = 'FileAssetPanelItemNone';
				$this->SetCustomStyle('background', null);
			}*/
			return parent::GetControlHtml();
		}

		public function __get($strName) {
			switch ($strName) {
				case 'objAttachmentArray': return $this->objAttachmentArray;
				case 'lblAttachments': return $this->lblAttachments;
				case 'pnlAttachments': return $this->pnlAttachments;
				case 'arrAttachments': return $this->arrAttachments;

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
				/*case 'EntityQtypeId':
					try {
						return ($this->intEntityQtypeId = $mixValue);
					} catch (QCallerException $objExc) {						
						$objExc->IncrementOffset();
						throw $objExc;
					}*/
					
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