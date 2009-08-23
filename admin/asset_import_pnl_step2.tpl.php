<table width="100%">
	<tr>
	  <td class="title">Step 2: Map Fields and Import</td>
	</tr>
	<tr>
	  <td class="record_field_edit">
	    <table width="100%">
	     <tr>
	       <td width="100px">Select</td><td width="100px">Header Row</td><td>Default Value</td><td width="100px">Row1</td>
	     </tr>
	     <?php for ($i=0; $i<count($this->arrMapFields); $i++) { ?>
	     <tr>
	       <td><?php if (isset($this->lstMapHeaderArray[$i])) $this->lstMapHeaderArray[$i]->Render();//$this->arrMapFields[$i]['select_list']->Render(); ?></td>
	       <td nowrap><?php echo $this->arrMapFields[$i]['header']; ?></td>
	       <td><?php if (isset($this->txtMapDefaultValueArray[$i])) $this->txtMapDefaultValueArray[$i]->Render(); ?></td>
	       <td nowrap><?php echo $this->arrMapFields[$i]['row1']; ?></td>
	     </tr>
	     <?php } ?>
	    </table>
	  </td>
	</tr>
</table>