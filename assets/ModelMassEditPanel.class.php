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

	// Specify the Location of the Template (feel free to modify) for this Panel
	protected $strTemplate = '../assets/ModelMassEditPanel.tpl.php';


	// Inputs for can be Edited
// 	public $txtLongDescription;

	public $arrModelsToEdit = array();

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
	}

	// Cancel Button Click Action
	public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		$this->ParentControl->RemoveChildControls(true);
		$this->CloseSelf(true);
	}
}
?>