<table width="100%">
	<tr>
	  <td class="title">Import Results</td>
	</tr>
	<tr>
	  <td class="title">Last Imported Asset Models</td>
	</tr>
	<tr>
	  <td><?php $this->dtgAssetModel->Render(); ?></td>
	</tr>
	<tr>
	  <td class="title">Last Imported Categories</td>
	</tr>
	<tr>
	  <td><?php $this->dtgCategory->Render(); ?></td>
	</tr>
	<tr>
	  <td class="title">Last Imported Manufacturers</td>
	</tr>
	<tr>
	  <td><?php $this->dtgManufacturer->Render(); ?></td>
	</tr>
	<tr>
	  <td class="title">Last Imported Locations</td>
	</tr>
	<tr>
	  <td><?php $this->dtgLocation->Render(); ?></td>
	</tr>
</table>