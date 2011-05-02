<table width="100%">
	<tr>
    <td><?php $this->lblImportResults->Render(); ?>
    <?php $this->lblImportSuccess->Render(); ?>
    <?php $this->btnUndoLastImport->Render(); ?>&nbsp;<?php $this->btnImportMore->Render(); ?>&nbsp;<?php $this->btnReturnTo->Render(); ?>
    <?php $this->lblImportCategories->Render(); ?>
    <?php $this->dtgCategory->Render(); ?>
    <?php //$this->lblImportManufacturers->Render(); ?>
    <?php //$this->dtgManufacturer->Render(); ?>
    <?php //$this->lblImportLocations->Render(); ?>
    <?php //$this->dtgLocation->Render(); ?>
    <?php $this->lblImportUpdatedItems->Render(); ?>
	  <?php $this->dtgUpdatedItems->Render(); ?>
    </td>
	</tr>
</table>