<?php
require_once('../includes/prepend.inc.php');

if ($_POST && $_POST['method'] == 'menu' && is_numeric($_POST['menu_id'])) {
	
	switch ($_POST['menu_id']) {
		case 1:
			QApplication::Redirect('./asset_menu.php');
			break;
		case 2:
			QApplication::Redirect('./inventory_menu.php');
			break;
	}
}
?>

<html>
<head>
<title>Tracmor Portable Interface - Main Menu</title>
<link rel="stylesheet" type="text/css" href="/css/portable.css">
</head>
<body onload="document.main_form.menu_id.value=''; document.main_form.menu_id.focus();">

<h1>TRACMOR PORTABLE INTERFACE</h1>
<ol>
<h3>Main Menu</h3>
<li><a href="asset_menu.php">Manage Assets</a></li>
<li><a href="inventory_menu.php">Manage Inventory</a></li>
</ol>

<form method="post" name="main_form">
<input type="hidden" name="method" value="menu">
<input type="text" name="menu_id" size="3">
<input type="submit" value="Submit">
</form>

</body>
</html>