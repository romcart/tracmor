<?php
require_once('../includes/prepend.inc.php');

if ($_POST && $_POST['method'] == 'menu' && is_numeric($_POST['menu_id'])) {
	
	QApplication::Redirect('./authenticate.php?menu_id='.$_POST['menu_id']);
	exit;
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
<li><a href="authenticate.php?menu_id=1">Move Assets</a></li>
<li><a href="authenticate.php?menu_id=2">Check Out Assets</a></li>
<li><a href="authenticate.php?menu_id=3">Check In Assets</a></li>
<li><a href="authenticate.php?menu_id=4">Receive Assets</a></li>
<li><a href="authenticate.php?menu_id=5">Take Physical Inventory</a></li>
<h3>Inventory Menu</h3>
<li><a href="authenticate.php?menu_id=6">Move Inventory</a></li>
<li><a href="authenticate.php?menu_id=7">Take Out Inventory</a></li>
<li><a href="authenticate.php?menu_id=8">Restock Inventory</a></li>
<li><a href="authenticate.php?menu_id=9">Take Physical Inventory</a></li>
</ol>

<form method="post" name="main_form">
<input type="hidden" name="method" value="menu">
<input type="text" name="menu_id" size="3">
<input type="submit" value="Submit">
</form>

</body>
</html>