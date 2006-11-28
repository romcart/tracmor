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
?>

			<table cellpadding="0" cellspacing="0" style="padding-left:10px" border=0>
				<tr style="height:21px;">
					<td style="width:5px;background-image: url(../images/moduleTab_left.gif)"><img src="../images/empty.gif" width="5" height="1"></td>
					<td width="150" style="background-image: url(../images/moduleTab_middle.gif);font-family:arial;color:#555555;font-size:12px;font-weight:bold;">Shortcuts</td>
					<td style="background-image: url(../images/moduleTab_middle.gif)"><img src="../images/empty.gif" width="90" height="1"></td>
					<td style="5;background-image: url(../images/moduleTab_right.gif);"><img src="../images/empty.gif" width="5" height="1"></td>
				</tr>
				<tr>

					<td colspan="4" style="border-left:1px solid #aaaaaa;border-right:1px solid #aaaaaa;border-bottom:1px solid #aaaaaa;font-family:arial;color:#555555;font-size:12px;">
						<!-- Shortcuts  -->
						<table cellpadding="0" cellspacing="0" align="left" style="font-family:arial;color:#555555;font-size:12px;line-height:1.5" width="100%">
							<tr>
								<td><img src="../images/empty.gif" width="30" height="1"></td>
								<td style="border-left:1px solid #CCCCCC;"></td>
							</tr>
<?php						
		for ($i=0; $i<count($this->objShortcutArray); $i++) {

			echo ('<tr>');
			echo (sprintf('<td width="30" align="center"><img src="%s/icons/%s" name="shortcut%s"></td>', __IMAGE_ASSETS__, $this->objShortcutArray[$i]->__toStringIcon(), $i));
			echo (sprintf('<td style="border-left:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC;padding-left:5px;cursor:pointer;" onmouseover="this.style.backgroundColor=\'#EEEEEE\';" onmouseout="this.style.backgroundColor=\'#FFFFFF\';">%s</td>', $this->objShortcutArray[$i]->__toStringWithLink('graylink')));
			echo ('</tr>');
		}
?>
						</table>
					</td>
				</tr>
			</table>