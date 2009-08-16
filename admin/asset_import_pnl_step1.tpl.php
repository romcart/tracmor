<table width="100%">
	<tr>
	  <td class="title">Step 1 - Specify data source type and source file</td>
	</tr>
	<tr>
	  <td class="record_field_edit">
	    <table width="100%">
	     <tr>
	       <td><?php $this->lstFieldSeparator->RenderWithName(); ?><br />
	         <?php $this->txtFieldSeparator->RenderWithName(); ?></td>
	     </tr>
	     <tr>
	       <td><?php $this->lstTextDelimiter->RenderWithName(); ?><br />
	         <?php $this->txtTextDelimiter->RenderWithName(); ?></td>
	     </tr>
	     <tr>
	       <td><?php $this->flcFileCsv->RenderWithName(); ?></td>
	     </tr>
	     <tr>
	       <td><?php $this->chkHeaderRow->RenderWithName(); ?></td>
	     </tr>
	    </table>
	  </td>
	</tr>
</table>