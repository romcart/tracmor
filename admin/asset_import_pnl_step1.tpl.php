<table width="100%">
	<tr>
	  <td class="title">Step 1: Upload import file</td>
	</tr>
	<tr>
	  <td class="record_field_edit">
	    <table width="100%">
	     <tr>
	       <td><?php $this->lstFieldSeparator->Render(); ?>&nbsp;<?php $this->txtFieldSeparator->Render(); ?></td>
	     </tr>
	     <tr>
	       <td><?php $this->lstTextDelimiter->RenderWithName(); ?>&nbsp;<?php $this->txtTextDelimiter->Render(); ?></td>
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