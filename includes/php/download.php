<?php
/*
 * Copyright (c)  2009, Tracmor, LLC 
 *
 * This file is part of Tracmor.  
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version. 
 *	
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

require_once('../prepend.inc.php');

$objAttachment = Attachment::Load($_GET['attachment_id']);
// Check that the filenames exist
if ($objAttachment->TmpFilename == $_GET['tmp_filename']) {
	header("Content-Type: " . $objAttachment->FileType );
	header("Content-Length:" . $objAttachment->Size);
	header("Content-Disposition: attachment; filename=".$objAttachment->Filename);
	header("Content-Transfer-Encoding: binary");
	echo readfile($objAttachment->Path);
	exit();
}
else {
	echo("HACKING ATTEMPT");
	exit();
}
?>