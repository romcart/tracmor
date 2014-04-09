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
	// require('prepend.inc');				/* if you DO have "includes/" in your include_path */
	QApplication::Authenticate();
	// Include the classfile for CustomFieldEditFormBase
	require(__FORMBASE_CLASSES__ . '/CustomFieldEditFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the CustomField class.  It extends from the code-generated
	 * abstract CustomFieldEditFormBase class.
	 *
	 * Any display custimizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * Additional qform control objects can also be defined and used here, as well.
	 *
	 * @package Application
	 * @subpackage FormDraftObjects
	 *
	 */
	class CustomFieldEditForm extends CustomFieldEditFormBase {

    protected $arrAssetModels = array();

		// Header Menu
		protected $ctlHeaderMenu;

		protected $lblCustomFieldQtype;
		protected $chkEntityQtype;
		protected $txtValue;
		protected $txtDefaultValue;
		protected $lstDefaultValue;
		protected $btnAdd;
		protected $dtgValue;
		protected $lblHeaderCustomField;
		protected $lblSelectionOption;
   //Asset Models
    protected $lblAssetModel;
    protected $lblAllAssetModels;
    protected $lstAddAssetModel;
    protected $ctlAssetModelSearchTool;
    protected $btnAddAssetModel;
    protected $dtgAssetModels;
    protected $lblLookup;


		protected function Form_Create() {
      $this->blnAssetEntityType = false;
      // Call SetupCustomField to either Load/Edit Existing or Create New
			$this->SetupCustomField();
      // Loading Asset Models for custom field if applyed
      $this->arrAssetModels = AssetCustomFieldAssetModel::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
      // Create the Header Menu
			$this->ctlHeaderMenu_Create();

			// Create/Setup Controls for CustomField's Data Fields
			$this->lstCustomFieldQtype_Create();
			$this->lblCustomFieldQtype_Create();
			$this->txtShortDescription_Create();
			$this->chkEntityQtype_Create();
			$this->txtDefaultValue_Create();
			$this->lstDefaultValue_Create();
			$this->chkActiveFlag_Create();
			$this->chkRequiredFlag_Create();
      $this->lblHeaderCustomField_Create();
			$this->lblSelectionOption_Create();
      // asset model custom fields
      $this->chkSearchableFlag_Create();

			// Create/Setup Controls for Custom Field Options
			// CustomFieldQtypeId 2 = Select
			$this->txtValue_Create();
			$this->btnAdd_Create();
			$this->dtgValue_Create();

      // EntityQtype 1 = Asset
      $this->rblAllAssetModels_Create();
      $this->lblAllAssetModels_Create();
      $this->lblAssetModel_Create();
      $this->lstAddAssetModel_Create();
      $this->dtgAssetModels_Create();
      $this->ctlAssetModelSearchTool_Create();
      $this->btnAddAssetModel_Create();



			// If the Qtype is 'Select', show the list of options
			if ($this->objCustomField->CustomFieldQtypeId == 2) {
				$this->DisplayOptions(true);
			}
			else {
				$this->DisplayOptions(false);
			}

			// Create/Setup Button Action controls
			$this->btnSave_Create();
			$this->btnCancel_Create();
			$this->btnDelete_Create();
		}

		protected function Form_PreRender() {

			$this->dtgValue->TotalItemCount = CustomFieldValue::CountByCustomFieldId($this->objCustomField->CustomFieldId);
			if ($this->dtgValue->TotalItemCount == 0) {
				$this->dtgValue->ShowHeader = false;
			}
			else {
				$objClauses = array();
				if ($objClause = $this->dtgValue->OrderByClause)
					array_push($objClauses, $objClause);
				if ($objClause = $this->dtgValue->LimitClause)
					array_push($objClauses, $objClause);
				if ($objClause = QQ::Expand(QQN::CustomFieldValue()->CreatedByObject))
					array_push($objClauses, $objClause);
				$this->dtgValue->DataSource = CustomFieldValue::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId, $objClauses);
				$this->dtgValue->ShowHeader = true;
			}

      // Set data binder for Asset Model DataGrig
      $this->dtgAssetModels_Bind();
    }

  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}

		// Create and Setup lstCustomFieldQtype
		protected function lstCustomFieldQtype_Create() {
			$this->lstCustomFieldQtype = new QListBox($this);
			$this->lstCustomFieldQtype->Name = QApplication::Translate('Field Type');
			$this->lstCustomFieldQtype->Required = true;
			foreach (CustomFieldQtype::$NameArray as $intId => $strValue)
			$this->lstCustomFieldQtype->AddItem(new QListItem(ucfirst($strValue), $intId, $this->objCustomField->CustomFieldQtypeId == $intId));
			$this->lstCustomFieldQtype->AddAction(new QChangeEvent(), new QAjaxAction('lstCustomFieldQtype_Change'));
			if ($this->blnEditMode) {
				// Even though sometimes this isn't displayed, it must be created because we use the selected value in some AJAX updates
				$this->lstCustomFieldQtype->Visible = false;
			}
		}

		// Create and Setup lblCustomFieldQtype
		protected function lblCustomFieldQtype_Create() {
			$this->lblCustomFieldQtype = new QLabel($this);
			$this->lblCustomFieldQtype->Name = 'Field Type';
			if (!$this->blnEditMode) {
				$this->lblCustomFieldQtype->Visible = false;
			}
			else {
				$this->lblCustomFieldQtype->Text = ucfirst(CustomFieldQtype::ToString($this->objCustomField->CustomFieldQtypeId));
			}
		}

		// Create/Setup the list of EntityQtypes (either Assets or Inventory)
		protected function chkEntityQtype_Create() {

      $this->chkEntityQtype = new QCheckBoxList($this);
			$this->chkEntityQtype->Name = 'Active For';
			/*
			$this->chkEntityQtype->AddItem('Assets', 1);
			$this->chkEntityQtype->AddItem('Inventory', 2);
			$this->chkEntityQtype->AddItem('Asset Model', 4);
			$this->chkEntityQtype->AddItem('Manufacturer', 5);
			$this->chkEntityQtype->AddItem('Category', 6);
			$this->chkEntityQtype->AddItem('Company', 7);
			$this->chkEntityQtype->AddItem('Contact', 8);
			$this->chkEntityQtype->AddItem('Address', 9);
			$this->chkEntityQtype->AddItem('Shipment', 10);
			$this->chkEntityQtype->AddItem('Receipt', 11);
			*/
			$objEntityQtypeCustomFieldArray = EntityQtypeCustomField::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
			$objAssetListItem = new QListItem('Assets', 1);
			$objInventoryListItem = new QListItem('Inventory', 2);
			$objAssetModelListItem = new QListItem('Model', 4);
			$objManufacturerListItem = new QListItem('Manufacturer', 5);
			$objCategoryListItem = new QListItem('Category', 6);
			$objCompanyListItem = new QListItem('Company', 7);
			$objContactListItem = new QListItem('Contact', 8);
			$objAddressListItem = new QListItem('Address', 9);
			$objShipmentListItem = new QListItem('Shipment', 10);
			$objReceiptListItem = new QListItem('Receipt', 11);
			if ($objEntityQtypeCustomFieldArray) {
				foreach ($objEntityQtypeCustomFieldArray as $objEntityQtypeCustomField) {
					if ($objEntityQtypeCustomField->EntityQtypeId == 1) {
						$objAssetListItem->Selected = true;
            $this->blnAssetEntityType = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 2) {
						$objInventoryListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 4) {
						$objAssetModelListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 5) {
						$objManufacturerListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 6) {
						$objCategoryListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 7) {
						$objCompanyListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 8) {
						$objContactListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 9) {
						$objAddressListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 10) {
						$objShipmentListItem->Selected = true;
					}
					if ($objEntityQtypeCustomField->EntityQtypeId == 11) {
						$objReceiptListItem->Selected = true;
					}
				}
			}
			$this->chkEntityQtype->AddItem($objAssetListItem);
			$this->chkEntityQtype->AddItem($objInventoryListItem);
			$this->chkEntityQtype->AddItem($objAssetModelListItem);
			$this->chkEntityQtype->AddItem($objManufacturerListItem);
			$this->chkEntityQtype->AddItem($objCategoryListItem);
			$this->chkEntityQtype->AddItem($objCompanyListItem);
			$this->chkEntityQtype->AddItem($objContactListItem);
			$this->chkEntityQtype->AddItem($objAddressListItem);
			$this->chkEntityQtype->AddItem($objShipmentListItem);
			$this->chkEntityQtype->AddItem($objReceiptListItem);
      $this->chkEntityQtype->AddAction(new QClickEvent(), new QAjaxAction('objAssetListItem_Click'));
    }
    // Create/Setup the Value textbox
		protected function txtValue_Create() {

			$this->txtValue = new QTextBox($this);
			$this->txtValue->Name = "Selection Option";
			$this->txtValue->CausesValidation = false;
			$this->txtValue->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAdd_Click'));
			$this->txtValue->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create/Setup the Default Value textbox - for text or textarea custom fields
		protected function txtDefaultValue_Create() {

			$this->txtDefaultValue = new QTextBox($this);
			$this->txtDefaultValue->Name = "Default Value";
			$this->txtDefaultValue->CausesValidation = false;
			if (!$this->objCustomField->RequiredFlag) {
				$this->txtDefaultValue->Enabled = false;
			}
			if ($this->blnEditMode && $this->objCustomField->DefaultCustomFieldValueId && $this->objCustomField->CustomFieldQtypeId != 2) {
				$this->txtDefaultValue->Text = $this->objCustomField->DefaultCustomFieldValue->ShortDescription;
			}
			if ($this->blnEditMode && $this->objCustomField->CustomFieldQtypeId == 2) {
				$this->txtDefaultValue->Visible = false;
			}

			$this->txtDefaultValue->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtDefaultValue->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create/Setup the Default Value listbox - for select custom fields
		protected function lstDefaultValue_Create() {
			$this->lstDefaultValue = new QListBox($this);
			$this->lstDefaultValue->Name = "Default Value";
			$this->lstDefaultValue->CausesValidation = false;

			$this->lstDefaultValue->AddItem(new QlistItem("-- None --", null, $this->objCustomField->DefaultCustomFieldValueId == null));

			// Load all custom field values for this custom field (if it is of type Select)
			if ($this->blnEditMode && $this->objCustomField->CustomFieldQtypeId == 2) {
				$objCustomFieldValueArray = CustomFieldValue::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
				if ($objCustomFieldValueArray) {
					foreach ($objCustomFieldValueArray as $objCustomFieldValue) {
						$this->lstDefaultValue->AddItem(new QlistItem($objCustomFieldValue->ShortDescription, $objCustomFieldValue->CustomFieldValueId, $objCustomFieldValue->CustomFieldValueId == $this->objCustomField->DefaultCustomFieldValueId));
					}
				}
			}
			// Only enable if there are values in the drop-down box and the required flag is checked
			/*if ($this->blnEditMode && $this->objCustomField->RequiredFlag && $objCustomFieldValueArray) {
				$this->lstDefaultValue->Enabled = true;
			}
			else {
				$this->lstDefaultValue->Enabled = false;
			}*/
			// Only display if this is a SELECT custom field (not a text or textarea)
			if ($this->blnEditMode && $this->objCustomField->CustomFieldQtypeId == 2) {
				$this->lstDefaultValue->Visible = true;
			}
			else {
				$this->lstDefaultValue->Visible = false;
			}
			$this->lstDefaultValue->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->lstDefaultValue->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create/Setup the active flag checkbox
		protected function chkActiveFlag_Create() {
			parent::chkActiveFlag_Create();

			// Select fields cannot be active unless they have selections
			if ($this->blnEditMode && $this->objCustomField->CustomFieldQtypeId == 2 && $this->lstDefaultValue->ItemCount == 0) {
				$this->chkActiveFlag->Enabled = false;
			}

			$this->chkActiveFlag->CausesValidation = true;
			$this->chkActiveFlag->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->chkActiveFlag->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create/Setup the Required Flag checkbox
		protected function chkRequiredFlag_Create() {
			parent::chkRequiredFlag_Create();

			// Don't enable the active flag for select custom fields unless there are already selections
			// This is because Required custom fields MUST have a default value
			if ($this->blnEditMode && $this->objCustomField->CustomFieldQtypeId ==2 && $this->lstDefaultValue->ItemCount == 0) {
				$this->chkRequiredFlag->Enabled = false;
			}

			$this->chkRequiredFlag->CausesValidation = false;
			$this->chkRequiredFlag->AddAction(new QChangeEvent(), new QAjaxAction('chkRequiredFlag_Click'));
			$this->chkRequiredFlag->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

    protected function chkSearchableFlag_Create() {
     	parent::chkSearchableFlag_Create();
    }

		// Create/Setup the Short Description textbox
		protected function txtShortDescription_Create() {
			parent::txtShortDescription_Create();
			$this->txtShortDescription->CausesValidation = true;
			$this->txtShortDescription->Focus();
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSave_Click'));
			$this->txtShortDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		// Create/Setup header label
		protected function lblHeaderCustomField_Create() {
			$this->lblHeaderCustomField = new QLabel($this);
			$this->lblHeaderCustomField->Text = ($this->objCustomField->ShortDescription != '') ? $this->objCustomField->ShortDescription : 'New Custom Field';
		}

		//Create/Setup "Selection Option" label
		protected function lblSelectionOption_Create() {
			$this->lblSelectionOption = new QLabel($this);
			$this->lblSelectionOption->Text = 'Selection Option:';
			if (!$this->blnEditMode || $this->objCustomField->CustomFieldQtypeId != 2) {
				$this->lblSelectionOption->Visible = false;
			}
		}

    protected function rblAllAssetModels_Create(){
    parent::rblAllAssetModels_Create();
    $this->rblAllAssetModels->AddAction(new QClickEvent(), new QAjaxAction('rblAssetAssetModels_Click'));
    if(!$this->blnAssetEntityType){
      $this->rblAllAssetModels->Visible = false;
    }
    }
    //Create/Setup "Selection Option" label
  	protected function lblAllAssetModels_Create() {
  		$this->lblAllAssetModels = new QLabel($this);
  		$this->lblAllAssetModels->Text = 'All Models';
 			if (!$this->blnAssetEntityType||$this->rblAllAssetModels->SelectedValue==1) {
         $this->lblAllAssetModels->Visible = false;
      }
  	}

    //Create/Setup "Selection Option" label
  	protected function lblAssetModel_Create() {
  		$this->lblAssetModel = new QLabel($this);
  		$this->lblAssetModel->Text = 'Model:';
      if (!$this->blnAssetEntityType||
         $this->rblAllAssetModels->SelectedValue == 1) {

         $this->lblAssetModel->Visible = false;
        }
  		}

    protected function lstAddAssetModel_Create(){
      $this->lstAddAssetModel = new QListBox($this);
      $this->lstAddAssetModel->Name = QApplication::Translate('Add Model');
      $this->lstAddAssetModel->CausesValidation = false;
      $arrAssetModels = AssetModel::LoadAll();
      $this->lstAddAssetModel->AddItem(new QListItem('-Select One-',null));
      foreach($arrAssetModels as $objAssetModel){
        $this->lstAddAssetModel->AddItem(new QListItem(sprintf('%s - %s',$objAssetModel->AssetModelCode,$objAssetModel->ShortDescription),
                                                       $objAssetModel->AssetModelId));
      }
      if (!$this->blnAssetEntityType||$this->rblAllAssetModels->SelectedValue==1) {
        $this->lstAddAssetModel->Visible = false;
      }

    }

    protected function ctlAssetModelSearchTool_Create() {
      $this->ctlAssetModelSearchTool = new QAssetModelSearchToolComposite($this);
      $this->lblLookup = new QLabel($this);
      $this->lblLookup->HtmlEntities = false;
      $this->lblLookup->Text = '<img src="../images/icons/lookup.png" border="0" style="cursor:pointer;">';
      $this->lblLookup->AddAction(new QClickEvent(), new QAjaxControlAction($this->ctlAssetModelSearchTool, 'lblLookup_Click'));
      $this->lblLookup->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this->ctlAssetModelSearchTool, 'lblLookup_Click'));
      $this->lblLookup->AddAction(new QEnterKeyEvent(), new QTerminateAction());
      if(!$this->blnAssetEntityType||$this->rblAllAssetModels->SelectedValue==1){
        $this->lblLookup->Visible = false;
      }
    }

    protected function lblLookup_Click(){
      
    }

    // Create datagrid Asset Models
    protected function dtgAssetModels_Create(){
      $this->dtgAssetModels = new QDataGrid($this);
      $this->dtgAssetModels->CellPadding = 5;
      $this->dtgAssetModels->CellSpacing = 0;
      $this->dtgAssetModels->CssClass = "datagrid";

      // Enable AJAX - this won't work while using the DB profiler
      $this->dtgAssetModels->UseAjax = true;

      // Enable Pagination, and set to 20 items per page
      $objPaginator = new QPaginator($this->dtgAssetModels);
      $this->dtgAssetModels->Paginator = $objPaginator;
      $this->dtgAssetModels->ItemsPerPage = 20;

      $this->dtgAssetModels->AddColumn(new QDataGridColumn('Model', '<?= $_ITEM->AssetModel->__toStringWithLink($_ITEM,"bluelink"); ?>', array('CssClass' => "dtg_column" , 'HtmlEntities'=>false)));
      $this->dtgAssetModels->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveAssetModelsColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));

      $objStyle = $this->dtgAssetModels->RowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#FFFFFF';
      $objStyle->FontSize = 12;

      $objStyle = $this->dtgAssetModels->AlternateRowStyle;
      $objStyle->BackColor = '#EFEFEF';

      $objStyle = $this->dtgAssetModels->HeaderRowStyle;
      $objStyle->ForeColor = '#000000';
      $objStyle->BackColor = '#EFEFEF';
      $objStyle->CssClass = 'dtg_header';

      if(!$this->blnAssetEntityType||$this->rblAllAssetModels->SelectedValue==1){
        $this->dtgAssetModels->Visible = false;
      }

    }

    public function dtgAssetModels_Bind() {
      $this->dtgAssetModels->TotalItemCount = count($this->arrAssetModels);
       // AssetCustomFieldAssetModel::CountByCustomFieldId($this->objCustomField->CustomFieldId);
   		if ($this->dtgAssetModels->TotalItemCount == 0) {
   			$this->dtgAssetModels->ShowHeader = false;
   		}
   		else {
        $intItemsPerPage =  $this->dtgAssetModels->ItemsPerPage;
        $intItemOffset   = ($this->dtgAssetModels->PageNumber - 1) * $intItemsPerPage;
        $arrDataSource   = array_slice($this->arrAssetModels, $intItemOffset, $intItemsPerPage);
   			$this->dtgAssetModels->DataSource = $arrDataSource;
   			$this->dtgAssetModels->ShowHeader = true;
   		}
    }


    // Create/Setup the AddAssetModel button
  		protected function btnAddAssetModel_Create() {

  			$this->btnAddAssetModel = new QButton($this);
  			$this->btnAddAssetModel->Text = 'Add';
  		  $this->btnAddAssetModel->AddAction(new QClickEvent(), new QAjaxAction('btnAddAssetModel_Click'));
        $this->btnAddAssetModel->CausesValidation = false;
        if(!$this->blnAssetEntityType||$this->rblAllAssetModels->SelectedValue==1){
          $this->btnAddAssetModel->Visible = false;
        }
  	}

		// Create/Setup the Add button
		protected function btnAdd_Create() {

			$this->btnAdd = new QButton($this);
			$this->btnAdd->Text = 'Add';
			$this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAdd_Click'));
			$this->btnAdd->CausesValidation = false;
		}

		// Setup btnSave
		protected function btnSave_Create() {
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->PrimaryButton = true;
			$this->btnSave->CausesValidation = true;
		}

		// Create/Setup the Options/Values datagrid
		protected function dtgValue_Create() {
			$this->dtgValue = new QDataGrid($this);
			$this->dtgValue->CellPadding = 5;
			$this->dtgValue->CellSpacing = 0;
			$this->dtgValue->CssClass = "datagrid";

			// Enable AJAX - this won't work while using the DB profiler
			$this->dtgValue->UseAjax = true;

			// Enable Pagination, and set to 20 items per page
			$objPaginator = new QPaginator($this->dtgValue);
			$this->dtgValue->Paginator = $objPaginator;
			$this->dtgValue->ItemsPerPage = 20;

			$this->dtgValue->AddColumn(new QDataGridColumn('Option', '<?= $_ITEM->__toString() ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomFieldValue()->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomFieldValue()->ShortDescription, false), 'CssClass' => "dtg_column")));
			$this->dtgValue->AddColumn(new QDataGridColumn('Created By', '<?= $_ITEM->CreatedByObject->__toStringFullName() ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomFieldValue()->CreatedByObject->LastName, false, QQN::CustomFieldValue()->CreatedByObject->FirstName, false), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomFieldValue()->CreatedByObject->LastName, QQN::CustomFieldValue()->CreatedByObject->FirstName), 'CssClass' => "dtg_column")));
			$this->dtgValue->AddColumn(new QDataGridColumn('Creation Date', '<?= $_ITEM->CreationDate->__toString() ?>', array('OrderByClause' => QQ::OrderBy(QQN::CustomFieldValue()->CreationDate), 'ReverseOrderByClause' => QQ::OrderBy(QQN::CustomFieldValue()->CreationDate, false), 'CssClass' => "dtg_column")));
			$this->dtgValue->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveColumn_Render($_ITEM) ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));

			$objStyle = $this->dtgValue->RowStyle;
			$objStyle->ForeColor = '#000000';
			$objStyle->BackColor = '#FFFFFF';
			$objStyle->FontSize = 12;

			$objStyle = $this->dtgValue->AlternateRowStyle;
			$objStyle->BackColor = '#EFEFEF';

			$objStyle = $this->dtgValue->HeaderRowStyle;
			$objStyle->ForeColor = '#000000';
			$objStyle->BackColor = '#EFEFEF';
			$objStyle->CssClass = 'dtg_header';
		}

		// Render the remove button column in the datagrid
		public function RemoveColumn_Render(CustomFieldValue $objCustomFieldValue) {

      $strControlId = 'btnRemove' . $objCustomFieldValue->CustomFieldValueId;
      $btnRemove = $this->GetControl($strControlId);
      if (!$btnRemove) {
          // Create the Remove button for this row in the DataGrid
          // Use ActionParameter to specify the ID of the asset
          $btnRemove = new QButton($this->dtgValue, $strControlId);
          $btnRemove->Text = 'Remove';
          $btnRemove->ActionParameter = $objCustomFieldValue->CustomFieldValueId;
          $btnRemove->AddAction(new QClickEvent(), new QAjaxAction('btnRemove_Click'));
          $btnRemove->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnRemove_Click'));
          $btnRemove->AddAction(new QEnterKeyEvent(), new QTerminateAction());
          $btnRemove->CausesValidation = false;
      }

      return $btnRemove->RenderWithError(false);
		}

    // Render the remove button column in the Asset Models datagrid
  		public function RemoveAssetModelsColumn_Render(AssetCustomFieldAssetModel $objAssetCustomFieldAssetModel) {

        $strControlId = 'btnAssetModelRemove' . $objAssetCustomFieldAssetModel->AssetModelId;
        $btnAssetModelRemove = new QButton($this->dtgAssetModels/*, $strControlId*/);
        $btnAssetModelRemove->Text = 'Remove';
        $btnAssetModelRemove->ActionParameter = $objAssetCustomFieldAssetModel->AssetModelId;
        $btnAssetModelRemove->AddAction(new QClickEvent(), new QAjaxAction('btnAssetModelRemove_Click'));
        $btnAssetModelRemove->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAssetModelRemove_Click'));
        $btnAssetModelRemove->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        $btnAssetModelRemove->CausesValidation = false;
        return $btnAssetModelRemove->RenderWithError(false);
  		}

    public function btnAssetModelRemove_Click($strFormId, $strControlId, $strParameter){
       foreach ($this->arrAssetModels as $key => $objAssetModel) {
         if($objAssetModel->AssetModelId == (int)$strParameter){
           array_splice($this->arrAssetModels, $key,1);
         }
       }
       $this->dtgAssetModels->Refresh();
    }

		// This method triggers when the required checkbox is clicked
		protected function chkRequiredFlag_Click($strFormId, $strControlId, $strParameter) {

			// Enable the default value textbox or select box if appropriate
			if ($this->chkRequiredFlag->Checked == true) {
				// If the custom field qtype is text or textarea
				if ($this->lstCustomFieldQtype->SelectedValue != 2) {
					$this->txtDefaultValue->Enabled = true;
				}
				// If the custom field is SELECT and there is at least 1 selection available
				elseif ($this->lstCustomFieldQtype->SelectedValue == 2 && $this->lstDefaultValue->ItemCount > 0) {
					$this->lstDefaultValue->Enabled = true;
				}
			}
			// Disable textbox and listbox if the Required checkbox is unchecked
			elseif ($this->chkRequiredFlag->Checked == false) {
				$this->txtDefaultValue->Enabled = false;
				$this->lstDefaultValue->Enabled = false;
			}
		}

    protected function rblAssetAssetModels_Click(){
      if ($this->rblAllAssetModels->SelectedValue == 1){
        $this->DisplayAssetModels(false);
      }
      else{
        $this->DisplayAssetModels(true);
      }
    }

		// This method triggers when the custom field qtype listbox is changed
		// This can only happen when creating a new custom field - the ability to change custom field types has been removed for Beta2
		protected function lstCustomFieldQtype_Change($strFormId, $strControlId, $strParameter) {
			// If this is a select custom field
			if ($this->lstCustomFieldQtype->SelectedValue == 2) {
				$this->txtDefaultValue->Visible = false;
				$this->lstDefaultValue->Visible = true;
				// If there are selections for the custom field
				if ($this->lstDefaultValue->ItemCount > 0 && $this->chkRequiredFlag->Checked) {
					$this->lstDefaultValue->Enabled = true;
				}
				// If there are no selections for this custom field
				elseif ($this->lstDefaultValue->ItemCount == 0) {
					$this->lstDefaultValue->Enabled = false;
					$this->chkActiveFlag->Enabled = false;
					$this->chkActiveFlag->Checked = false;
					$this->chkRequiredFlag->Enabled = false;
					$this->chkRequiredFlag->Checked = false;
				}
				else {
					$this->lstDefaultValue->Enabled = false;
				}
			}
			// If the custom field is text or textarea
			elseif ($this->lstCustomFieldQtype->SelectedValue != 2) {
				$this->lstDefaultValue->Visible = false;
				$this->txtDefaultValue->Visible = true;
				$this->chkActiveFlag->Enabled = true;
				$this->chkRequiredFlag->Enabled = true;
				if ($this->chkRequiredFlag->Checked == true) {
					$this->txtDefaultValue->Enabled = true;
				}
			}
		}

    protected function objAssetListItem_Click(){
      $EntityTypes = $this->chkEntityQtype->SelectedValues;
      if (in_array('1',$EntityTypes)){
        $this->rblAllAssetModels->Visible = true;
        $this->blnAssetEntityType = true;
        if($this->rblAllAssetModels->SelectedValue == 2){
          $this->lblAssetModel->Visible = true;
          $this->lstAddAssetModel->Visible = true;
          $this->lblLookup->Visible = true;
          $this->btnAddAssetModel->Visible = true;
          $this->dtgAssetModels->Visible = true;
          $this->DisplayAssetModels();
        }
      }
      else{
        $this->blnAssetEntityType = false;
        $this->rblAllAssetModels->Visible = false;
        $this->lblAllAssetModels->Visible = false;
        $this->lblAssetModel->Visible = false;
        $this->lstAddAssetModel->Visible = false;
        $this->lblLookup->Visible = false;
        $this->btnAddAssetModel->Visible = false;
        $this->dtgAssetModels->Visible = false;
      }
    }

    protected function btnAddAssetModel_Click(){
      $blnError = false;
      if ($this->lstAddAssetModel->SelectedValue == null) {
        $blnError = true;
        $this->lstAddAssetModel->Warning = QApplication::Translate('You 7 can not enter blank selection option.' . $this->lstAddAssetModel->SelectedValue);
      }
      if (!$blnError){
        // $assetModelToAdd = AssetModel::QuerySingle(QQ::Equal(QQN::AssetModel()->ShortDescription,$this->txtAddAssetModel->Text));
        // Check if quering asset model exists(QuerySingle method doesnt work!)
        $assetModelToAdd = AssetModel::QueryArray(QQ::Equal(QQN::AssetModel()->AssetModelId, $this->lstAddAssetModel->SelectedValue));
        if (count($assetModelToAdd)>0){
          $assetModelToAdd = $assetModelToAdd[0];
          if($assetModelToAdd instanceof AssetModel){
            // Check if asset model is already in list
            if (count($this->arrAssetModels)>0){
              foreach($this->arrAssetModels as $assetModel){
                if ($assetModel->AssetModelId == $assetModelToAdd->AssetModelId){
                  $blnError = true;
                  $this->lstAddAssetModel->Warning = QApplication::Translate("That model has already been added.");
                }
              }
            }
            if(!$blnError){
              $objAssetModelToAdd = new AssetCustomFieldAssetModel();
              $objAssetModelToAdd->AssetModelId  = $assetModelToAdd->AssetModelId;
              $objAssetModelToAdd->CustomFieldId = $this->objCustomField->CustomFieldId;
              array_push($this->arrAssetModels,$objAssetModelToAdd);
              $this->dtgAssetModels->Refresh();
            }
          }
        }

        else {
          $blnError = true;
          $this->lstAddAssetModel->Warning = QApplication::Translate("That model number does not exist.");
        }
      }
    }

		// Remove button click action for each asset in the datagrid
		// This only affects select custom fields, not text or textarea
		public function btnRemove_Click($strFormId, $strControlId, $strParameter) {

			$intCustomFieldValueId = $strParameter;

			$blnError = false;
			// Trigger an error if a user tries to remove the default value of a required
			if ($intCustomFieldValueId == $this->objCustomField->DefaultCustomFieldValueId) {
				$blnError = true;
      	$this->dtgValue->Warning = "You cannot remove the default value. Please select another default value and then remove this selection.";
			}

			if (!$blnError) {
				$objCustomFieldValue = CustomFieldValue::Load($intCustomFieldValueId);

				// In case two users are removing CustomFieldValues at the same time
				if ($objCustomFieldValue instanceof CustomFieldValue) {
					$objCustomFieldValue->Delete();
				}

				// Rebuild the Default Value List
				// First remove all selections from the list
				$this->lstDefaultValue->RemoveAllItems();
				$this->lstDefaultValue->AddItem(new QlistItem("-- None --", null, $this->objCustomField->DefaultCustomFieldValueId == null));
				// Add back the items that are remaining
				$objCustomFieldValueArray = CustomFieldValue::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
				if ($objCustomFieldValueArray) {
					foreach ($objCustomFieldValueArray as $objCustomFieldValue) {
						$this->lstDefaultValue->AddItem(new QListItem($objCustomFieldValue->ShortDescription, $objCustomFieldValue->CustomFieldValueId, $objCustomFieldValue->CustomFieldValueId == $this->objCustomField->DefaultCustomFieldValueId));
					}
				}
				// Disable fields if there are no selections
				if ($this->lstDefaultValue->ItemCount == 0 && $this->chkRequiredFlag->Enabled == true) {

					$this->chkRequiredFlag->Enabled = false;
					$this->chkRequiredFlag->Checked = false;
					$this->chkActiveFlag->Enabled = false;
					$this->chkActiveFlag->Checked = false;

					// Save these flags in case the administrator clicks away without saving these two changes
					// Otherwise you could have a required and active Custom Field that doesn't have any selections
					$this->objCustomField->RequiredFlag = false;
					$this->objCustomField->ActiveFlag = false;
					$this->objCustomField->Save();

					$this->lstDefaultValue->Enabled = false;
				}
			}
		}

		// Create a new CustomFieldValue when the Add button is clicked
		protected function btnAdd_Click($strFormId, $strControlId, $strParameter) {

			$blnError = false;
			if (strlen(trim($this->txtValue->Text)) == 0) {
				$blnError = true;
				$this->txtValue->Warning = QApplication::Translate('You can not enter blank selection option.');
			}

			if (!$blnError) {
				$objCustomFieldValue = new CustomFieldValue();
				$objCustomFieldValue->CustomFieldId = $this->objCustomField->CustomFieldId;
				$objCustomFieldValue->ShortDescription = $this->txtValue->Text;
				$objCustomFieldValue->Save();

				$this->lstDefaultValue->AddItem(new QListItem($objCustomFieldValue->ShortDescription, $objCustomFieldValue->CustomFieldValueId));
				$this->txtValue->Text = '';

				if ($this->lstDefaultValue->ItemCount > 0 && $this->chkRequiredFlag->Enabled == false) {
					$this->chkActiveFlag->Enabled = true;
					$this->chkRequiredFlag->Enabled = true;
				}
			}
			
			$this->txtValue->Focus();
		}

        public function btnAssetModelSearchToolAdd_Click() {
          $this->ctlAssetModelSearchTool->lblWarning->Text = "";
          $intSelectedAssetModelId = $this->ctlAssetModelSearchTool->ctlAssetModelSearch->dtgAssetModel->GetSelected("AssetModelId");
          if (count($intSelectedAssetModelId) < 1) {
            $this->ctlAssetModelSearchTool->lblWarning->Text = "No selected models.";
          }
          else {
            $lblNewWarning = "";
            foreach (AssetModel::QueryArray(QQ::In(QQN::AssetModel()->AssetModelId, $intSelectedAssetModelId)) as $objNewAssetModel) {
              $blnExists = false;
              foreach($this->arrAssetModels as $objAssetModel){
                if($objAssetModel->AssetModelId == $objNewAssetModel->AssetModelId){
                  $blnExists = true;
                }
              }
              if($blnExists){
                $lblNewWarning .= sprintf("<br />%s - already in list", $objNewAssetModel->AssetModelCode);
              }
              else{
                $objAssetModelToAdd = new AssetCustomFieldAssetModel();
                $objAssetModelToAdd->AssetModelId  = $objNewAssetModel->AssetModelId;
                $objAssetModelToAdd->CustomFieldId = $this->objCustomField->CustomFieldId;
                array_push($this->arrAssetModels,$objAssetModelToAdd);
              }
            }
            $this->lstAddAssetModel->Warning = $lblNewWarning;
            $this->ctlAssetModelSearchTool->dlgAssetModelSearchTool->HideDialogBox();
          }
            // Uncheck all items but SelectAll checkbox
          $this->UncheckAllItems();
          $this->dtgAssetModels->Refresh();
        }

		// Control AjaxActions
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {

			try {

				$arrRestrictedFields = array('asset code','asset tag', 'model', 'category', 'manufacturer', 'location', 'assets', 'name', 'asset model code', 'model number', 'inventory code', 'quantity', 'company name', 'city', 'state/province', 'country', 'title', 'company', 'email', 'address', 'shipment number', 'ship date', 'ship to company', 'ship to contact', 'ship to address', 'scheduled by', 'status', 'tracking', 'receipt number', 'receive from company', 'receive from contact', 'description', 'account', 'courier', 'account number', 'field name', 'type', 'enabled', 'required', 'role', 'username', 'user role', 'active', 'admin');

				$blnError = false;

				/*if ($this->chkRequiredFlag->Checked) {
					if ($this->lstCustomFieldQtype->SelectedValue != 2 && $this->txtDefaultValue->Text == '') {
						$blnError = true;
						$this->btnCancel->Warning = 'A custom field must have a default value if it is required.';
					}
				}*/
				if (count($this->chkEntityQtype->SelectedItems) == 0) {
					$blnError = true;
					$this->btnCancel->Warning = 'You must select at least one field in the Apply To list box.';
				}

				if (in_array(strtolower($this->txtShortDescription->Text), $arrRestrictedFields, false)) {
					$blnError = true;
					$this->btnCancel->Warning = sprintf("'%s' is a Tracmor restricted word. Please choose another name for this custom field", $this->txtShortDescription->Text);
				}

        if (in_array('1', $this->chkEntityQtype->SelectedValues)
            && $this->rblAllAssetModels->SelectedValue==2
            && count($this->arrAssetModels)== 0){
          $blnError = true;
          $this->btnCancel->Warning = 'You must apply at least one Model.';
        }

				if ($this->blnEditMode) {
					$objCustomFieldDuplicate = CustomField::QuerySingle(QQ::AndCondition(QQ::Equal(QQN::CustomField()->ShortDescription, $this->txtShortDescription->Text), QQ::NotEqual(QQN::CustomField()->CustomFieldId, $this->objCustomField->CustomFieldId)));
				}
				else {
					$objCustomFieldDuplicate = CustomField::QuerySingle(QQ::Equal(QQN::CustomField()->ShortDescription, $this->txtShortDescription->Text));
				}
				if ($objCustomFieldDuplicate) {
					$blnError = true;
					$this->btnCancel->Warning = 'A custom field already exists with that name. Please choose another.';
				}

				if (!$blnError) {

					$this->UpdateCustomFieldFields();
          $this->objCustomField->Save();

					// If this field is a required field
					if ($this->objCustomField->RequiredFlag) {
						$blnDefaultIsNone = false;
					  // If this custom field is a text or textarea,
						if ($this->lstCustomFieldQtype->SelectedValue != 2) {
						  if ($this->txtDefaultValue->Text != null) {
  							// Assign the existing DefaultCustomFieldValue
  							if ($this->blnEditMode && $this->objCustomField->DefaultCustomFieldValueId) {
  								$objCustomFieldValue = CustomFieldValue::Load($this->objCustomField->DefaultCustomFieldValueId);
  							}
  							// Create a new CustomFieldValue
  							else {
  								$objCustomFieldValue = new CustomFieldValue();
  								$objCustomFieldValue->CustomFieldId = $this->objCustomField->CustomFieldId;
  							}
  							// Save the new CustomFieldValue
  							$objCustomFieldValue->ShortDescription = $this->txtDefaultValue->Text;
  							$objCustomFieldValue->Save();
  							// Set the DefaultCustomFieldValueId of the custom field
  							$this->objCustomField->DefaultCustomFieldValueId = $objCustomFieldValue->CustomFieldValueId;
						  }
						  else {
						    $this->objCustomField->DefaultCustomFieldValueId = null;
						    $blnDefaultIsNone = true;
						  }
						}
						// If this is a select custom field
						elseif ($this->lstCustomFieldQtype->SelectedValue == 2) {
							$this->objCustomField->DefaultCustomFieldValueId = $this->lstDefaultValue->SelectedValue;
							if ($this->lstDefaultValue->SelectedValue == null) {
							  $blnDefaultIsNone = true;
							}
						}

						// Save the custom field
						$this->objCustomField->Save();
						// Update the EntityQtypeCustomFields if they have changed (or if it is a new custom field
						$this->UpdateEntityQtypeCustomFields();
						// Update all of the CustomFieldSelections and values for the EntityQtypes
            	 if (!$blnDefaultIsNone) {
                 $this->objCustomField->UpdateRequiredFieldSelections();
                 // impove logic for asset customfields
                 if($this->blnAssetEntityType&&$this->rblAllAssetModels->SelectedValue==2){
                   // define assets to set default value
                   $chosenAssetModels = array();
                   foreach($this->arrAssetModels as $chosenAssetModel){
                     $assetsToFill = Asset::LoadArrayByAssetModelId($chosenAssetModel->AssetModelId);
                     if (count($assetsToFill>0)){
                       foreach ($assetsToFill as $assetToFill){
                         array_push($chosenAssetModels,$assetToFill->AssetId);
                       }
                     }
                   }
                   $chosenAssetModels =  implode(",", $chosenAssetModels);
                     if($chosenAssetModels){
                       $objDatabase = CustomField::GetDatabase();
                       $strQuery = sprintf("UPDATE `asset_custom_field_helper` SET `cfv_%s`= NULL WHERE `asset_id` NOT IN($chosenAssetModels);", $this->objCustomField->CustomFieldId);
                       $objDatabase->NonQuery($strQuery);
                     }
                 }
               }

					}
					// If the field is not a required field
					else {
						$this->objCustomField->DefaultCustomFieldValueId = null;
						$this->objCustomField->Save();
						$this->UpdateEntityQtypeCustomFields();
					}

					// If it is a new select Custom Field, then stay to add options
					if (!$this->blnEditMode && $this->objCustomField->CustomFieldQtypeId == 2) {
						QApplication::Redirect('custom_field_edit.php?intCustomFieldId=' . $this->objCustomField->CustomFieldId);
					}
					else {
						QApplication::Redirect('custom_field_list.php');
					}
				}
			}
			catch(QExtendedOptimisticLockingException $objExc) {

				$this->btnCancel->Warning = sprintf('This custom field has been updated by another user. You must <a href="custom_field_edit.php?intCustomFieldId=%s">Refresh</a> to edit this custom field.', $this->objCustomField->CustomFieldId);
			}
		}

		// Control AjaxActions
		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {

			$strQuery = sprintf("DELETE FROM datagrid_column_preference WHERE column_name = '%s'", addslashes($this->objCustomField->ShortDescription));
			$objDatabase = QApplication::$Database[1];
			$objDatabase->NonQuery($strQuery);

      $this->DeleteEntityQtypeCustomFields();

      parent::btnDelete_Click($strFormId, $strControlId, $strParameter);
		}

		// Protected Update Methods
		protected function UpdateCustomFieldFields() {

		  // If switching from select to text or textarea, delete any CustomFieldValues that may exist
			if ($this->blnEditMode && $this->objCustomField->CustomFieldQtypeId == 2 && ($this->lstCustomFieldQtype->SelectedValue == 1 || $this->lstCustomFieldQtype->SelectedValue == 3)) {
				$objCustomFieldValueArray = CustomFieldValue::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
				if ($objCustomFieldValueArray) {
					foreach ($objCustomFieldValueArray as $objCustomFieldValue) {
						$objCustomFieldValue->Delete();
					}
				}
			}
			// If changing the short_description, we need to change all of the values in the DatagridColumnPreference table
			if ($this->blnEditMode && ($this->objCustomField->ShortDescription != $this->txtShortDescription->Text)) {
				$strQuery = sprintf("UPDATE datagrid_column_preference SET column_name = '%s' WHERE column_name = '%s'", addslashes($this->txtShortDescription->Text), addslashes($this->objCustomField->ShortDescription));
				$objDatabase = QApplication::$Database[1];
				$objDatabase->NonQuery($strQuery);
			}

			// Assign the object variables from the form controls
			$this->objCustomField->CustomFieldQtypeId = $this->lstCustomFieldQtype->SelectedValue;
			$this->objCustomField->ShortDescription = $this->txtShortDescription->Text;
			$this->objCustomField->ActiveFlag = $this->chkActiveFlag->Checked;
			$this->objCustomField->RequiredFlag = $this->chkRequiredFlag->Checked;
      $this->objCustomField->SearchableFlag = $this->chkSearchableFlag->Checked;
      if($this->blnAssetEntityType&&$this->rblAllAssetModels->SelectedValue==1){
        $this->objCustomField->AllAssetModelsFlag = true;
      }
      else{
        $this->objCustomField->AllAssetModelsFlag = false;
      }

		}

		protected function UpdateEntityQtypeCustomFields() {

			// Delete any EntityQtypeCustomFields that were selected but are no longer selected
			$objEntityQtypeCustomFieldArray = EntityQtypeCustomField::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
			if ($objEntityQtypeCustomFieldArray) {
				foreach ($objEntityQtypeCustomFieldArray as $objEntityQtypeCustomField) {
					// Determines whether or not a entityqtypecustomfield can stay or gets deleted
					$blnKeep = false;
					if ($this->chkEntityQtype->SelectedItems) {
						foreach ($this->chkEntityQtype->SelectedItems as $objEntityQtypeItem) {
							if ($objEntityQtypeCustomField->EntityQtypeId == $objEntityQtypeItem->Value) {
								$blnKeep = true;
							}
						}
					}
					// If the EntityQtype needs to be deleted, you must delete the CustomFieldValues for text and textarea, and CustomFieldSelections for all types
					if (!$blnKeep) {
						/*$objAndCondition = QQ::AndCondition(QQ::Equal(QQN::CustomFieldSelection()->EntityQtypeId, $objEntityQtypeCustomField->EntityQtypeId), QQ::Equal(QQN::CustomFieldSelection()->CustomFieldValue->CustomFieldId, $this->objCustomField->CustomFieldId));
						$objClauses = QQ::Clause(QQ::Expand(QQN::CustomFieldSelection()->CustomFieldValue));
						// Select all CustomFieldSelections (and expanded CustomFieldValues) by EntityQtypeId and CustomFieldId
						$objCustomFieldSelectionArray = CustomFieldSelection::QueryArray($objAndCondition, $objClauses);
						if ($objCustomFieldSelectionArray) {
							foreach ($objCustomFieldSelectionArray as $objCustomFieldSelection) {
								if ($this->objCustomField->CustomFieldQtypeId != 2) {
									// Deleting the CustomFieldValue will MySQL CASCADE to delete the CustomFieldSelection also
									$objCustomFieldSelection->CustomFieldValue->Delete();
								}
								else {
									// If it is a select box, only delete the CustomFieldSelection (the CustomFieldValue stays unless it is removed as a selection entirely)
									$objCustomFieldSelection->Delete();
								}
							}
						}*/

						// If the EntityQtype needs to be deleted, you must delete EntityQtypeId for all roles in RoleEntityQTypeCustomFieldAuthorization
						$objRoleEntityCustomAuthArray=RoleEntityQtypeCustomFieldAuthorization::LoadArrayByEntityQtypeCustomFieldId($objEntityQtypeCustomField->EntityQtypeCustomFieldId);
						if($objRoleEntityCustomAuthArray)foreach($objRoleEntityCustomAuthArray as $objRoleEntityCustomAuth){
							$objRoleEntityCustomAuth->Delete();
						}

						// If the helper table exists for that EntityQtype then will delete the column in the helper table
						if ($strHelperTableArray = CustomFieldValue::GetHelperTableByEntityQtypeId($objEntityQtypeCustomField->EntityQtypeId)) {
						  $strHelperTable = $strHelperTableArray[0];
						  $objDatabase = CustomField::GetDatabase();
						  $strQuery = sprintf("ALTER TABLE %s DROP `cfv_%s`;", $strHelperTable,  $this->objCustomField->CustomFieldId);
						  $objDatabase->NonQuery($strQuery);
						}
            if($objEntityQtypeCustomField->EntityQtypeId == 1){
              $this->DeleteAssetCustomFieldAssetModels();
            }
						// Delete the EntityQtypeCustomField last
						$objEntityQtypeCustomField->Delete();
					}
          // Update Asset Models for Asset EntityQType
          else {
            if($objEntityQtypeCustomField->EntityQtypeId == 1){
              $this->UpadateAssetModels();
            }
          }
				}
			}

			// Insert the new EntityQtypeCustomFields
			if ($this->lstCustomFieldQtype->SelectedItems) {

			  foreach ($this->chkEntityQtype->SelectedItems as $objEntityQtypeItem) {
					// If the field doesn't already exist, then it needs to be created
					if (!($objEntityQtypeCustomField = EntityQtypeCustomField::LoadByEntityQtypeIdCustomFieldId($objEntityQtypeItem->Value, $this->objCustomField->CustomFieldId))) {
					  // add asset models
						if($objEntityQtypeItem->Value == 1){
              $this->AppendAssetModels();
            }

            $objEntityQtypeCustomField = new EntityQtypeCustomField();
						$objEntityQtypeCustomField->CustomFieldId = $this->objCustomField->CustomFieldId;
						$objEntityQtypeCustomField->EntityQtypeId = $objEntityQtypeItem->Value;
						$objEntityQtypeCustomField->Save();

						// If the helper table exists for that EntityQtype then create new column in the helper table
						if ($strHelperTableArray = CustomFieldValue::GetHelperTableByEntityQtypeId($objEntityQtypeItem->Value)) {
						  $strHelperTable = $strHelperTableArray[0];
						  $objDatabase = CustomField::GetDatabase();
						  $strQuery = sprintf("ALTER TABLE %s ADD `cfv_%s` TEXT DEFAULT NULL;", $strHelperTable,  $this->objCustomField->CustomFieldId);
						  $objDatabase->NonQuery($strQuery);
						  // If the helper table exists and have no values (empty).
						  // It happens when the QtypeItem does not yet have the custom fields.
						  // Uses SQL-hack to fix this issue.
						  $strParentTableName = $strHelperTableArray[1];
						  $strHelperTableItemId = sprintf("%s_id", $strParentTableName);
						  $strQuery = sprintf("INSERT INTO %s (`%s`) (SELECT `%s` FROM `%s` WHERE `%s` NOT IN (SELECT `%s` FROM %s));", $strHelperTable,  $strHelperTableItemId,  $strHelperTableItemId, $strParentTableName, $strHelperTableItemId,  $strHelperTableItemId, $strHelperTable);
						  $objDatabase->NonQuery($strQuery);
						}

						// Insert the new EntityQtypeCustomField to the RoleEntityQTypeCustomFieldAuthorization table, to all the roles, with authorized_flag set to true, one for View Auth and another for Edit Auth
						foreach(Role::LoadAll() as $objRole){
							//Insert the view Auth
							$objRoleEntityQtypeCustomFieldAuth = new RoleEntityQtypeCustomFieldAuthorization();
							$objRoleEntityQtypeCustomFieldAuth->RoleId=$objRole->RoleId;
							$objRoleEntityQtypeCustomFieldAuth->EntityQtypeCustomFieldId=$objEntityQtypeCustomField->EntityQtypeCustomFieldId;
							$objRoleEntityQtypeCustomFieldAuth->AuthorizationId=1;
							$objRoleEntityQtypeCustomFieldAuth->AuthorizedFlag=1;
							$objRoleEntityQtypeCustomFieldAuth->Save();
							//Insert the Edit Auth
							$objRoleEntityQtypeCustomFieldAuth = new RoleEntityQtypeCustomFieldAuthorization();
							$objRoleEntityQtypeCustomFieldAuth->RoleId=$objRole->RoleId;
							$objRoleEntityQtypeCustomFieldAuth->EntityQtypeCustomFieldId=$objEntityQtypeCustomField->EntityQtypeCustomFieldId;
							$objRoleEntityQtypeCustomFieldAuth->AuthorizationId=2;
							$objRoleEntityQtypeCustomFieldAuth->AuthorizedFlag=1;
							$objRoleEntityQtypeCustomFieldAuth->Save();

						}

					}
					// If this field is a required field
          if ($this->objCustomField->RequiredFlag) {
            // Add the DefaultValue into the helper table
  					if ($strHelperTableArray = CustomFieldValue::GetHelperTableByEntityQtypeId($objEntityQtypeItem->Value)) {
  					  $strHelperTable = $strHelperTableArray[0];
              $blnError = false;
  					  // If the custom field is text or textarea
  					  if ($this->objCustomField->CustomFieldQtypeId != 2) {
  					    if ($this->txtDefaultValue->Text != null)
    				      $txtDefaultValue = $this->txtDefaultValue->Text;
    				    else {
    				      $blnError = true;
    				    }
    				  }
    				  // Else the custom field is SELECT list
    				  elseif ($this->objCustomField->DefaultCustomFieldValueId != null) {
    				    $txtDefaultValue = CustomFieldValue::LoadByCustomFieldValueId($this->objCustomField->DefaultCustomFieldValueId);
    				  }
    				  else {
    				    $blnError = true;
    				  }
    				  if (!$blnError) {
                if(!(($objEntityQtypeItem->Value== 1)&&($this->rblAllAssetModels->SelectedValue==2))
                   ){
                  //print($objEntityQtypeItem->Value.$this->rblAllAssetModels->SelectedValue);exit;
                  $objDatabase = CustomField::GetDatabase();
                  $strQuery = sprintf("UPDATE %s SET `cfv_%s`='%s' WHERE `cfv_%s` is NULL;", $strHelperTable,  $this->objCustomField->CustomFieldId, $txtDefaultValue, $this->objCustomField->CustomFieldId);
                  $objDatabase->NonQuery($strQuery);
                }
                else{
                  // define assets to set default value
                  $chosenAssetModels = array();
                   foreach($this->arrAssetModels as $chosenAssetModel){
                     $assetsToFill = Asset::LoadArrayByAssetModelId($chosenAssetModel->AssetModelId);
                     if (count($assetsToFill>0)){
                       foreach ($assetsToFill as $assetToFill){
                         array_push($chosenAssetModels,$assetToFill->AssetId);
                       }
                     }
                   }
                  $chosenAssetModels =  implode(",", $chosenAssetModels);
                  //  Check if Model has any Assets need to be updated with new custom field and update them
                        if($chosenAssetModels){
                            $objDatabase = CustomField::GetDatabase();
                            $strQuery = sprintf("UPDATE %s SET `cfv_%s`='%s' WHERE `asset_id` IN ($chosenAssetModels) AND cfv_%s IS NULL;", $strHelperTable,  $this->objCustomField->CustomFieldId, $txtDefaultValue, $this->objCustomField->CustomFieldId, $this->objCustomField->CustomFieldId);
                            $objDatabase->NonQuery($strQuery);
                            $strQuery = sprintf("UPDATE %s SET `cfv_%s`= NULL WHERE `asset_id` NOT IN($chosenAssetModels);", $strHelperTable,  $this->objCustomField->CustomFieldId);
                            $objDatabase->NonQuery($strQuery);
                        }
                        }
    				  }
    				}
          }
				}
			}
		}

		protected function DeleteEntityQtypeCustomFields(){
			$objEntityQtypeCustomFieldArray = EntityQtypeCustomField::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
     	if ($objEntityQtypeCustomFieldArray) {
				foreach ($objEntityQtypeCustomFieldArray as $objEntityQtypeCustomField) {

            // If the EntityQtype needs to be deleted, you must delete EntityQtypeId for all roles in RoleEntityQTypeCustomFieldAuthorization
						$objRoleEntityCustomAuthArray=RoleEntityQtypeCustomFieldAuthorization::LoadArrayByEntityQtypeCustomFieldId($objEntityQtypeCustomField->EntityQtypeCustomFieldId);
						if($objRoleEntityCustomAuthArray)foreach($objRoleEntityCustomAuthArray as $objRoleEntityCustomAuth){
							$objRoleEntityCustomAuth->Delete();
						}

            // If there was Asset Type Custom field Delete AssetCustomField
            if ($objEntityQtypeCustomField->EntityQtypeId == 1) {
              $this->DeleteAssetCustomFieldAssetModels();
            }

						// If the helper table exists for that EntityQtype delete the columns in the helper table
						if ($strHelperTableArray = CustomFieldValue::GetHelperTableByEntityQtypeId($objEntityQtypeCustomField->EntityQtypeId)) {
						  $strHelperTable = $strHelperTableArray[0];
						  $objDatabase = CustomField::GetDatabase();
						  $strQuery = sprintf("ALTER TABLE %s DROP `cfv_%s`;", $strHelperTable,  $objEntityQtypeCustomField->CustomFieldId);
						  $objDatabase->NonQuery($strQuery);
						}

						// Delete the EntityQtypeCustomField last
						$objEntityQtypeCustomField->Delete();
				}
			}
		}
		// Display the fields for adding options to select lists
		protected function DisplayOptions($blnValue = true) {

			$this->txtValue->Visible  = $blnValue;
			$this->btnAdd->Visible    = $blnValue;
			$this->dtgValue->Visible  = $blnValue;
		}

    protected function DisplayAssetModels($blnValue = true) {

  	  $this->lstAddAssetModel->Visible  = $blnValue;
      $this->lblLookup->Visible         = $blnValue;
  	  $this->btnAddAssetModel->Visible  = $blnValue;
  		$this->dtgAssetModels->Visible  = $blnValue;
      $this->lblAssetModel->Visible = $blnValue;
  	}
    // Delete associated assetCustomFieldAssetModels
    // used on Deleting CustomField, on Updating for not Asset Entity Type
    private function DeleteAssetCustomFieldAssetModels(){
      $arrToDelete = AssetCustomFieldAssetModel::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
      foreach ($arrToDelete as $itemToDelete){
        $itemToDelete->Delete();
      }
    }
    // Add associated assetCustomFieldAssetModels
    // used on Save new CustomField, on Update CustomField for Asset Type instance if wasn't
    // may be used after $this->objCustomField->Save();
    private function AppendAssetModels(){
      if($this->rblAllAssetModels->SelectedValue == 1){
//        $arrToAdd = AssetModel::LoadAll();
//        foreach ($arrToAdd as $itemToAdd){
          $objAssetCustomFieldAssetModel = new AssetCustomFieldAssetModel();
//          $objAssetCustomFieldAssetModel->AssetModelId  = $itemToAdd->AssetModelId;
//          $objAssetCustomFieldAssetModel->CustomFieldId = $this->objCustomField->CustomFieldId;
//          $objAssetCustomFieldAssetModel->Save();
//        }
		  $this->DeleteAssetCustomFieldAssetModels();
		  // $objAssetCustomFieldAssetModel->deleteAllByCustomField($this->objCustomField->CustomFieldId);
      }
      else{
        foreach ($this->arrAssetModels as $itemToAdd){
        // if(!empty(AssetModel::Load($itemToAdd->AssetModelId)))
          $itemToAdd->CustomFieldId = $this->objCustomField->CustomFieldId;
          $itemToAdd->Save();
        }
      }
    }
    // Uncheck all items but SelectAll checkbox
    public function UncheckAllItems() {
      foreach ($this->GetAllControls() as $objControl) {
        if (substr($objControl->ControlId, 0, 11) == 'chkSelected') {
          $objControl->Checked = false;
        }
      }
    }

    // Updating assigned Asset Models range
    private function UpadateAssetModels(){

      //If AssetModels not all or changed - some items might to be deleted
      if(!($this->rblAllAssetModels->SelectedValue == 1)){
        $arrCurrentAssetModels = AssetCustomFieldAssetModel::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
        foreach ($arrCurrentAssetModels as $currentAssetModel){
          $blnExists = false;
          foreach ($this->arrAssetModels as $newAssetModel){
            if($newAssetModel->AssetModelId == $currentAssetModel->AssetModelId){
              $blnExists = true;
            }
          }
          if(!$blnExists){
            $currentAssetModel->Delete();
          }
        }
      }
      // Load All Asset Models to add
      else{
//        $this->arrAssetModels = array();
//        $arrAssetModels = AssetModel::LoadAll();
//        foreach($arrAssetModels as $assetModel){
//          $newAssetCustomFieldAssetModel = new AssetCustomFieldAssetModel();
//          $newAssetCustomFieldAssetModel->CustomFieldId  = $this->objCustomField->CustomFieldId;
//          $newAssetCustomFieldAssetModel->AssetModelId   = $assetModel->AssetModelId;
//          array_push($this->arrAssetModels,$newAssetCustomFieldAssetModel);
//        }
		$this->DeleteAssetCustomFieldAssetModels();
      }
      // Adding new assigned Model Assets
      $arrCurrentAssetModels = AssetCustomFieldAssetModel::LoadArrayByCustomFieldId($this->objCustomField->CustomFieldId);
      foreach ($this->arrAssetModels as $newAssetModel){
        $blnExists = false;
        foreach($arrCurrentAssetModels as $currentAssetModel){
          if($newAssetModel->AssetModelId == $currentAssetModel->AssetModelId){
            $blnExists = true;
              break;
          }
        }
        if (!$blnExists){
          $newAssetModel->Save();
        }
      }
    }

	}

	// Go ahead and run this form object to render the page and its event handlers, using
	// generated/custom_field_edit.php.inc as the included HTML template file
	CustomFieldEditForm::Run('CustomFieldEditForm', __DOCROOT__ . __SUBDIRECTORY__ . '/admin/custom_field_edit.tpl.php');
?>