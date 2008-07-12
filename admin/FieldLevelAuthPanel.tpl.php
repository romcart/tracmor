<table cellpadding="3" cellspacing="0">
<tr>
	<td class="role_table_left"></td>
	<td class="role_table_cell" style="text-align: left;font-weight: bold;"><?php echo EntityQtype::$NameArray[$_CONTROL->intEntityQtypeId]?></td>
	<td class="role_table_cell" style="text-align: center;"> <?php $_CONTROL->chkEntityView->Render()?></td>
	<td class="role_table_cell" style="text-align: center;"><?php $_CONTROL->chkEntityEdit->Render()?></td>
	<td class="role_table_cell" style="text-align: center;"></td>
</tr>
<tr>
	<td class="role_table_left"></td>
	<td class="record_field_name" style="text-align: right;">Built-in Fields</td>
	<td style="text-align: center; font-weight: bold;"><?php $_CONTROL->chkBuiltInView->Render();?></td>
	<td style="text-align: center;"><?php $_CONTROL->chkBuiltInEdit->Render();?></td>
	<td style="text-align: center;"></td>
</tr>
<?php
if($_CONTROL->arrCustomChecks){
	foreach ($_CONTROL->arrCustomChecks as $ChkCustomFields){
		echo "<tr>";
		echo '<td class="role_table_left"></td>';
		echo '<td class="record_field_name" style="text-align: right; ">'.$ChkCustomFields['name'].'</td>';
		echo '<td style="text-align: center;">'.$ChkCustomFields['view']->Render(false).'</td>';
		echo '<td style="text-align: center;">'.$ChkCustomFields['edit']->Render(false).'</td>';
		echo '<td style="text-align: center;"></td>';
		echo '</tr>';
	}
}
?>	
</table>