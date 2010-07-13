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

	include(__INCLUDES__ . '/header.inc.php');
	$this->RenderBegin();
?>

<table cellpadding="0" cellspacing="0" width="100%" style="background:url(../images/main_header_bg.png); background-repeat: repeat-x;">
	<tr style="height:40px">
		<td>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;padding-top:16px;"><?php $this->lblLogo->Render(); ?></td>
					<td style="padding-right:10px;text-align:right;" align="right" width="100%" valign="top"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0" style="width:100%;">
				<tr style="height:24px">
					<td style="width:15px;background-image: url(../images/emptyTabSpace.gif); background-repeat:repeat-x;"><img src="../images/empty.gif" width="15" height="1"></td>
						<!--echo(sprintf('<td class="%sleft"><img src="../images/empty.gif" width="12" height="1"></td>', $strTabClass));
						echo(sprintf('<td class="%smiddle"><a href="%s" class="%slabel" border="0">%s</a></td>', $strTabClass, $link, $strTabClass, ucfirst($objRoleModule->Module->ShortDescription)));
						echo(sprintf('<td class="%sright"><img src="../images/empty.gif" width="12" height="1"></td>', $strTabClass));
						echo('<td class="empty_tab_space"><img src="../images/empty.gif" width="1" height="1"></td>');-->
	
					<td class="empty_tab_space" width="100%">&nbsp;</td>
				</tr>
			</table>
		</td>	
	</tr>
	<tr style="height:20px;background-color:#acacac">
		<td>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td width="100%" style="padding-left:10px;font-family:arial;color:#FFFFFF;font-size:12px;font-weight:bold;">Welcome</td>
					<td><img src="./images/searchSeparator.gif"></td><!--
					<td style="padding-left:5;padding-right:5;font-family:arial;color:#FFFFFF;font-size:12;font-weight:bold;"></td>
					<td style="padding-left:5;padding-right:5;"><input type="text" style="border:1px solid #000000;font-size:12;font-family:arial;"></td>
					<td style="padding-right:15;"><input type="submit" value="Go" style="font-family:arial;font-size:12;font-weight:bold;"></td>-->
				</tr>
			</table>
		</td>
	</tr>
	<tr style="height:1px;background-color:#000000;">
		<td></td>
	</tr>
	<tr style="height:20px;background-color:#dddddd">
		<td></td>
	</tr>
	<tr style="height:1px;background-color:#cccccc;">
		<td></td>
	</tr>
</table>

<table width="100%">
	<tr height="300">
		<td align="center">
			<table align="center" width="300">
				<tr>
					<td style="text-align:center;"><img src="images/tracmor_logo.png"></td>
				</tr>
				<tr>
					<td>
						<table style="border:1px solid #AAAAAA;background-color:#eef2f6;padding:5px;" width="300">
							<tr>
								<td>
									<img src="./images/lock.png">
								</td>
								<td style="text-align:center;">
									<table style="text-align:center;padding:8px">
										<tr style="height:40px;">
											<td style="vertical-align:top;color:#615c5c;" class="item_label">Please enter your username and password.</td>
										</tr>
										<tr>
											<td><?php $this->txtUsername->RenderDesignedNoRequired(); ?></td>
										</tr>
										<tr>
											<td><?php $this->txtPassword->RenderDesignedNoRequired(); ?></td>
										</tr>
										<tr style="height:0;">
											<td style="vertical-align:top;">
												<table>
													<tr>
														<td width="66">&nbsp;</td>
														<td><?php $this->btnLogin->Render(); ?></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<?php
							// Warn if magic quotes are enabled
							if (ini_get('magic_quotes_gpc') || ini_get('magic_quotes_runtime'))
								printf('<br><font color="red" style="white-space:nowrap;"><b>WARNING:</b> magic_quotes_gpc and magic_quotes_runtime need to be disabled</font>');
						?>
					</td>
				</tr>	
			</table>
		</td>
	</tr>
</table>

<table align='center' cellpadding='5'><tr><td bgcolor='#CCCCCC'><strong>PHP Version:</strong></td><td bgcolor='#EEEEEE'><?php _p(phpversion()) ?></td></tr><tr><td bgcolor='#CCCCCC'><strong>MySql Version:</strong></td><td bgcolor='#EEEEEE'><?php _p(mysqli_get_client_info()); ?></td></tr><tr><td bgcolor='#CCCCCC'><strong>Qcodo Version:</strong></td><td bgcolor='#EEEEEE'><?php _p(QCODO_VERSION); ?></td></tr><tr><td bgcolor='#CCCCCC'><strong>Build Date:</strong></td><td bgcolor='#EEEEEE'>Tue Jul 13 12:25:14 PDT 2010</td></tr></table>
<?php $this->RenderEnd(); ?>
<?php require_once(__INCLUDES__ . '/footer.inc.php'); ?>
