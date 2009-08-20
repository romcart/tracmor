<?php
/* This script updates all existing FedEx shipments with set values for
 * label_printer_type and label_format_type
 */
require_once('../includes/prepend.inc.php');
QApplication::Authenticate();
$objDatabase = FedexShipment::GetDatabase();
$strQuery = "UPDATE fedex_shipment SET label_printer_type = 1, label_format_type = 5;";
$objDatabase->NonQuery($strQuery);
echo "Updated!";
?>
