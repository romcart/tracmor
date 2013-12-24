<div class="title"> Contact Mass Edit - <?php echo count($_CONTROL->arrContactToEdit) ;?> records
</div>
<hr />
Select fields to be updated and provide new values.
<table>
    <tr>
        <td><?php $_CONTROL->chkDescription->Render();              ?></td>
        <td><?php echo $_CONTROL->txtDescription->Name;             ?></td>
        <td><?php $_CONTROL->txtDescription->RenderWithError();?></td>
    </tr>
    <tr>
        <td><?php $_CONTROL->chkCompany->Render();                   ?></td>
        <td><?php echo $_CONTROL->lstCompany->Name;                  ?></td>
        <td><?php $_CONTROL->lstCompany->RenderWithError();     ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $_CONTROL->lstAddress->Name;              ?></td>
        <td><?php $_CONTROL->lstAddress->RenderWithError(); ?></td>
    </tr>
    <?php
    // Custom Fields
    if ($_CONTROL->arrCustomFields) {
        foreach ($_CONTROL->arrCustomFields as $field) {
            if($field['blnView']){
                ?>
                <tr>
                    <td><?php $_CONTROL->arrCheckboxes[$field['input']->ControlId]->Render(); ?></td>
                    <td><?php echo $field['input']->Name; ?>
                    <td><?php echo $field['input']->RenderWithError(false); ?></td>
                </tr><?php
            }
        }
    }
    ?>
</table>
<br />
<?php  $_CONTROL->btnMassEditCancel->Render(); ?><?php  $_CONTROL->btnMassEditApply->Render(); ?>

