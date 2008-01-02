<table cellspacing="0" cellpading="0" border="0">
	<tr>
		<td>
			<table cellspacing="0" cellpadding="0" border="0">
<?php
if ($_CONTROL->ParentControl->arrAttachments) {
	foreach ($_CONTROL->ParentControl->arrAttachments as $arrAttachment) {
		echo "<tr><td>";
		echo $arrAttachment['strAttachment'];
		echo '&nbsp;</td><td>';
		$arrAttachment['lblDelete']->Render();
		echo "</td></tr>";
	}
}
?>
			</table>
		</td>
	</tr>
</table>