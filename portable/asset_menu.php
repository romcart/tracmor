<?php
require_once('../includes/prepend.inc.php');

if ($_POST && $_POST['method'] == 'menu' && is_numeric($_POST['menu_id'])) {
	
	switch ($_POST['menu_id']) {
		case 1:
			QApplication::Redirect('./assets_move.php');
			break;
		case 2:
			QApplication::Redirect('./assets_checkout.php');
			break;
		case 3:
			QApplication::Redirect('./assets_checkin.php');
			break;
		case 4:
			QApplication::Redirect('./assets_receive.php');
			break;
		case 5:
			QApplication::Redirect('./assets_inventory.php');
			break;
		case 6:
			QApplication::Redirect('./inventory_move.php');
			break;
		case 7:
			QApplication::Redirect('./inventory_takeout.php');
			break;
		case 8:
			QApplication::Redirect('./inventory_restock.php');
			break;
		case 9:
			QApplication::Redirect('./inventory_inventory.php');
			break;
	}
}
?>

<html>
<head>
<title>Tracmor Portable Interface - Asset Menu</title>
<link rel="stylesheet" type="text/css" href="/css/portable.css">
</head>
<body onload="document.main_form.menu_id.value=''; document.main_form.menu_id.focus();">

<h1>TRACMOR PORTABLE INTERFACE</h1>
<ol>
<h3>Asset Menu</h3>
<li><a href="asset_move.php">Move Assets</a></li>
<li><a href="asset_checkout.php">Check Out Assets</a></li>
<li><a href="asset_checkin.php">Check In Assets</a></li>
<li><a href="asset_receive.php">Receive Assets</a></li>
<li><a href="asset_inventory.php">Take Physical Inventory</a></li>
<h3>Inventory Menu</h3>
<li><a href="inventory_move.php">Move Inventory</a></li>
<li><a href="inventory_takeout.php">Take Out Inventory</a></li>
<li><a href="inventory_restock.php">Restock Inventory</a></li>
<li><a href="inventory_inventory.php">Take Physical Inventory</a></li>
</ol>

<form method="post" name="main_form">
<input type="hidden" name="method" value="menu">
<input type="text" name="menu_id" size="3">
<input type="submit" value="Submit">
</form>

</body>
</html>