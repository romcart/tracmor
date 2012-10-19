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
?>

<?php
// Include the classfile for CompanyEditPanelBase
require(__PANELBASE_CLASSES__ . '/AssetModelEditPanelBase.class.php');

class ModelMassEditPanel extends AssetModelEditPanelBase {

	/**
	 * @var  QCheckBox $chkImage
	 * @var  QCheckBox $chkCategory
	 * @var  QCheckBox $chkManufacturer
	 * @var  QCheckBox $chkLongDescription
	 * @var  QCheckBox $chkImage
	 */

	// Specify the Location of the Template (feel free to modify) for this Panel
	protected $strTemplate = '../assets/ModelMassEditPanel.tpl.php';


	// Inputs for can be Edited
    // public $txtLongDescription;

	public $arrModelsToEdit = array();
	public $arrFields = array();

	public $chkShortDescription;
	public $chkCategory;
	public $chkManufacturer;
	public $chkLongDescription;
	public $chkImage;
	public $btnApply;
	public $lblWarning;

	public function __construct($objParentObject, $strClosePanelMethod , $arrayModelId) {

		try {
			parent::__construct($objParentObject, $strClosePanelMethod);
		} catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}
		$this->arrModelsToEdit = $arrayModelId;
		$this->strOverflow = QOverflow::Auto;
		$this->btnSave->CausesValidation = QCausesValidation::SiblingsOnly;

		// Setup id for controls
		$this->lstCategory->strControlId = 'category';
		$this->lstManufacturer->strControlId = 'manufacturer';
		$this->txtShortDescription->strControlId = 'short_description';
		$this->txtImagePath->strControlId = 'image';
		$this->txtLongDescription->strControlId = 'long_description';

		// Disable inputs
		$this->lstCategory->Enabled = false;
		$this->lstManufacturer->Enabled = false;
		$this->txtShortDescription->Enabled = false;
		$this->txtImagePath->Enabled = false;
		$this->txtLongDescription->Enabled = false;

		$this->chkShortDescription_Create();
		$this->chkCategory_Create();
		$this->chkManufacturer_Create();
		$this->chkLongDescription_Create();
		$this->chkImage_Create();
		$this->btnApply_Create();



	}

	public function chkShortDescription_Create(){
		$this->chkShortDescription = new QCheckBox($this);
		$this->chkShortDescription->Name = 'short_description';
		$this->chkShortDescription->strControlId = 'chk_short_description';
		$this->chkShortDescription->Checked = false;
		$this->chkShortDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
	}

	public function chkCategory_Create(){
		$this->chkCategory = new QCheckBox($this);
		$this->chkCategory->Name = 'category';
		$this->chkCategory->strControlId = 'chk_category';
		$this->chkCategory->Checked = false;
		$this->chkCategory->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

	}

	public function chkManufacturer_Create(){
		$this->chkManufacturer = new QCheckBox($this);
		$this->chkManufacturer->Name = 'manufacturer';
		$this->chkManufacturer->strControlId = 'chk_manufacturer';
		$this->chkManufacturer->Checked = false;
		$this->chkManufacturer->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));

	}

	public function chkLongDescription_Create(){
		$this->chkLongDescription = new QCheckBox($this);
		$this->chkLongDescription->Name = 'long_description';
		$this->chkLongDescription->strControlId = 'chk_long_description';
		$this->chkLongDescription->Checked = false;
		$this->chkLongDescription->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
	}

	public function chkImage_Create(){
		$this->chkImage = new QCheckBox($this);
		$this->chkImage->strControlId = 'chk_image';
		$this->chkImage->Name = 'image';
		$this->chkImage->Checked = false;
		$this->chkImage->AddAction(new QClickEvent(), new QJavaScriptAction("enableInput(this)"));
	}

	public function btnApply_Create(){

		$this->btnApply = new QButton($this);
		$this->btnApply->Name = 'Apply';
		$this->btnApply->Text = 'Apply';
		$this->btnApply->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnApply_Click'));
		$this->btnApply->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnApply_Click'));
		$this->btnApply->AddAction(new QEnterKeyEvent(), new QTerminateAction());

	}

	public function lblWarning_Create(){
		$this->lblWarning = new QLabel($this);
		//$this->lblWarning->Class = 'warning';
	}

	public function btnApply_Click($strFormId, $strControlId, $strParameter){
		$this->ParentControl->RemoveChildControls(true);
		$this->CloseSelf(true);
	}

	// Cancel Button Click Action
	public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		$this->ParentControl->RemoveChildControls(true);
		$this->CloseSelf(true);
	}
}
?>