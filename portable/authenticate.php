<?php
require_once('../includes/prepend.inc.php');

$strError = "";

if ($_GET['menu_id']) {
	if ($_POST && is_numeric($_POST['user_account_id'])) {
		if (QApplication::$TracmorSettings->PortablePinRequired && $_POST['portable_user_pin']) {
			
			//QApplication::Redirect('./asset_move.php');
			//exit;
			
			require(__DATA_CLASSES__ . '/UserAccount.class.php');

			$intUserAccountId = $_POST['user_account_id'];
			$strPortableUserPin = $_POST['portable_user_pin'];
			
			$objUserAccount = UserAccount::LoadByUserAccountIdPortableUserPin($intUserAccountId, $strPortableUserPin);
			
			if (!$objUserAccount) {
				// authenticate error
				$strError = "That User ID and PIN did not authenticate. Please try again.";
			}
			else {
			  //$_SESSION['AuthenticateSuccess']=true;
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
						QApplication::Redirect('./asset_checkin.php');
						break;
					case 4:
						QApplication::Redirect('./asset_receive.php');
						break;
					case 5:
						QApplication::Redirect('./asset_inventory.php');
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
		}
	}
	
}
else {
	QApplication::Redirect('./index.php');
}

?>

<html>
<head>
<title>Tracmor Portable Interface - Authenticate</title>
<link rel="stylesheet" type="text/css" href="/css/portable.css">
<script type="text/javascript" src="<?php echo __JS_ASSETS__; ?>/portable.js"></script>
</head>
<body onload="document.main_form.user_account_id.focus();">

<h1>TRACMOR PORTABLE INTERFACE</h1>
<h3>Authenticate</h3>

<form method="post" name="main_form" onsubmit="javascript:return CheckIdPin();">
User ID: <input type="text" name="user_account_id" size="4"><br />
User PIN: <input type="text" name="portable_user_pin" onkeypress="javascript:if(event.keyCode=='13') CheckIdPin();" size="10"><br />
<input type="submit" value="Authenticate">
</form>
<p><?php echo $strError; ?></p>

</body>
</html>