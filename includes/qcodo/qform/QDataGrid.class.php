<?php
	class QDataGrid extends QDataGridBase  {
		///////////////////////////
		// DataGrid Preferences
		///////////////////////////
		protected $blnShowColumnToggle = false;
		protected $blnShowExportCsv = false;
		protected $blnExportCsv = false;
		protected $objColumnToggle;
		protected $pnlColumnToggleButton;
		protected $lblColumnToggleButton;
		
		protected $blnShowCheckboxes = false;
		public $chkSelectAll;
		
		// Feel free to specify global display preferences/defaults for all QDataGrid controls
		public function __construct($objParentObject, $strControlId = null) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException  $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// For example... Let's ensure that any LINKED header is still Black
			$this->objHeaderLinkStyle->ForeColor = "black";
		
			// This has to be created here in order to include the javascripts
			// This is not ideal, because it is creating the control every time it loads, regardless of whether blnShowColumnToggle = true
			// cannot check blnShowColumnToggle because it is set after the datagrid is created
			// This is a big hurdle in order to get this included in the Qcodo core
			$this->objColumnToggle = new QDataGridColumnToggle($this);
		}
		
		protected function GetHeaderRowHtml() {
			$objHeaderStyle = $this->objRowStyle->ApplyOverride($this->objHeaderRowStyle);

			$strToReturn = sprintf('<tr %s>', $objHeaderStyle->GetAttributes());
			
			$intColumnIndex = 0;
			
			if ($this->objColumnArray) foreach ($this->objColumnArray as $objColumn) {
				
				if ($objColumn->OrderByClause) {						
					// This Column is Sortable
					$strArrowImage = "";
					
					//$strName = $objColumn->Name;
					$strName = $this->ParseColumnHeaderHtml($objColumn);

					if ($intColumnIndex == $this->intSortColumnIndex) {
						//$strName = strtoupper($strName);
						$strName = sprintf('<span style="text-transform: uppercase;">%s</span>', $strName);
						if ($this->intSortDirection == 0)
							$strArrowImage = sprintf(' <img src="%s/sort_arrow.png" width="7" height="7" alt="Sorted" />', __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__);
						else
							$strArrowImage = sprintf(' <img src="%s/sort_arrow_reverse.png" width="7" height="7" alt="Reverse Sorted" />', __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__);
					}

					$this->strActionParameter = $intColumnIndex;
					
					// Added the third parameter to GetAttributes for objHeaderRowStyle() to send the column object.
					// This is to determine whether or not to display the column.
					$strToReturn .= sprintf('<th %s><a href="#" %s%s>%s</a>%s</th>',
						$this->objHeaderRowStyle->GetAttributes(true, true, $objColumn),
						$this->GetActionAttributes(),
						$this->objHeaderLinkStyle->GetAttributes(),
						$strName,
						$strArrowImage);
				} else
					//$strToReturn .= sprintf('<th %s>%s</th>', $this->objHeaderRowStyle->GetAttributes(true, true, $objColumn), $objColumn->Name);
					$strToReturn .= sprintf('<th %s>%s</th>', $this->objHeaderRowStyle->GetAttributes(true, true, $objColumn), $this->ParseColumnHeaderHtml($objColumn));
				$intColumnIndex++;
			}
			
			// Create the ColumnToggleButton if blnShowColumnToggle is set to true
			if ($this->blnShowColumnToggle || $this->blnShowExportCsv) {
				if (!$this->pnlColumnToggleButton) {
					$this->pnlColumnToggleButton_Create();
				}
				// Render the ColumnToggleButton QPanel
				$strToggleStyle = $this->objHeaderRowStyle->GetAttributes();
				$strToReturn .= sprintf('<th %s>%s</th>', $strToggleStyle, $this->pnlColumnToggleButton->Render(false));
			}
			
			$strToReturn .= '</tr>';

			return $strToReturn;
		}
		
		protected function GetDataGridRowHtml($objObject) {
			// Get the Default Style
			$objStyle = $this->objRowStyle;

			// Iterate through the Columns
			$strColumnsHtml = '';
			
			foreach ($this->objColumnArray as $objColumn) {
				try {
					
					$strHtml = $this->ParseColumnHtml($objColumn, $objObject);

					if ($objColumn->HtmlEntities)
						$strHtml = QApplication::HtmlEntities($strHtml);

					// For IE
					if (QApplication::IsBrowser(QBrowserType::InternetExplorer) &&
						($strHtml == ''))
							$strHtml = '&nbsp;';
					
					

				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
				$strColumnsHtml .= sprintf('<td %s>%s</td>', $objColumn->GetAttributes(), $strHtml);
			}
			
			// Add an extra empty column to go underneath the Column Toggle Button
			if ($this->ShowColumnToggle || $this->ShowExportCsv) {
				// This is nasty - cloning the original object just to reset the display to true and get the attributes
				// There must be a better way to do this, but it gets the job done for now
				// Also, for inclusion in Qcodo, this might not be what you want to do. What if the last column has weird attributes, and they should go back to normal?
				// But you can't include the RowStyle because there are things in a RowStyle that don't work on cells
				$objNewColumn = clone $objColumn;
				$objNewColumn->Display = true;
				$objNewColumn->Width = null;
				$strColumnsHtml .= sprintf('<td %s>&nbsp;</td>', $objNewColumn->GetAttributes());
			}

			// Apply AlternateRowStyle (if applicable)
			if (($this->intCurrentRowIndex % 2) == 1)
				$objStyle = $objStyle->ApplyOverride($this->objAlternateRowStyle);

			// Apply any Style Override (if applicable)
			if ((is_array($this->objOverrideRowStyleArray)) && 
				(array_key_exists($this->intCurrentRowIndex, $this->objOverrideRowStyleArray)) &&
				(!is_null($this->objOverrideRowStyleArray[$this->intCurrentRowIndex])))
				$objStyle = $objStyle->ApplyOverride($this->objOverrideRowStyleArray[$this->intCurrentRowIndex]);

			// Finish up
			$strToReturn = sprintf('<tr %s>%s</tr>', $objStyle->GetAttributes(), $strColumnsHtml);
			$this->intCurrentRowIndex++;
			return $strToReturn;
		}
				
		protected function pnlColumnToggleButton_Create() {
			
			$strParent = 'QControl';
			if ($this->objParentControl->ParentControl instanceof QDialogBox) {
				$strParent = 'QDialogBox';
			}
			
			// Create the panel for the toggle button
			$this->pnlColumnToggleButton = new QPanel($this);
			$this->pnlColumnToggleButton->HorizontalAlign = QTextAlign::Right;
			$this->pnlColumnToggleButton->AutoRenderChildren = true;
			
			// Create the label for the toggle button - an ellipses in this case.
			$this->lblColumnToggleButton = new QLabel($this->pnlColumnToggleButton);
			$this->lblColumnToggleButton->Text = '...';
			$this->lblColumnToggleButton->SetCustomStyle('cursor', 'pointer');
			$this->lblColumnToggleButton->AddAction(new QMouseOverEvent(), new QJavaScriptAction("this.style.backgroundColor='#0000CC'; this.style.color='#FFFFFF'"));
			$this->lblColumnToggleButton->AddAction(new QMouseOutEvent(), new QJavaScriptAction("this.style.backgroundColor=''; this.style.color=''"));
			$this->lblColumnToggleButton->AddAction(new QClickEvent(), new QJavaScriptAction(sprintf('toggleColumnToggleDisplay(event, \'%s\', \'%s\', \'%s\')', $this->objColumnToggle->pnlColumnToggleMenu->ControlId, $this->pnlColumnToggleButton->ControlId, $strParent)));
		}
		
		protected function GetPaginatorRowHtml($objPaginator) {
			
			// We have to dynamically determine the number of columns in the table.
			// When rendering colspans, Firefox includes columns that are not being displayed, but IE does not.
			$intColspan = 0;
			if ($this->blnShowColumnToggle || $this->blnShowExportCsv) {
				foreach ($this->objColumnArray as $objColumn) {
					if ($objColumn->Display === true) {
						$intColspan += 1;
					}
				}
				$intColspan += 1;
			}
			else {
				$intColspan = count($this->objColumnArray);
			}
			
			$strToReturn = sprintf('<tr><td colspan="%s" style="padding:4px 0px 4px 0px;"><table cellspacing="0" cellpadding="0" border="0" style="width:100%%;"><tr><td valign="bottom" style="width:50%%;font-size:10px;">', $intColspan);

			if ($this->TotalItemCount > 0) {
				$intStart = (($this->PageNumber - 1) * $this->ItemsPerPage) + 1;
				$intEnd = $intStart + count($this->DataSource) - 1;
				$strToReturn .= sprintf($this->strLabelForPaginated,
					$this->strNounPlural,
					$intStart,
					$intEnd,
					$this->TotalItemCount);
			} else {
				$intCount = count($this->objDataSource);
				if ($intCount == 0)
					$strToReturn .= sprintf($this->strLabelForNoneFound, $this->strNounPlural);
				else if ($intCount == 1)
					$strToReturn .= sprintf($this->strLabelForOneFound, $this->strNoun);
				else
					$strToReturn .= sprintf($this->strLabelForMultipleFound, $intCount, $this->strNounPlural);
			}

			$strToReturn .= '</td><td valign="bottom" style="width:50%;font-size:10px;text-align:right;">';
			$strToReturn .= $objPaginator->Render(false);
			$strToReturn .= '</td></tr></table></td></tr>';
			
			return $strToReturn;
		}
		
		protected function GetControlHtml() {
			
			$strToReturn = '';
			
			$this->DataBind();
			
			// Table Tag
			$strStyle = $this->GetStyleAttributes();
			if ($strStyle)
				$strStyle = sprintf('style="%s" ', $strStyle);
			$strToReturn .= sprintf('<table %s%s>', $this->GetAttributes(), $strStyle);

			if ($this->objColumnArray) foreach ($this->objColumnArray as $objColumn) {
				if ($this->ShowColumnToggle && $objColumn instanceof QDataGridColumnExt) {
					// Check if this user has a display preference for this particular column
					if ($objDatagridColumnPreference = DatagridColumnPreference::LoadByDatagridShortDescriptionColumnNameUserAccountId($this->Name, $objColumn->Name, QApplication::$objUserAccount->UserAccountId)) {
						// Set the columns display attribute only if this user has a display preference set for this column
						$objColumn->Display = $objDatagridColumnPreference->DisplayFlag;
					}
				}
			}
			
			// Paginator Row (if applicable)
			if ($this->objPaginator)
				$strToReturn .= $this->GetPaginatorRowHtml($this->objPaginator);

			// Header Row (if applicable)
			if ($this->blnShowHeader)
				$strToReturn .= $this->GetHeaderRowHtml();

			// DataGrid Rows
			$this->intCurrentRowIndex = 0;
			if ($this->objDataSource)
				foreach ($this->objDataSource as $objObject)
					$strToReturn .= $this->GetDataGridRowHtml($objObject);

			// Footer Row (if applicable)
			if ($this->blnShowFooter)
				$strToReturn .= $this->GetFooterRowHtml();
				
			// Finish Up
			$strToReturn .= '</table>';
			
			// Render the ColumnToggleMenu
			if ($this->blnShowColumnToggle || $this->ShowExportCsv) {
				$strToReturn .= $this->objColumnToggle->Render(false);
			}
			
			$this->objDataSource = null;
			
			return $strToReturn;
		}
		
		public function ParseColumnCsv($objColumn, $objObject, $blnExportCsv = false) {
			if ($blnExportCsv) {
				$this->blnExportCsv = $blnExportCsv;
			}
			
			return $this->ParseColumnHtml($objColumn, $objObject);
		}
		
		// Used upon rendering to find backticks and perform PHP eval's
		// This method was based on the ParseColumnHtml in DatagridBase.class.php, but is used for the datagrid header row
		// The header row is different than a regular datagrid row because it doesn't also have an associated object l.
		protected function ParseColumnHeaderHtml($objColumn) {
			$_FORM = $this->objForm;
			$_CONTROL = $this;
			$_COLUMN = $objColumn;

			$strHtml = $objColumn->Name;
			$intPosition = 0;
			
			while (($intStartPosition = strpos($strHtml, '<?=', $intPosition)) !== false) {
				$intEndPosition = strpos($strHtml, '?>', $intStartPosition);
				if ($intEndPosition === false)
					return $strHtml;
				$strToken = substr($strHtml, $intStartPosition + 3, ($intEndPosition - $intStartPosition) - 3);
				$strToken = trim($strToken);
				
				if ($strToken) {
					// Because Eval doesn't utilize exception management, we need to do hack thru the PHP Error Handler
					set_error_handler("DataGridEvalHandleError");
					global $__exc_dtg_errstr;
					$__exc_dtg_errstr = sprintf("Incorrectly formatted DataGridColumn HTML in %s: %s", $this->strControlId, $strHtml);

					try {
						$strEvaledToken = eval(sprintf('return %s;', $strToken));
					} catch (QCallerException $objExc) {
						$objExc->DecrementOffset();
						throw $objExc;
					}

					// Restore the original error handler
					set_error_handler("QcodoHandleError");
					$__exc_dtg_errstr = null;
					unset($__exc_dtg_errstr);
				} else {
					$strEvaledToken = '';
				}

				$strHtml = sprintf("%s%s%s",
					substr($strHtml, 0, $intStartPosition),
					$strEvaledToken,
					substr($strHtml, $intEndPosition + 2));

				$intPosition = $intStartPosition + strlen($strEvaledToken);
			}

			return $strHtml;
		}
		
		// Render the Select All checkbox to be displayed in the datagrid header row
		public function chkSelectAll_Render() {
			
			if (!$this->chkSelectAll) {
		  	$this->chkSelectAll = new QCheckBox($this);
		  	$this->chkSelectAll->Name = 'Select All';
		  	$this->chkSelectAll->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'chkSelectAll_Click'));
			}
			
			return $this->chkSelectAll->Render(false);
		}
		
		// This method (declared as public) will render the checkboxes for the datagrid
		// $intId should be the primary key of the object in the database. It is used to name the controls so we can keep track of them.
	  public function chkSelected_Render($intId) {
	  	
	    $strControlId = 'chkSelected' . $intId . 'x' . $this->ControlId;
	    // Let's see if the Checkbox exists already
	    $chkSelected = $this->objForm->GetControl($strControlId);
	    if (!$chkSelected) {
        $chkSelected = new QCheckBox($this, $strControlId);
        // We'll use Control Parameters to help us identify the Person ID being copied
        $chkSelected->ActionParameter = $intId;
        if ($this->chkSelectAll->Checked) {
        	$chkSelected->Checked = true;
        }
	    }
	    return $chkSelected->Render(false);
	  }
	  
	  // If the header row checkbox is clicked, it will check all controls
	  // Note that it only checks the checkboxes which have already been created (if the page has been viewed).
	  // This is done so that we do not create too many controls with datagrids with a very large number of items.
	  // When creating new checkboxes, it will assign it's value to all new checkboxes.
	  public function chkSelectAll_Click() {
	  	foreach ($this->objForm->GetAllControls() as $objControl) {
	      if (substr($objControl->ControlId, 0, 11) == 'chkSelected') {
	      	$objControl->Checked = $this->chkSelectAll->Checked;
	      }
	    }
	  }
	  
	  public function GetSelected($strId) {
	  	$intObjectIdArray = array();
	  	$intItemsPerPage = $this->ItemsPerPage;
      $intPageNumber = $this->PageNumber;
      
	  	if ($this->chkSelectAll->Checked) {
      	
      	for ($i=1; $i <= (ceil($this->TotalItemCount/200)); $i++) {
			
					$this->PageNumber = $i;
					$this->ItemsPerPage = 200;
					$this->DataBind();
	      	
	      	foreach ($this->DataSource as $objObject) {
	      		if ($chkControl = $this->objForm->GetControl('chkSelected' . $objObject->$strId . 'x' . $this->ControlId)) {
	      			if ($chkControl->Checked) {
	      				array_push($intObjectIdArray, $objObject->$strId);
	      			}
	      		}
	      		elseif ($this->chkSelectAll->Checked) {
	      			array_push($intObjectIdArray, $objObject->$strId);
	      		}
	      	}
	      	
	      	$this->DataSource = null;
      	}
	  	}

	  	else {
	  		foreach ($this->objForm->GetAllControls() as $objControl) {
	        if (substr($objControl->ControlId, 0, 11) == 'chkSelected') {
	          if ($objControl->Checked) {
	            array_push($intObjectIdArray, $objControl->ActionParameter);
	          }
	        }
	  		}
	  	}
	  	
	  	$this->ItemsPerPage = $intItemsPerPage;
      $this->PageNumber = $intPageNumber;
	  	
	  	return $intObjectIdArray;
	  }
		
		/////////////////////////
		// Public Properties: GET
		/////////////////////////
		public function __get($strName) {
			switch ($strName) {
				// APPEARANCE
				case "ShowColumnToggle": return $this->blnShowColumnToggle;
				case "ShowExportCsv": return $this->blnShowExportCsv;
				case "ExportCsv": return $this->blnExportCsv;
				case "ColumnArray": return $this->objColumnArray;
				case "lblColumnToggleButton": return $this->lblColumnToggleButton;
				case "pnlColumnToggleButton": return $this->pnlColumnToggleButton;
				
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

				case "ShowColumnToggle":
					try {
						$this->blnShowColumnToggle = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
				case "ShowCheckboxes":
					try {
						$this->blnShowCheckboxes = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}					
					
				case "ShowExportCsv":
					try {
						$this->blnShowExportCsv = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
				case "ExportCsv":
					try {
						$this->blnExportCsv = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
				case "blnModified":
					try {
						$this->blnModified = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
				default:
					try {
						parent::__set($strName, $mixValue);
						break;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}					
			}
		}

		// Override any of these methods/variables below to alter the way the DataGrid gets rendered

//		protected function GetPaginatorRowHtml() {}

//		protected function GetHeaderRowHtml() {}

//		protected $blnShowFooter = true;		
//		protected function GetFooterRowHtml() {
//			return sprintf('<tr><td colspan="%s" style="text-align: center">Some Footer Can Go Here</td></tr>', count($this->objColumnArray));
//		}

//		protected function GetDataGridRowHtml($objObject) {}
	}
?>