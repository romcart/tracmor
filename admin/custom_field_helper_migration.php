<?php

require_once('../includes/prepend.inc.php');

//$arrEntityQtypeId = array(1,2,4,5,6,7,8,9,10,11);
$arrEntityQtypeId = array(9);

foreach ($arrEntityQtypeId as $intEntityQtypeId) {

	switch ($intEntityQtypeId) {
					case 1: 
					  $strTableName = "asset";
					  $strObjectId = "AssetId";
						$strId = 'asset`.`asset_id';
						$strHelperTable = '`asset_custom_field_helper`';
						break;
					case 2: 
						$strTableName = "inventory_model";
						$strObjectId = "InventoryModelId";
						$strId = 'inventory_model`.`inventory_model_id';
						$strHelperTable = '`inventory_model_custom_field_helper`';
						break;
					case 4: 
						$strTableName = "asset_model";
						$strObjectId = "AssetModelId";
						$strId = 'asset_model`.`asset_model_id';
						$strHelperTable = '`asset_model_custom_field_helper`';
						break;
					case 5: 
						$strTableName = "manufacturer";
						$strObjectId = "ManufacturerId";
						$strId = 'manufacturer`.`manufacturer_id';
						$strHelperTable = '`manufacturer_custom_field_helper`';
						break;
					case 6: 
						$strTableName = "category";
						$strObjectId = "CategoryId";
						$strId = 'category`.`category_id';
						$strHelperTable = '`category_custom_field_helper`';
						break;
					case 7: 
						$strTableName = "company";
						$strObjectId = "CompanyId";
						$strId = 'company`.`company_id';
						$strHelperTable = '`company_custom_field_helper`';
						break;
					case 8: 
						$strTableName = "contact";
						$strObjectId = "ContactId";
						$strId = 'contact`.`contact_id';
						$strHelperTable = '`contact_custom_field_helper`';
						break;
					case 9: 
						$strTableName = "address";
						$strObjectId = "AddressId";
						$strId = 'address`.`address_id';
						$strHelperTable = '`address_custom_field_helper`';
						break;
					case 10: 
						$strTableName = "shipment";
						$strObjectId = "ShipmentId";
						$strId = 'shipment`.`shipment_id';
						$strHelperTable = '`shipment_custom_field_helper`';
						break;
					case 11: 
						$strTableName = "receipt";
						$strObjectId = "ReceiptId";
						$strId = 'receipt`.`receipt_id';
						$strHelperTable = '`receipt_custom_field_helper`';
						break;
					default:
					  throw new Exception('Not a valid EntityQtypeId.');
	}
	$blnNoAlterTable = false;

	$objEntityQtypeCustomFieldArray = EntityQtypeCustomField::LoadArrayByEntityQtypeId($intEntityQtypeId, QQ::Clause(QQ::Expand(QQN::EntityQtypeCustomField()->CustomField)));

	if ($objEntityQtypeCustomFieldArray) {
		foreach ($objEntityQtypeCustomFieldArray as $objEntityQtypeCustomField) {
			echo 'ALTER TABLE ' . $strHelperTable . ' ADD cfv_' . $objEntityQtypeCustomField->CustomFieldId . " TEXT DEFAULT NULL;<br />";
		}
	}
	else {
	  $blnNoAlterTable = true;
	}

	$arrCustomFieldSql = array();
	$arrCustomFieldSql['strSelect'] = '';
	$arrCustomFieldSql['strFrom'] = '';
	$arrCustomFieldSql['strInsertColumnHeader'] = '';
	$arrCustomFieldSql['strInsertValues'] = '';

	if ($objEntityQtypeCustomFieldArray) {
		foreach ($objEntityQtypeCustomFieldArray as $objEntityQtypeCustomField) {
			$strAlias = $objEntityQtypeCustomField->CustomFieldId;
			$arrCustomFieldSql['strSelect'] .= sprintf(', `cfv_%s`.`short_description` AS `%s`', $strAlias, '__' . $strAlias);
			$arrCustomFieldSql['strFrom'] .= sprintf('LEFT JOIN (`custom_field_selection` AS `cfs_%s` JOIN `custom_field_value` AS `cfv_%s` ON `cfv_%s`.`custom_field_id` = %s AND `cfs_%s`.`custom_field_value_id` = `cfv_%s`.`custom_field_value_id` AND `cfs_%s`.`entity_qtype_id` = %s) ON `cfs_%s`.`entity_id` = `%s`', $strAlias, $strAlias, $strAlias, $strAlias, $strAlias, $strAlias, $strAlias, $intEntityQtypeId, $strAlias, $strId);
			$arrCustomFieldSql['strInsertColumnHeader'] .= sprintf(', %s', 'cfv_' . $strAlias);
		}
	}

	$strQuery = sprintf('
					SELECT
						`%s`.`%s_id` AS `%s_id`
						%s
					FROM
						`%s` AS `%s`
						%s
					WHERE
					1=1
				', $strTableName, $strTableName, $strTableName,
		    $arrCustomFieldSql['strSelect'],
		    $strTableName, $strTableName,
					$arrCustomFieldSql['strFrom']);
				
	$objDatabase = QApplication::$Database[1];
		
	$objDbResult = $objDatabase->Query($strQuery);
	
	switch ($intEntityQtypeId) {
	  case 1:
		$objArray = Asset::InstantiateDbResult($objDbResult);
		break;
	  case 2:
		$objArray = InventoryModel::InstantiateDbResult($objDbResult);
		break;
	  case 4:
		$objArray = AssetModel::InstantiateDbResult($objDbResult);
		break;
	  case 5:
		$objArray = Manufacturer::InstantiateDbResult($objDbResult);
		break;
	  case 6:
		$objArray = Category::InstantiateDbResult($objDbResult);
		break;
	  case 7:
		$objArray = Company::InstantiateDbResult($objDbResult);
		break;
	  case 8:
		$objArray = Contact::InstantiateDbResult($objDbResult);
		break;
		case 9:
		$objArray = Address::InstantiateDbResult($objDbResult);
		break;
	  case 10:
		$objArray = Shipment::InstantiateDbResult($objDbResult);
		break;
	  case 11:
		$objArray = Receipt::InstantiateDbResult($objDbResult);
		break;
	}
			
	if ($objArray) {
		foreach ($objArray as $obj) {
			$strInsertAssetSql = '';
			if ($objEntityQtypeCustomFieldArray) {
				foreach ($objEntityQtypeCustomFieldArray as $objEntityQtypeCustomField) {
					$strInsertAssetSql .= ", '" . addslashes($obj->GetVirtualAttribute($objEntityQtypeCustomField->CustomFieldId)) . "'";
				}
			}
			$strQuery = sprintf('INSERT INTO %s (%s_id %s) VALUES (%s %s);', $strHelperTable, $strTableName, $arrCustomFieldSql['strInsertColumnHeader'], $obj->$strObjectId, $strInsertAssetSql);
			echo ($strQuery . "<br />");
		}
	}
}

?>
