<div class="title"> Company Mass Edit - <?php echo count($_CONTROL->arrCompaniesToEdit) ;?> records
</div>
<hr />
<?php  $_CONTROL->txtLongDescription->RenderWithName(); ?>
<?php  $_CONTROL->btnSave->Render();   ?>
<?php  $_CONTROL->btnCancel->Render(); ?>
