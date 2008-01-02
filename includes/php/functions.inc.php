<?php
/*
	 * Copyright (c)  2006, Universal Diagnostic Solutions, Inc. 
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

	/**
	 * This returns the html for either a check or an x based on the boolean value
	 *
	 * @param bool $blnValue
	 * @return string HTML img tag for the check or the string
	 */
	function BooleanImage($blnValue = true) {
				
		if ($blnValue) {
			$strToReturn = sprintf('<img src="%s">', '../images/icons/check.png');
		}
		else {
			$strToReturn = sprintf('<img src="%s">', '../images/icons/x.png');
		}
		
		return $strToReturn;
	}
	
	/**
	 * This moves a file from the local filesystem to the S3 file system provided in the tracmor_configuration.inc.php file
	 *
	 * @param string $strPath should not include trailing slash
	 * @param string $strFileName
	 * @param string $strType MIME type of the file
	 * @param string $strS3Path path to S3 folder (do not include bucket) - '/images/shipping_labels' for example
	 * @return bool
	 */
	// strPath and strS3Path should not include trailing slash but this will still work if it doesn't
	// strS3Path should include beginning slash '/images/shipping_labels' for example
	function MoveToS3($strPath, $strFileName, $strType, $strS3Path) {
		
		rtrim($strPath, '/');
		rtrim($strS3Path, '/');
		
		if (file_exists($strPath . '/' . $strFileName)) {
			require_once( __DOCROOT__ . __PHP_ASSETS__ . '/s3.class.php');
			$objS3 = new S3();
			$objS3->putBucket(AWS_BUCKET);
			
			$fh = fopen($strPath . '/' . $strFileName, 'rb');
			$contents = fread($fh, filesize($strPath . '/' . $strFileName));
			fclose($fh);
			$objS3->putObject($strFileName, $contents, AWS_BUCKET . $strS3Path, 'public-read', $strType);
			
			unlink($strPath . '/' . $strFileName);
			unset($objS3);
			return true;
		}
		else {
			return false;
		}
	}

?>