<?php

	class QDataGridColumnToggle extends QControl {
		
		// The Column Toggle Menu QPanel
		public $pnlColumnToggleMenu;
		
		// The array of column labels found inside the QPanel
		protected $arrColumnLabels;
		
		// The label to export the datagrid as CSV
		public $lblExportCsv;
		
		// JAVASCRIPT
		protected $strJavaScripts = 'datagrid_column_toggle.js';
		
		//////////
		// Methods
		//////////
		public function __construct($objParentObject, $strControlId = null) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException  $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			$this->pnlColumnToggleMenu_Create();
		}
		
		public function ParsePostData() {}
		public function Validate() {return true;}
		public function GetJavaScriptAction() {return 'onclick';}
		
		public function GetControlHtml() {
			
			// Create the Column Labels. They cannot be created when creating the datagrid because columns can be added after instantiation.
			$this->arrColumnLabels = array();
			if ($this->objParentControl->ColumnArray) {
				foreach ($this->objParentControl->ColumnArray as $objColumn) {
					$lblColumn = new QLabel($this->pnlColumnToggleMenu);
					// If it is an image, and only an image, and it has an alt attribute, then use that value for the menu
					if (substr($objColumn->Name, 0, 4) == '<img') {
						if ($intMatch = stripos($objColumn->Name, "alt=")) {
							$intStart = $intMatch+4;
							$lblColumn->Text = substr($objColumn->Name, $intStart, strlen($objColumn->Name) - 1 - $intStart);
						}
						else {
							$lblColumn->Text = strip_tags($objColumn->Name);
						}
					}
					// If it is a control (like a checkbox), then remove it from the toggle menu
					elseif ($intMatch = substr($objColumn->Name, 0, 3) == '<?=') {
						unset ($lblColumn);
						continue;
					}
					else {
						$lblColumn->Text = $objColumn->Name;
					}
					$lblColumn->ActionParameter = $objColumn->Name;
					$lblColumn->AddAction(new QClickEvent(), new QToggleDisplayAction($this->pnlColumnToggleMenu));
					$lblColumn->AddAction(new QClickEvent(), new QServerControlAction($this, 'lblColumn_Click'));
					$lblColumn->AddAction(new QMouseOverEvent(), new QJavascriptAction('this.style.backgroundColor=\'#EEEEEE\';'));
					$lblColumn->AddAction(new QMouseOutEvent(), new QJavaScriptAction('this.style.backgroundColor=\'#FFFFFF\';'));
					if ($objColumn->Display) {
						$lblColumn->FontBold = true;
					}
					
					// Style
					$lblColumn->TagName = 'div';
					$lblColumn->SetCustomStyle('margin', '4px 4px 4px 8px');
					$lblColumn->SetCustomStyle('cursor', 'pointer');
					array_push($this->arrColumnLabels, $lblColumn);
				}
			}
			
			if ($this->objParentControl->ShowExportCsv) {
				$this->lblExportCsv = new QLabel($this);
				$this->lblExportCsv->Text = 'Export CSV';
				$this->lblExportCsv->AddAction(new QClickEvent(), new QServerControlAction($this, 'lblExportCsv_Click'));
				$this->lblExportCsv->AddAction(new QClickEvent(), new QTerminateAction());
				$this->lblExportCsv->AddAction(new QMouseOverEvent(), new QJavascriptAction('this.style.backgroundColor=\'#EEEEEE\';'));
				$this->lblExportCsv->AddAction(new QMouseOutEvent(), new QJavaScriptAction('this.style.backgroundColor=\'#FFFFFF\';'));
				$this->lblExportCsv->TagName = 'div';
				$this->lblExportCsv->SetCustomStyle('cursor', 'pointer');
			}
			
			// Setting display to false again. This is to fix the problem when changing pagination or sorting while the menu is open.
			$this->pnlColumnToggleMenu->Display = false;
			
			// Render the Column Toggle Menu
			$strToReturn = $this->pnlColumnToggleMenu->Render(false);
			
			return $strToReturn;
		}
		
		public function pnlColumnToggleMenu_Create() {
			
			// Currently, setting AutoRenderChildren to true will not work because it creates a new set of labels on every AJAX action
			// but does not get rid of the original labels.
			$this->pnlColumnToggleMenu = new QPanel($this);
			$this->pnlColumnToggleMenu->Name = 'Toggle Menu';
			// The ColumnToggleMenu requires that a width be set, and that it be set in pixels only
			$this->pnlColumnToggleMenu->Width = '130px';
			$this->pnlColumnToggleMenu->BorderWidth = 1;
			$this->pnlColumnToggleMenu->SetCustomStyle('padding', '2px');
			$this->pnlColumnToggleMenu->BackColor = 'white';
			$this->pnlColumnToggleMenu->Template = __INCLUDES__.'/qcodo/qform/pnl_column_toggle.tpl.php';
			$this->pnlColumnToggleMenu->Display = false;
		}
		
		// Toggle whether a column is being displayed or not
		public function lblColumn_Click($strFormId, $strControlId, $strParameter) {
			$this->objParentControl->blnModified = true;
			$objColumn = $this->objParentControl->GetColumnByName($strParameter);
			if (!$objColumn->Display) {
				$objColumn->Display = true;
			}
			else {
				$objColumn->Display = false;
			}
			// Save this display reference so that the columns are sticky and will always display the same for each user
			$objColumn->SaveDisplayPreference($this->objParentControl->Name);
		}
		
		public function lblExportCsv_Click($strFormId, $strControlId, $strParameter) {
			
			$this->objForm->RenderCsvBegin(false);
			
			session_cache_limiter('must-revalidate');    // force a "no cache" effect
      header("Pragma: hack"); // IE chokes on "no cache", so set to something, anything, else.
      $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time()) . " GMT";
      header($ExpStr);
      header('Content-Type: text/csv');
			header('Content-Disposition: csv; filename=export.csv');
			
			for ($i=1; $i <= (ceil($this->objParentControl->TotalItemCount/200)); $i++) {
			
				$this->objParentControl->PageNumber = $i;
				$this->objParentControl->ItemsPerPage = 200;
				$this->objParentControl->DataBind();
				
				if ($i==1) {
					ob_end_clean();
					$this->PrintCsvHeader();
				}
				
				if ($this->objParentControl->DataSource) {
					foreach ($this->objParentControl->DataSource as $objObject) {
						$this->PrintCsvRow($objObject);
						@ob_flush();
						flush();
					}
				}
				
				$this->ParentControl->DataSource = null;
			}
			
			QApplication::$JavaScriptArray = array();
			QApplication::$JavaScriptArrayHighPriority = array();
			$this->objForm->RenderCsvEnd(false);
			exit();
		}
		
		protected function PrintCSVHeader()
    {
      $strToReturn = '';

      $arrNames = array();
      foreach($this->objParentControl->ColumnArray as $col) {
      	
      	if ($col->Display === true) {
      		// Use the alt attribute's value if it is an image tag
          if (substr($col->Name, 0, 4) == '<img') {
						if ($intMatch = stripos($col->Name, 'alt=')) {
							$intStart = $intMatch+4;
							$arrNames[] = substr($col->Name, $intStart, strlen($col->Name) - 1 - $intStart);
						}
						else {
							$arrNames[] = strip_tags($col->Name);
						}
          }
          // Remove Checkbox Column
          elseif (substr($col->Name, 0, 3) == '<?=') {
          	continue;
          }
          else {
        		$arrNames[] = $col->Name;
          }
      	}
      }

      if ($this->objParentControl->ColumnArray) 
      {
        $strToReturn = implode('","', $arrNames);
        $strToReturn = '"' . $strToReturn . '"' . "\r\n";
      }
      print $strToReturn;
    }
		
    protected function PrintCSVRow($objObject)
    {
      // Iterate through the Columns
      $strColumnsHtml = '';
      $arrColumnText = array();
      foreach ($this->objParentControl->ColumnArray as $objColumn) {
      	if ($objColumn->Display === true) {
	        try {
	          $strHtml = $this->objParentControl->ParseColumnCsv($objColumn, $objObject, true);
	          // Use the alt attribute's value if it is an image tag
	          if (substr($strHtml, 0, 4) == '<img') {
							if ($intMatch = stripos($strHtml, 'alt="')) {
								$intStart = $intMatch+5;
								$strHtml = substr($strHtml, $intStart, strlen($strHtml) - 2 - $intStart);
							}
	          }
	          // Remove Checkbox Columns
	          elseif (substr($objColumn->Name, 0, 3) == '<?=') {
          		continue;
          	}
	          
	          if ($objColumn->HtmlEntities)
	            $strHtml = QApplication::HtmlEntities($strHtml);
	          
	          $strHtml = str_replace('"', "'", $strHtml);
	          //$strHtml = $this->StripControls($strHtml);
	          $strHtml = strip_tags($strHtml);
	          $strHtml = trim($strHtml);
	        } catch (QCallerException $objExc) {
	          $objExc->IncrementOffset();
	          throw $objExc;
	        }
	        $arrColumnText[] = $strHtml;
      	}
      }
      
      $strColumnsHtml = implode('","', $arrColumnText);
      $strColumnsHtml = '"' . $strColumnsHtml . '"' . "\r\n";
      
      print $strColumnsHtml;
    }
    
    protected function StripControls($strHtml) {
    	
    	
    }
		
		/////////////////////////
		// Public Properties: GET
		/////////////////////////
		public function __get($strName) {
			switch ($strName) {
				
				case 'ColumnLabels': return $this->arrColumnLabels;
				
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
			$this->blnModified = true;

			switch ($strName) {
				
				case 'ColumnLabels':
					try {
						$this->arrColumnLabels = QType::Cast($mixValue, QType::ArrayType);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					break;
			}
		}
	}

?>