<table width="100%">
	<tr>
    <td><?php $this->lblImportResults->Render(); ?>
    <?php $this->lblImportSuccess->Render(); ?>
    <?php $this->btnUndoLastImport->Render(); ?>&nbsp;<?php $this->btnImportMore->Render(); ?>&nbsp;<?php $this->btnReturnToAssets->Render(); ?>
    <?php //$this->lblImportAssets->Render(); ?>
	  <?php //$this->dtgAsset->Render(); ?>
    <?php $this->lblImportUpdatedAssets->Render(); ?>
	  <?php $this->dtgUpdatedAsset->Render(); ?>
    <?php $this->lblImportModels->Render(); ?>
    <?php $this->dtgAssetModel->Render(); ?></td>
	</tr>
</table>