<table width="100%">
	<tr>
	  <td class="title">Step 1: Upload import file</td>
	</tr>
	<tr>
	  <td class="record_field_edit">
	    <table width="100%">
	     	<tr>
	       	<td class="record_field_name"><?php $this->lstFieldSeparator->Render(); ?><?php $this->txtFieldSeparator->Render(); ?></td>
	     	</tr>
	     	<!--
	     	<tr>
	     		<td>
	     			<table width="250" border="0" cellpadding="0" cellspacing="0">
	     				<tr>
	     					<td><?php //$this->lstFieldSeparator->Render(); ?></td><td valign="bottom"><?php //$this->txtFieldSeparator->Render(); ?></td>
	     				</tr>
	     			</table>
	     		</td>
	     	</tr>
	     	-->
	     	<tr>
	     		<td>&nbsp;</td>
	     	</tr>
	     	<tr>
	     		<td>
	       		<table width="380" border="0" cellpadding="0" cellspacing="0">
	       			<tr>
	       				<td class="record_field_name"><?php $this->lstTextDelimiter->RenderWithName(); ?></td><td><?php $this->txtTextDelimiter->Render(); ?></td>
	       			</tr>
	       		</table>
	       	</td>
	     	</tr>
	      <tr>
	     		<td>&nbsp;</td>
	     	</tr>
	     	<tr>
	       	<td class="record_field_name" style="text-align:left;">Select File:<br /><?php $this->flcFileCsv->Render(); ?></td>
	     	</tr>
	     	<tr>
	       	<td class="record_field_name" style="text-align: left;"><?php $this->chkHeaderRow->Render(); ?>&nbsp;Header Row</td>
	     	</tr>
	    </table>
	  </td>
	</tr>
</table>