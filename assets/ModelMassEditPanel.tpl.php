<?php
/**
 * @see ModelMassEditPanel
 *
 */
?>
<div class="title"> Model Mass Edit - <?php echo count($_CONTROL->arrModelsToEdit) ;?> records
</div>
<hr />
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
/**
 * @var ModelMassEditPanel $_CONTROL
 */
?>

<?php

// Build array of all fields to display
$arrAssetModelFields[] = array('checkbox' => $_CONTROL->chkShortDescription->RenderWithError(false),
                               'name'     => $_CONTROL->txtShortDescription->Name.':',
                               'value'    => $_CONTROL->txtShortDescription->RenderWithError(false));
$arrAssetModelFields[] = array('checkbox' => $_CONTROL->chkCategory->RenderWithError(false),
                               'name'     => $_CONTROL->lstCategory->Name.':',
                               'value'    => $_CONTROL->lstCategory->RenderWithError(false));
$arrAssetModelFields[] = array('checkbox' => $_CONTROL->chkManufacturer->RenderWithError(false),
                               'name'     => $_CONTROL->lstManufacturer->Name.':',
                               'value'    => $_CONTROL->lstManufacturer->RenderWithError(false));
$arrAssetModelFields[] = array('checkbox' => $_CONTROL->chkLongDescription->RenderWithError(false),
                               'name'     => $_CONTROL->txtLongDescription->Name.':',
                               'value'    => $_CONTROL->txtLongDescription->RenderWithError(false));
$arrAssetModelFields[] = array('checkbox' => $_CONTROL->chkImage->RenderWithError(false),
                               'name'     => $_CONTROL->ifcImage->Name.':',
                               'value'    => $_CONTROL->ifcImage->RenderWithError(false));


?>
<table class="datagrid" cellpadding="5" cellspacing="0" border="0" >

    <?php
    foreach ($arrAssetModelFields as $arrAssetModelField) {

        echo('<td class="record_field_name">' . $arrAssetModelField['name'] .'&nbsp;</td>');
        echo('<td class="record_field_value">'. $arrAssetModelField['checkbox']
                                              . $arrAssetModelField['value'] .'&nbsp;</td>');
        echo('</tr>');
    }

    // Custom Fields
    if($_CONTROL->arrCustomFields){
    foreach ($_CONTROL->arrCustomFields as $field) {
    if($field['blnView']){
        echo '<tr>';
        echo('<td class="record_field_name">'. $field['input']->Name .'&nbsp;</td>');
        echo('<td class="record_field_value">'. $_CONTROL->arrCheckboxes[$field['input']->ControlId]->Render(false)
        . $field['input']->RenderWithError(false).'&nbsp;</td>');
        echo('</tr>');
    }
    }
    }
    ?>
</table>
<table>
<tr>
    <td class="record_header" colspan="2">
        <?php
        $_CONTROL->btnCancel->Render(); echo('&nbsp;'); $_CONTROL->btnApply->Render();
        ?>
    </td>
</tr>
</table>

<?php
// Apply javascript action to execute ServerAction properly
$strForCustomFields = '';
if(count($_CONTROL->arrCustomFields)>0){
    foreach ($_CONTROL->arrCustomFields as $field) {
        $strForCustomFields.= sprintf('document.getElementById("%s").setAttribute("disabled",true);',$field['input']->ControlId);
    }
}
    QApplication::ExecuteJavaScript('
     document.getElementById("'.$_CONTROL->txtShortDescription->ControlId.'").setAttribute("disabled",true);
     document.getElementById("'.$_CONTROL->txtLongDescription->ControlId.'").setAttribute("disabled",true);
     document.getElementById("'.$_CONTROL->lstManufacturer->ControlId.'").setAttribute("disabled",true);
     document.getElementById("'.$_CONTROL->ifcImage->ControlId.'").setAttribute("disabled",true);
     document.getElementById("'.$_CONTROL->lstCategory->ControlId.'").setAttribute("disabled",true);
    '.$strForCustomFields);

?>
<script type="text/javascript" language="JavaScript">

</script>