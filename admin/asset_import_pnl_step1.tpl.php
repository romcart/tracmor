<table width="100%">
	<tr>
	  <td class="title">Step 1: Upload import file</td>
	</tr>
	<tr>
	  <td class="record_field_edit">
	    <table width="100%">
	     	<!--<tr>
	       	<td><?php //$this->lstFieldSeparator->Render(); ?>&nbsp;<?php //$this->txtFieldSeparator->Render(); ?></td>
	     	</tr>-->
	     	<tr>
	     		<td>
	     			<table width="14%" border="0" cellpadding="0" cellspacing="0">
	     				<tr>
	     					<td width="50px"><?php $this->lstFieldSeparator->Render(); ?></td><td valign="bottom"><?php $this->txtFieldSeparator->Render(); ?></td>
	     				</tr>
	     			</table>
	     		</td>
	     	</tr>
	     	<tr>
	     		<td>&nbsp;</td>
	     	</tr>
	     	<tr>
	     		<td>
	       		<table width="27%" border="0" cellpadding="0" cellspacing="0">
	       			<tr>
	       				<td><?php $this->lstTextDelimiter->RenderWithName(); ?></td><td><?php $this->txtTextDelimiter->Render(); ?></td>
	       			</tr>
	       		</table>
	       	</td>
	     	</tr>
	      <tr>
	     		<td>&nbsp;</td>
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