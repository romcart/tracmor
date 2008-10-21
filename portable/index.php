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
  <li style="margin-top:.5em;margin-bottom:.5em"><input type="button" onclick="document.location.href='asset_menu.php';" value="Manage Assets" style="width:90%;height:56px;font-size:24;"></li>
  <li style="margin-top:.5em;margin-bottom:.5em"><input type="button" onclick="document.location.href='inventory_menu.php';" value="Manage Inventory" style="width:90%;height:56px;font-size:24;"></li>
  </ol>

  <form method="post" name="main_form">
  <input type="hidden" name="method" value="menu">
  <input type="hidden" name="menu_id" value="">
  </form>

<?php
require_once('./includes/footer.inc.php');
?>
