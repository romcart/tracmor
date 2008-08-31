<?php
require_once('../includes/prepend.inc.php');

if ($_POST && $_POST['method'] == 'inventory_menu' && is_numeric($_POST['menu_id'])) {
	$intMenuId = intval($_POST['menu_id']) + 5;
	QApplication::Redirect('./authenticate.php?menu_id='.$intMenuId);
	exit;
}

$strTitle = "Inventory Menu";
$strBodyOnLoad = "document.main_form.menu_id.value='';";
$strBodyOnKeyUp = " onkeyup=\"javascript:MenuSubmit(1, 4, event.keyCode);\"";

require_once('./includes/header.inc.php');
?>

  <ol>
  <li><a href="authenticate.php?menu_id=6">Move Inventory</a></li>
  <li><a href="authenticate.php?menu_id=7">Take Out Inventory</a></li>
  <li><a href="authenticate.php?menu_id=8">Restock Inventory</a></li>
  <li><a href="authenticate.php?menu_id=9">Inventory Audit</a></li>
  </ol>

  <form method="post" name="main_form">
  <input type="hidden" name="method" value="inventory_menu">
  <input type="hidden" name="menu_id" value="">
  </form>

<?php
require_once('./includes/footer.inc.php');
?>