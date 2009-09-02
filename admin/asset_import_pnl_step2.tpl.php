<table width="100%">
	<tr>
	  <td class="title">Step 2: Map Fields and Import</td>
	</tr>
	<tr>
	  <td class="record_field_edit">
	    <table style="border:1px solid #CCCCCC;width:100%">
	     <tr style="background-color:#CCCCCC;">
	       <td width="100px" style="font-family:verdana;font-weight:bold;font-size:11px;">Tracmor Field</td>
	       <?php if ($this->blnHeaderRow) { ?><td width="100px" style="font-family:verdana;font-weight:bold;font-size:11px;">Header Row</td><?php } ?>
	       <td style="font-family:verdana;font-weight:bold;font-size:11px;">Default Value</td>
	       <td width="100px" style="font-family:verdana;font-weight:bold;font-size:11px;">Row 1</td>
	     </tr>
	     <?php for ($i=0; $i<count($this->arrMapFields); $i++) { ?>
	     <tr>
	       <td style="font-size:11px;font-family:verdana;color:#464646"><?php if (isset($this->lstMapHeaderArray[$i])) $this->lstMapHeaderArray[$i]->RenderWithError(); ?></td>
	       <?php if ($this->blnHeaderRow) { ?><td nowrap style="font-size:11px;font-family:verdana;color:#464646"><?php echo $this->arrMapFields[$i]['header']; ?></td><?php } ?>
	       <td style="font-size:11px;font-family:verdana;color:#464646"><?php if (isset($this->txtMapDefaultValueArray[$i])) $this->txtMapDefaultValueArray[$i]->RenderWithError() . "&nbsp;" . $this->lstMapDefaultValueArray[$i]->RenderWithError(); ?></td>
	       <td nowrap style="font-size:11px;font-family:verdana;color:#464646"><?php echo $this->arrMapFields[$i]['row1']; ?></td>
	     </tr>
	     <?php } ?>
	    </table>
	  </td>
	</tr>
</table>