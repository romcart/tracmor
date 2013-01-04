<?php
/**
 * @see ShipmentMassEditPanel
 * @var  QCheckBox      $chkFromCompany
 * @var  QCheckBox      $chkToCompany
 * @var  QCheckBox      $chkNote
 * @var  QCheckBox      $chkDateDue
 * @var  QCheckBox      $chkDateReceived
 */

?>
<div class="title"> Receipt Mass Edit - <?php echo count($_CONTROL->arrReceiptToEdit) ;?> records
</div>
<hr />
Select fields to be updated and provide new values.
<table>
    <tr>
        <td><?php $_CONTROL->chkFromCompany->Render(); ?></td>
        <td><?php echo $_CONTROL->lstFromCompany->Name;?></td>
        <td><?php $_CONTROL->lstFromCompany->Render(); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $_CONTROL->lstFromContact->Name;?></td>
        <td><?php $_CONTROL->lstFromContact->Render(); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $_CONTROL->lstFromAddress->Name;?></td>
        <td><?php $_CONTROL->lstFromAddress->Render(); ?></td>
    </tr>
    <tr>
        <td><?php $_CONTROL->chkToCompany->Render(); ?></td>
        <td><?php echo $_CONTROL->lstToCompany->Name;?></td>
        <td><?php $_CONTROL->lstToCompany->Render(); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $_CONTROL->lstToContact->Name;?></td>
        <td><?php $_CONTROL->lstToContact->Render(); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $_CONTROL->lstToAddress->Name;?></td>
        <td><?php $_CONTROL->lstToAddress->Render(); ?></td>
    </tr>
    <tr>
        <td><?php $_CONTROL->chkNote->Render();     ?></td>
        <td><?php echo $_CONTROL->txtNote->Name;    ?></td>
        <td><?php $_CONTROL->txtNote->Render();     ?></td>
    </tr>
    <tr>
        <td><?php $_CONTROL->chkDateDue->Render();  ?></td>
        <td><?php echo $_CONTROL->calDateDue->Name; ?></td>
        <td><?php $_CONTROL->calDateDue->Render()   ?></td>
    </tr>
    <tr>
        <td><?php $_CONTROL->chkDateReceived->Render();  ?></td>
        <td><?php echo $_CONTROL->calDateReceived->Name; ?></td>
        <td><?php $_CONTROL->calDateReceived->Render()   ?></td>
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
<?php $_CONTROL->btnCancel->Render(); ?><?php $_CONTROL->btnApply->Render(); ?>
