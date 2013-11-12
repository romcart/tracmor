<?php

require('../prepend.inc.php');

QApplication::DrawBarcode($_REQUEST['code'], true);

?>