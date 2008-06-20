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

$strTitle = "Main Menu";
$strBodyOnLoad = "document.main_form.menu_id.value=''; document.main_form.menu_id.focus();";

require_once('./includes/header.inc.php');
?>

  <ol>
  <li><a href="asset_menu.php">Manage Assets</a></li>
  <li><a href="inventory_menu.php">Manage Inventory</a></li>
  </ol>
  
  <form method="post" name="main_form">
  <input type="hidden" name="method" value="menu">
  <input type="text" name="menu_id" onkeypress="javascript:if(event.keyCode=='13') document.main_form.submit();" size="3">
  <input type="submit" value="Submit">
  </form>

<?php
require_once('./includes/footer.inc.php');
?>