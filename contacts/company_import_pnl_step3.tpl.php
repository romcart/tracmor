<table width="100%">
	<tr>
    <td><?php $this->lblImportResults->Render(); ?>
    <?php $this->lblImportSuccess->Render(); ?>
    <?php $this->btnUndoLastImport->Render(); ?>&nbsp;<?php $this->btnImportMore->Render(); ?>&nbsp;<?php $this->btnReturnTo->Render(); ?>
    <?php $this->lblImportCompanies->Render(); ?>
    <?php $this->dtgCompany->Render(); ?>
    <?php $this->lblImportUpdatedItems->Render(); ?>
	  <?php $this->dtgUpdatedItems->Render(); ?>
    </td>
	</tr>
</table>