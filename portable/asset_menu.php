<?php
require_once('../includes/prepend.inc.php');

if ($_POST && $_POST['method'] == 'asset_menu' && is_numeric($_POST['menu_id'])) {
	QApplication::Redirect('./authenticate.php?menu_id='.$_POST['menu_id']);
	exit;
}

$strTitle = "Asset Menu";
$strBodyOnLoad = "document.main_form.menu_id.value='';";
$strBodyOnKeyUp = " onkeyup=\"javascript:MenuSubmit(1, 6, event.keyCode);\"";

require_once('./includes/header.inc.php');
?>

  <ol>
  <li style="margin-top:.5em;margin-bottom:.5em"><input type="button" onclick="document.location.href='authenticate.php?menu_id=1';" value="Move Assets" style="width:90%;height:56px;font-size:24;"></li>
  <li style="margin-top:.5em;margin-bottom:.5em"><input type="button" onclick="document.location.href='authenticate.php?menu_id=2';" value="Check Out Assets" style="width:90%;height:56px;font-size:24;"></li>
  <li style="margin-top:.5em;margin-bottom:.5em"><input type="button" onclick="document.location.href='authenticate.php?menu_id=3';" value="Check In Assets" style="width:90%;height:56px;font-size:24;"></li>
  <li style="margin-top:.5em;margin-bottom:.5em"><input type="button" onclick="document.location.href='authenticate.php?menu_id=4';" value="Receive Assets" style="width:90%;height:56px;font-size:24;"></li>
  <li style="margin-top:.5em;margin-bottom:.5em"><input type="button" onclick="document.location.href='authenticate.php?menu_id=5';" value="Assets Audit" style="width:90%;height:56px;font-size:24;"></li>
  <li style="margin-top:.5em;margin-bottom:.5em"><input type="button" onclick="document.location.href='index.php';" value="Main Menu" style="background-color:#CCCCCC;border:2px solid #000000;width:90%;height:56px;font-size:24;"></li>  
  </ol>
  <form method="post" name="main_form">
  <input type="hidden" name="method" value="asset_menu">
  <input type="hidden" name="menu_id" value="">
  </form>

<?php
require_once('./includes/footer.inc.php');
?>
