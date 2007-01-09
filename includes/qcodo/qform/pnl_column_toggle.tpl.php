<?php
if ($_CONTROL->ParentControl->ColumnLabels) {
	foreach ($_CONTROL->ParentControl->ColumnLabels as $lblColumn) {
		$lblColumn->Render();
	}
}
?>