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
?>

	<body marginwidth="0" marginheight="0" topmargin="0" leftmargin="0">
	
	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<table cellpadding="0" cellspacing="0" width="100%" style="background:url(../images/main_header_bg.png)">
					<tr style="height:64px">
						<td>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td style="padding-left:15px;padding-top:6px;"><?php $this->lblLogo->Render(); ?></td>
									<td style="padding-right:10px;text-align:right;" align="right" width="100%" valign="top"><a href="<?php print '../preferences/'; ?>" style="color:#555555;font-family:arial;font-size:12px;text-decoration:none;font-weight:bold;">Preferences</a>&nbsp;&nbsp;|&nbsp;&nbsp;<?php $this->lblSignOut->Render(); ?></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table cellpadding="0" cellspacing="0">
								<tr style="height:24px">
									<td style="width:15px;background-image: url(../images/emptyTabSpace.gif); background-repeat:repeat-x;"><img src="../images/empty.gif" width="15" height="1"></td>
									<?php
									
										if ($this->objRoleModuleArray) {
											foreach ($this->objRoleModuleArray as $objRoleModule) {
												$link = '../' . $objRoleModule->Module->ShortDescription . '/';
												if (QApplication::$objRoleModule && QApplication::$objRoleModule->ModuleId == $objRoleModule->ModuleId) {
													$strTabClass = 'current_tab_';
												}
												else {
													$strTabClass = 'other_tab_';
												}
												echo(sprintf('<td class="%sleft"><img src="../images/empty.gif" width="12" height="1"></td>', $strTabClass));
												echo(sprintf('<td class="%smiddle"><a href="%s" class="%slabel" border="0">%s</a></td>', $strTabClass, $link, $strTabClass, ucfirst($objRoleModule->Module->ShortDescription)));
												echo(sprintf('<td class="%sright"><img src="../images/empty.gif" width="12" height="1"></td>', $strTabClass));
												echo('<td class="empty_tab_space"><img src="../images/empty.gif" width="1" height="1"></td>');
											}
										}
									?>
									<?php

										if (QApplication::$objUserAccount->AdminFlag) {
											if (QApplication::$objRoleModule) {
												$strTabClass = 'other_tab_';
											}
											else {
												$strTabClass = 'current_tab_';
											}
											echo(sprintf('<td class="%sleft"><img src="../images/empty.gif" width="12" height="1"></td>', $strTabClass));
											echo(sprintf('<td class="%smiddle"><a href="%s" class="%slabel">Admin</a></td>', $strTabClass, '../admin/', $strTabClass));
											echo(sprintf('<td class="%sright"><img src="../images/empty.gif" width="12" height="1"></td>', $strTabClass));
										}
									?>
									<td class="empty_tab_space" width="100%">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr style="height:20px;background-color:#acacac">
						<td>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<?php 
										echo(sprintf('<td width="100%%" style="padding-left:10px;font-family:arial;color:#FFFFFF;font-size:12px;font-weight:bold;">Welcome %s</td>', QApplication::$objUserAccount->FirstName));
									?>
									<td><?php $this->objParentObject->DefaultWaitIcon->Render(); ?></td>
									<!--<td><img src="../images/searchSeparator.gif"></td>-->
									<!--<td style="padding-left:5px;padding-right:5px;font-family:arial;color:#FFFFFF;font-size:12px;font-weight:bold;">Search</td>
									<td style="padding-left:5px;padding-right:5px;"><input type="text" style="border:1px solid #000000;font-size:12px;font-family:arial;"></td>
									<td style="padding-right:15px;"><input type="submit" value="Go" style="font-family:arial;font-size:12px;font-weight:bold;"></td>-->
								</tr>
							</table>
						</td>
					</tr>
					<tr style="height:1px;background-color:#787878;">
						<td></td>
					</tr>					
					<!--<tr style="height:20px;background-color:#dddddd">
						<td>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td style="padding-left:10px;font-family:arial;color:#555555;font-size:12px;font-weight:bold;">Last Viewed:</td>
									<td></td>
								</tr>
							</table>
						</td>
					</tr>-->
				</table>
			</td>
		</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr style="height:10px;">
		<td></td>
	</tr>
	<tr>
		<td valign="top">
