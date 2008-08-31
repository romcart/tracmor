<?php
require_once('../includes/prepend.inc.php');

$strWarning = null;

if ($_POST && $_POST['method'] == 'menu' && is_numeric($_POST['menu_id'])) {

	switch ($_POST['menu_id']) {
		case 1:
			QApplication::Redirect('./asset_menu.php');
			break;
		case 2:
			QApplication::Redirect('./inventory_menu.php');
			break;
		default:
		  $strWarning = "That is not a valid menu option";
		  break;
	}
}

$strTitle = "Main Menu";
$strBodyOnLoad = "document.main_form.menu_id.value='';";
$strBodyOnKeyUp = " onkeyup=\"javascript:MenuSubmit(1, 2, event.keyCode);\"";

require_once('./includes/header.inc.php');
?>
  <div id="warning"><?php echo $strWarning; ?></div>
  <ol>
  <li><a href="asset_menu.php">Manage Assets</a></li>
  <li><a href="inventory_menu.php">Manage Inventory</a></li>
  </ol>

  <form method="post" name="main_form">
  <input type="hidden" name="method" value="menu">
  <input type="hidden" name="menu_id" value="">
  </form>

<?php
require_once('./includes/footer.inc.php');
?>