<table width="100%">
	<tr>
	  <td class="title">Step 2: Map Fields and Import</td>
	</tr>
	<tr>
	  <td class="record_field_edit">
	    <table style="border:1px solid #CCCCCC;width:100%">
	     <tr style="background-color:#CCCCCC;">
	       <td width="25%" style="font-family:verdana;font-weight:bold;font-size:11px;">Tracmor Field</td>
	       <?php if ($this->blnHeaderRow) { ?><td width="25%" style="font-family:verdana;font-weight:bold;font-size:11px;">Header Row</td><?php } ?>
	       <td style="font-family:verdana;font-weight:bold;font-size:11px;">Default Value</td>
	       <td width="25%" style="font-family:verdana;font-weight:bold;font-size:11px;">Row 1</td>
	     </tr>
	     <?php for ($i=0; $i<count($this->lstMapHeaderArray); $i++) { ?>
	     <tr>
	       <td style="font-size:11px;font-family:verdana;color:#464646"><?php if (isset($this->lstMapHeaderArray[$i])) $this->lstMapHeaderArray[$i]->RenderWithError(); ?></td>
	       <?php if ($this->blnHeaderRow) { ?><td nowrap style="font-size:11px;font-family:verdana;color:#464646"><?php if (isset($this->arrMapFields[$i]) && array_key_exists('header', $this->arrMapFields[$i])) echo $this->arrMapFields[$i]['header']; ?></td><?php } ?>
	       <td style="font-size:11px;font-family:verdana;color:#464646"><?php if (isset($this->txtMapDefaultValueArray[$i])) $this->txtMapDefaultValueArray[$i]->RenderWithError() . "&nbsp;" . $this->lstMapDefaultValueArray[$i]->RenderWithError() . "&nbsp;" . $this->dtpDateArray[$i]->RenderWithError(); ?></td>
	       <td nowrap style="font-size:11px;font-family:verdana;color:#464646"><?php if (isset($this->arrMapFields[$i])) echo $this->arrMapFields[$i]['row1']; elseif (isset($this->btnRemoveArray[$i])) $this->btnRemoveArray[$i]->Render(); ?></td>
	     </tr>
	     <?php } ?>
	    </table>
	  </td>
	</tr>
</table>