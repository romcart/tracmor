<?php
require_once('../includes/prepend.inc.php');

if ($_POST && $_POST['method'] == 'asset_menu' && is_numeric($_POST['menu_id'])) {
	QApplication::Redirect('./authenticate.php?menu_id='.$_POST['menu_id']);
	exit;
}

$strTitle = "Asset Menu";
$strBodyOnLoad = "document.main_form.menu_id.value='';";
$strBodyOnKeyUp = " onkeyup=\"javascript:MenuSubmit(1, 5, event.keyCode);\"";

require_once('./includes/header.inc.php');
?>

  <ol>
  <li><a href="authenticate.php?menu_id=1">Move Assets</a></li>
  <li><a href="authenticate.php?menu_id=2">Check Out Assets</a></li>
  <li><a href="authenticate.php?menu_id=3">Check In Assets</a></li>
  <li><a href="authenticate.php?menu_id=4">Receive Assets</a></li>
  <li><a href="authenticate.php?menu_id=5">Assets Audit</a></li>
  </ol>
  <form method="post" name="main_form">
  <input type="hidden" name="method" value="asset_menu">
  <input type="hidden" name="menu_id" value="">
  </form>

<?php
require_once('./includes/footer.inc.php');
?>