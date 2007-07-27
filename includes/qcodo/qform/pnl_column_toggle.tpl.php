<?php
//if ($_CONTROL->ParentControl->ColumnLabels) {
if ($_CONTROL->ParentControl->ParentControl->ShowColumnToggle) {
	echo("Show/Hide Columns:");
	foreach ($_CONTROL->ParentControl->ColumnLabels as $lblColumn) {
		$lblColumn->Render();
	}
}
if ($_CONTROL->ParentControl->ParentControl->ShowExportCsv) {
	$_CONTROL->ParentControl->lblExportCsv->Render();
}
?>