<?php
require_once('../includes/prepend.inc.php');

$strError = "";

if ($_GET['menu_id']) {
	if ($_POST && is_numeric($_POST['user_account_id'])) {
	  require(__DATA_CLASSES__ . '/UserAccount.class.php');
		$intUserAccountId = $_POST['user_account_id'];
		$objUserAccount = false;
		
		if (QApplication::$TracmorSettings->PortablePinRequired && $_POST['portable_user_pin']) {
			$strPortableUserPin = $_POST['portable_user_pin'];
			$objUserAccount = UserAccount::LoadByUserAccountIdPortableUserPin($intUserAccountId, $strPortableUserPin);
			if (!$objUserAccount) {
  			// authenticate error
  			$strError = "That User ID and PIN did not authenticate. Please try again.";
		  }
		}
		else {
		  $strError = "You must enter a PIN. Please try again.";
		}
		
		if (!(QApplication::$TracmorSettings->PortablePinRequired)) {
		  $objUserAccount = UserAccount::LoadByUserAccountId($intUserAccountId);
		  if (!$objUserAccount) {
  			// authenticate error
  			$strError = "That is not a valid User ID. Please try again.";
		  }
		}

		if ($objUserAccount) {
		  $_SESSION['intUserAccountId'] = $objUserAccount->UserAccountId;
		  // Authenticate user and redirect to proper transaction page based on menu_id
			switch ($_GET['menu_id']) {
				case 1:
					QApplication::Redirect('./asset_move.php');
					break;
				case 2:
					QApplication::Redirect('./asset_checkout.php');
					break;
				case 3:
					QApplication::Redirect('./asset_check_in.php');
					break;
				case 4:
					QApplication::Redirect('./asset_receive.php');
					break;
				case 5:
					QApplication::Redirect('./asset_audit.php');
					break;
				case 6:
					QApplication::Redirect('./inventory_move.php');
					break;
				case 7:
					QApplication::Redirect('./inventory_take_out.php');
					break;
				case 8:
					QApplication::Redirect('./inventory_restock.php');
					break;
				case 9:
					QApplication::Redirect('./inventory_audit.php');
					break;
				default:
				  QApplication::Redirect('./index.php');
				  break;
			}
		}
	}
	elseif ($_POST && !is_numeric($_POST['user_account_id'])) {
	  $strError = "That is not a valid User ID. Please try again.";
	}
}
else {
	QApplication::Redirect('./index.php');
}

$strTitle = "Authenticate";
$strBodyOnLoad = "document.main_form.user_account_id.focus();";

require_once('./includes/header.inc.php');

if (QApplication::$TracmorSettings->PortablePinRequired) {
?>
  <form method="post" name="main_form" onsubmit="javascript:return CheckIdPin();">
  <table border=0 style="padding-top:16px;">
    <tr>
      <td align="right"><h2>User ID:</h2></td><td valign="top"><input type="text" name="user_account_id" style="width:120px;font-size:32;border:2px solid #AAAAAA;background-color:#FFFFFF;" onfocus="this.style.backgroundColor='lightyellow'" onblur="this.style.backgroundColor='#FFFFFF'"></td>
    </tr>
    <tr>
      <td align="right"><h2>User PIN:</h2></td><td valign="top"><input type="text" name="portable_user_pin" onkeypress="javascript:if(event.keyCode=='13') CheckIdPin();" style="width:120px;font-size:32;border:2px solid #AAAAAA;background-color:#FFFFFF;" onfocus="this.style.backgroundColor='lightyellow'" onblur="this.style.backgroundColor='#FFFFFF'"></td>
    </tr>

<?php
}
else {
?>
  <form method="post" name="main_form">
  <table border=1 width="100%" style="padding-top:16px;">
    <tr>
      <td align="right"><h2>User ID:</h2></td><td valign="top"><input type="text" name="user_account_id" onkeypress="javascript:if(event.keyCode=='13') document.main_form.submit();" style="width:120px;font-size:32;border:2px solid #AAAAAA;background-color:#FFFFFF;" onfocus="this.style.backgroundColor='lightyellow'" onblur="this.style.backgroundColor='#FFFFFF'"><br />
<?php
}
?>
  <tr>
  	<td colspan="2" align="center"><input type="submit" value="Authenticate" style="width:216px;height:56px;font-size:24;"></td>
  </tr>
  </form>
  </table>  
  <p><?php echo $strError; ?></p>

<?php
require_once('./includes/footer.inc.php');
?>
