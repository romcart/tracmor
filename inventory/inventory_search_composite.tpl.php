 		<div class="title">&nbsp;Inventory Search</div>
		<table style="border:1px solid #AAAAAA;background-color:#EEEEEE;font-family:verdana;font-size:10px;color:#444444;height:40px" width="100%">
			<tr>
				<td style="vertical-align:top;" noWrap>
					<?php $this->txtShortDescription->RenderWithNameLeft("Width=150") ?>
				</td>
				<td style="vertical-align:top;" noWrap>
					<?php $this->txtInventoryModelCode->RenderWithNameLeft("Width=150") ?>
				</td>
				<td style="vertical-align:top;" noWrap>
					<?php $this->lstLocation->RenderWithNameLeft("Width=150") ?>
				</td>
				<td style="vertical-align:top;padding-right:8px;"align="right" noWrap>
					<?php $this->btnSearch->Render() ?>&nbsp;<?php $this->btnClear->Render() ?>
				</td>
			</tr>
			<tr>
				<td style="vertical-align:top;" noWrap>
					<?php $this->lstCategory->RenderWithNameLeft("Width=150") ?>
				</td>
				<td style="vertical-align:top;" noWrap>
					<?php $this->lstManufacturer->RenderWithNameLeft("Width=150") ?>
				</td>
				<td></td>
				<td>
					<?php $this->lblAdvanced->Render(); ?>
				</td>
			</tr>
			<tr>
			  <td style="vertical-align:top;" colspan="4" nowrap>
			  	<?php $this->ctlAdvanced->Render(); ?>
			  </td>
			</tr>
		</table>		

		<?php $this->dtgInventoryModel->Render() ?>
		<br />