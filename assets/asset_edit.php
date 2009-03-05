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

	require_once('../includes/prepend.inc.php');
	QApplication::Authenticate(2);
	require_once(__FORMBASE_CLASSES__ . '/AssetEditFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
	 * of the Asset class.  It extends from the code-generated
	 * abstract AssetEditFormBase class.
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
	class AssetEditForm extends AssetEditFormBase {

		// Header Tabs
		protected $ctlHeaderMenu;
		// Shortcut Menu
		protected $ctlShortcutMenu;

		protected $ctlAssetEdit;
		protected $ctlAssetTransact;
		protected $intTransactionTypeId;

		// Child assets datagrid
		protected $dtgChildAssets;

		// Buttons
		protected $btnChildAssetsRemove;
		protected $btnReassign;
		protected $btnLinkToParent;
		protected $btnUnlink;

		// These are needed for the hovertips in the Shipping/Receiving datagrid
		public $objAssetTransactionArray;
		public $objInventoryTransactionArray;

		// Override the Form_Create method in AssetEditFormBase.inc
		protected function Form_Create() {

			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			// Create the Shortcut Menu
			$this->ctlShortcutMenu_Create();

			// Assign the Transaction Type from the query string, if it exists.
			$this->intTransactionTypeId = QApplication::QueryString('intTransactionTypeId');

			$this->ctlAssetEdit_Create();
			// Create the two composite controls
			if ($this->ctlAssetEdit->blnEditMode || $this->intTransactionTypeId) {
				$this->ctlAssetTransact_Create();
			}

			// Display transaction screen if passed an intTransactionTypeId (from shortcut menu)
			if ($this->intTransactionTypeId) {
				$this->DisplayEdit(false);
				$this->DisplayTransaction(true, $this->intTransactionTypeId);
			}
			// Display the edit form
			else {
				$this->DisplayTransaction(false);
				$this->DisplayEdit(true);
			}
			// Create Child Assets Datagrid
			$this->dtgChildAssets_Create();
			// Create Buttons
			$this->btnChildAssetsRemove_Create();
			$this->btnReassign_Create();
			$this->btnLinkToParent_Create();
			$this->btnUnlink_Create();
		}

		// Datagrid values must be assigned here because they are not encoded like all other controls
		protected function Form_PreRender() {

			// If an existing asset is being edited, render the Transaction datagrid
			if ($this->ctlAssetEdit->blnEditMode) {

				// Specify the local databind method this datagrid will use
				$this->ctlAssetEdit->dtgAssetTransaction->SetDataBinder('dtgAssetTransaction_Bind');

				// Specify the local databind method this datagrid will use
				$this->ctlAssetEdit->dtgShipmentReceipt->SetDataBinder('dtgShipmentReceipt_Bind');
			}

			// If assets are in the array, finish setting up the datagrid of assets prepared for a transaction
			if ($this->ctlAssetEdit->blnEditMode || $this->intTransactionTypeId) {
				if ($this->ctlAssetTransact->objAssetArray) {
					$this->ctlAssetTransact->dtgAssetTransact->TotalItemCount = count($this->ctlAssetTransact->objAssetArray);
					$this->ctlAssetTransact->dtgAssetTransact->DataSource = $this->ctlAssetTransact->objAssetArray;
					$this->ctlAssetTransact->dtgAssetTransact->ShowHeader = true;
				}
				else {
					$this->ctlAssetTransact->dtgAssetTransact->TotalItemCount = 0;
					$this->ctlAssetTransact->dtgAssetTransact->ShowHeader = false;
				}
			}

			$this->dtgChildAssets->SetDataBinder('dtgChildAssets_Bind');
		}

		// Setup the Child Assets datagrid
		protected function dtgChildAssets_Create() {

			$this->dtgChildAssets = new QDataGrid($this);
			$this->dtgChildAssets->CellPadding = 5;
			$this->dtgChildAssets->CellSpacing = 0;
			$this->dtgChildAssets->CssClass = "datagrid";

	    // Enable AJAX - this won't work while using the DB profiler
	    $this->dtgChildAssets->UseAjax = true;

	    // Enable Pagination, and set to 20 items per page
	    $objPaginator = new QPaginator($this->dtgChildAssets);
	    $this->dtgChildAssets->Paginator = $objPaginator;
	    $this->dtgChildAssets->ItemsPerPage = 20;

	    $this->dtgChildAssets->AddColumn(new QDataGridColumnExt('<?=$_CONTROL->chkSelectAll_Render() ?>', '<?=$_CONTROL->chkSelected_Render($_ITEM->AssetId) ?>', 'CssClass="dtg_column"', 'HtmlEntities=false'));
	    $this->dtgChildAssets->AddColumn(new QDataGridColumn('Asset Code', '<?= $_ITEM->__toStringWithLink("bluelink") ?>', array('OrderByClause' => QQ::OrderBy(QQN::Asset()->AssetCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Asset()->AssetCode, false), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    $this->dtgChildAssets->AddColumn(new QDataGridColumn('Asset Model', '<?= $_ITEM->AssetModel->__toStringWithLink("bluelink") ?>', array('OrderByClause' => QQ::OrderBy(QQN::Asset()->AssetModel->AssetModelCode, false), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Asset()->AssetModel->AssetModelCode), 'CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    $this->dtgChildAssets->AddColumn(new QDataGridColumn('Location', '<?= $_ITEM->Location->__toString() ?>', array('OrderByClause' => QQ::OrderBy(QQN::Asset()->Location->ShortDescription), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Asset()->Location->ShortDescription, false), 'CssClass' => "dtg_column")));
	    /*$this->dtgChildAssets->AddColumn(new QDataGridColumn('Status', '<?= $_ITEM->__toStringStatus() ?>', array('CssClass' => "dtg_column", 'HtmlEntities' => false)));
	    $this->dtgChildAssets->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RemoveInventoryColumn_Render($_ITEM) ?>', 'CssClass=dtg_column'));*/

	    $this->dtgChildAssets->SortColumnIndex = 1;

	    $objStyle = $this->dtgChildAssets->RowStyle;
	    $objStyle->ForeColor = '#000000';
	    $objStyle->BackColor = '#FFFFFF';
	    $objStyle->FontSize = 12;

	    $objStyle = $this->dtgChildAssets->AlternateRowStyle;
	    $objStyle->BackColor = '#EFEFEF';

	    $objStyle = $this->dtgChildAssets->HeaderRowStyle;
	    $objStyle->ForeColor = '#000000';
	    $objStyle->BackColor = '#EFEFEF';
	    $objStyle->CssClass = 'dtg_header';

	    $this->dtgChildAssets->ShowHeader = false;
		}

		protected function dtgChildAssets_Bind() {
		  if (!isset($this->objAsset)) {
	      $this->SetupAsset($this);
	    }
	    $this->dtgChildAssets->TotalItemCount = Asset::CountByParentAssetCode($this->objAsset->AssetCode);
	    if ($this->dtgChildAssets->TotalItemCount) {
	      $this->dtgChildAssets->ShowHeader = true;
	      $this->dtgChildAssets->DataSource = Asset::LoadArrayByParentAssetCode($this->objAsset->AssetCode, QQ::Clause($this->dtgChildAssets->OrderByClause));
	      $this->btnChildAssetsRemove->Enabled = true;
	      $this->btnReassign->Enabled = true;
	      $this->btnLinkToParent->Enabled = true;
	      $this->btnUnlink->Enabled = true;
	    }
	    else {
	      $this->dtgChildAssets->ShowHeader = false;
	      $this->btnChildAssetsRemove->Enabled = false;
	      $this->btnReassign->Enabled = false;
	      $this->btnLinkToParent->Enabled = false;
	      $this->btnUnlink->Enabled = false;
	    }
		}

		protected function dtgAssetTransaction_Bind() {
			// Get Total Count b/c of Pagination
			$this->ctlAssetEdit->dtgAssetTransaction->TotalItemCount = AssetTransaction::CountShipmentReceiptByAssetId($this->ctlAssetEdit->objAsset->AssetId, false);
			if ($this->ctlAssetEdit->dtgAssetTransaction->TotalItemCount === 0) {
				$this->ctlAssetEdit->dtgAssetTransaction->ShowHeader = false;
			}
			else {
				$this->ctlAssetEdit->dtgAssetTransaction->ShowHeader = true;
			}

			$objClauses = array();
			if ($objClause = $this->ctlAssetEdit->dtgAssetTransaction->OrderByClause)
				array_push($objClauses, $objClause);
			if ($objClause = $this->ctlAssetEdit->dtgAssetTransaction->LimitClause)
				array_push($objClauses, $objClause);
			if ($objClause = QQ::Expand(QQN::AssetTransaction()->Transaction->TransactionType))
				array_push($objClauses, $objClause);
			if ($objClause = QQ::Expand(QQN::AssetTransaction()->SourceLocation))
				array_push($objClauses, $objClause);
			if ($objClause = QQ::Expand(QQN::AssetTransaction()->DestinationLocation))
				array_push($objClauses, $objClause);

			$objCondition = QQ::AndCondition(QQ::Equal(QQN::AssetTransaction()->AssetId, $this->ctlAssetEdit->objAsset->AssetId), QQ::NotEqual(QQN::AssetTransaction()->Transaction->TransactionTypeId, 6), QQ::NotEqual(QQN::AssetTransaction()->Transaction->TransactionTypeId, 7));

			$this->ctlAssetEdit->dtgAssetTransaction->DataSource = AssetTransaction::QueryArray($objCondition, $objClauses);
		}

		protected function dtgShipmentReceipt_Bind() {
			// Get Total Count for Pagination

			$objClauses = array();

			$this->ctlAssetEdit->dtgShipmentReceipt->TotalItemCount = AssetTransaction::CountShipmentReceiptByAssetId($this->ctlAssetEdit->objAsset->AssetId);

			if ($this->ctlAssetEdit->dtgShipmentReceipt->TotalItemCount === 0) {
				$this->ctlAssetEdit->lblShipmentReceipt->Display = false;
				$this->ctlAssetEdit->dtgShipmentReceipt->ShowHeader = false;
			}
			else {

				$objClauses = array();
				if ($objClause = QQ::OrderBy(QQN::AssetTransaction()->Transaction->CreationDate, false)) {
					array_push($objClauses, $objClause);
				}
				if ($objClause = $this->ctlAssetEdit->dtgShipmentReceipt->LimitClause) {
					array_push($objClauses, $objClause);
				}
				if ($objClause = QQ::Expand(QQN::AssetTransaction()->Transaction->Shipment)) {
					array_push($objClauses, $objClause);
				}
				if ($objClause = QQ::Expand(QQN::AssetTransaction()->Transaction->Receipt)) {
					array_push($objClauses, $objClause);
				}
				if ($objClause = QQ::Expand(QQN::AssetTransaction()->SourceLocation)) {
					array_push($objClauses, $objClause);
				}
				if ($objClause = QQ::Expand(QQN::AssetTransaction()->DestinationLocation)) {
					array_push($objClauses, $objClause);
				}

				$objCondition = QQ::AndCondition(QQ::Equal(QQN::AssetTransaction()->AssetId, $this->ctlAssetEdit->objAsset->AssetId), QQ::OrCondition(QQ::Equal(QQN::AssetTransaction()->Transaction->TransactionTypeId, 6), QQ::Equal(QQN::AssetTransaction()->Transaction->TransactionTypeId, 7)));

				$this->ctlAssetEdit->dtgShipmentReceipt->DataSource = AssetTransaction::QueryArray($objCondition, $objClauses);
			}
		}

/*		protected function Form_Exit() {
			QApplication::$Database[1]->OutputProfiling();
		}*/
/*********************
CREATE FIELD METHODS
*********************/

  	// Create and Setup the Header Composite Control
  	protected function ctlHeaderMenu_Create() {
  		$this->ctlHeaderMenu = new QHeaderMenu($this);
  	}

  	// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}

		// Create the AssetEdit composite control
		protected function ctlAssetEdit_Create() {
			$this->ctlAssetEdit = new QAssetEditComposite($this);
		}

		// Create the AssetTransact Composite control
		protected function ctlAssetTransact_Create() {
			$this->ctlAssetTransact = new QAssetTransactComposite($this);
		}

		protected function btnChildAssetsRemove_Create() {
		  $this->btnChildAssetsRemove = new QButton($this);
		  $this->btnChildAssetsRemove->Text = "Remove";
		  $this->btnChildAssetsRemove->Enabled = false;
		  $this->btnChildAssetsRemove->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to REMOVE this Asset?'));
  		$this->btnChildAssetsRemove->AddAction(new QClickEvent(), new QAjaxAction('btnChildAssetsRemove_Click'));
  		$this->btnChildAssetsRemove->AddAction(new QEnterKeyEvent(), new QConfirmAction('Are you SURE you want to REMOVE this Asset?'));
  		$this->btnChildAssetsRemove->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnChildAssetsRemove_Click'));
  		$this->btnChildAssetsRemove->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function btnReassign_Create() {
		  $this->btnReassign = new QButton($this);
		  $this->btnReassign->Text = "Reassign";
		  $this->btnReassign->Enabled = false;
		}

		protected function btnLinkToParent_Create() {
		  $this->btnLinkToParent = new QButton($this);
		  $this->btnLinkToParent->Text = "Link to Parent";
		  $this->btnLinkToParent->Enabled = false;
		}

		protected function btnUnlink_Create() {
		  $this->btnUnlink = new QButton($this);
		  $this->btnUnlink->Text = "Unlink";
		  $this->btnUnlink->Enabled = false;
		}

		// Originally taken from AssetEditFormBase.inc
		// Altered because it is being called from a composite control
		public function SetupAsset($objCaller = null) {

			// Lookup Object PK information from Query String (if applicable)
			// Set mode to Edit or New depending on what's found
			// Overridden from AssetEditFormBase to add the $objCaller parameter
			$intAssetId = QApplication::QueryString('intAssetId');

			if (($intAssetId)) {

				$objCaller->objAsset = Asset::Load($intAssetId);

				if (!$objCaller->objAsset)
					throw new Exception('Could not find a Asset object with PK arguments: ' . $intAssetId);

				$objCaller->strTitleVerb = QApplication::Translate('Edit');
				$objCaller->blnEditMode = true;
			} else {
				$objCaller->objAsset = new Asset();
				$objCaller->strTitleVerb = QApplication::Translate('Create');
				$objCaller->blnEditMode = false;
			}
			QApplication::AuthorizeEntity($objCaller->objAsset, $objCaller->blnEditMode);
		}

		// Render the remove button column in the datagrid
		public function RemoveColumn_Render(Asset $objAsset) {

      $strControlId = 'btnChildAssetsRemove' . $objAsset->AssetId;
      $btnChildAssetsRemove = $this->GetControl($strControlId);
      if (!$btnChildAssetsRemove) {
          // Create the Remove button for this row in the DataGrid
          // Use ActionParameter to specify the ID of the asset
          $btnChildAssetsRemove = new QButton($this->ctlAssetTransact->dtgAssetTransact, $strControlId);
          $btnChildAssetsRemove->Text = 'Remove';
          $btnChildAssetsRemove->ActionParameter = $objAsset->AssetId;
          $btnChildAssetsRemove->AddAction(new QClickEvent(), new QAjaxAction('btnChildAssetsRemove_Click'));
          $btnChildAssetsRemove->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnChildAssetsRemove_Click'));
          $btnChildAssetsRemove->AddAction(new QEnterKeyEvent(), new QTerminateAction());
          $btnChildAssetsRemove->CausesValidation = false;
      }

      return $btnChildAssetsRemove->Render(false);
		}

		// Remove button click action for each asset in the datagrid
		public function btnRemove_Click($strFormId, $strControlId, $strParameter) {

			$intAssetId = $strParameter;
			if ($this->ctlAssetTransact->objAssetArray) {
				foreach ($this->ctlAssetTransact->objAssetArray as $key => $value) {
					if ($value->AssetId == $intAssetId) {
						unset ($this->ctlAssetTransact->objAssetArray[$key]);
					}
				}
			}
		}

		// Display the edit form
		public function DisplayEdit($blnDisplay) {
			if ($blnDisplay) {
				$this->ctlAssetEdit->Display = true;
			}
			else {
				$this->ctlAssetEdit->Display = false;
			}
		}

		// Display the transaction form
		public function DisplayTransaction($blnDisplay, $intTransactionTypeId = null) {
			if ($blnDisplay) {
				$this->ctlAssetTransact->SetupDisplay($intTransactionTypeId);
				$this->ctlAssetTransact->Display = true;
			}
			elseif ($this->ctlAssetTransact) {
				$this->ctlAssetTransact->Display = false;
			}
		}

		// This method is run when the asset model edit dialog box is closed
		public function CloseAssetModelEditPanel($blnUpdates) {
			$objPanel = $this->ctlAssetEdit->dlgNewAssetModel;
			$objPanel->HideDialogBox();
		}

		public function btnChildAssetsRemove_Click() {
      foreach ($this->dtgChildAssets->GetSelected("AssetId") as $intAssetId) {
        if ($objAsset = Asset::LoadByAssetId($intAssetId)) {
          $objAsset->ParentAssetCode = "";
          $objAsset->Save();
        }
      }
		}
	}

	// Run the form using the template asset_edit.php.inc to render the html
	AssetEditForm::Run('AssetEditForm', 'asset_edit.tpl.php');
?>