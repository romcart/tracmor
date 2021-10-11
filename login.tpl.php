<?php
/*
	 * Copyright (c)  2010, Tracmor, LLC 
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

	$strPageTitle = 'Login | Tracmor';
	include(__INCLUDES__ . '/header.inc.php');
	$this->RenderBegin();
?>

<div class="login_header">
	<div class="login_logo"></div>
</div>

<table width="100%">
	<tr height="360">
		<td align="center">
			<table align="center" width="300">
				<tr>
					<td>
						<table style="border:1px solid #AAAAAA;background-color:#EEE;padding:16px;border-radius:4px;" width="300">
							<tr>
								<td>
									<div style="width:64px;height:64px;background-image:url(./images/key.png);"></div>
								</td>
								<td style="text-align:center;">
									<table style="text-align:center;padding:16px">
										<tr style="height:40px;">
											<td style="vertical-align:top;color:#615c5c;white-space:nowrap;" class="item_label">Please enter your username & password.</td>
										</tr>
										<tr style="height:32px;">
											<td><?php $this->txtUsername->Render(); ?></td>
										</tr>
										<tr style="height:32px;">
											<td><?php $this->txtPassword->RenderWithError(); ?></td>
										</tr>
										<tr style="height:32px;">
											<td>
												<?php $this->btnLogin->Render(); ?>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="text-align:center;">
									<?php $this->lblForgotPassword->Render(); ?>
									<table style="margin:auto;">
										<tr>
											<td style="vertical-align:top;"><?php $this->txtEmail->RenderWithError(); ?></td>
											<td style="vertical-align:top;"><?php $this->btnRecoverPassword->Render();?></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
				<td style="text-align:center;font-size:10px;">
					<br/>
					<a href="<?php _p(TOS_URL); ?>" style="color:#999;text-decoration:none;" target="_blank">Terms of service</a>
					&nbsp;&nbsp;
					<a href="<?php _p(PRIVACY_URL); ?>" style="color:#999;text-decoration:none;" target="_blank">Privacy</a>
				</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php $this->RenderEnd(); ?>
<?php require_once(__INCLUDES__ . '/footer.inc.php'); ?>
