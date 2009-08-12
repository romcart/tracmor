		<div class="title">Locations Search</div>
		<table style="border:1px solid #AAAAAA;background-color:#EEEEEE;font-family:verdana;font-size:10;color:#444444;height:40" width="100%">
			<tr>
				<td style="vertical-align:top;" noWrap>
					<?php $this->txtLocation->RenderWithNameLeft("Width=150") ?>
				</td>
				<td style="vertical-align:top;padding-right:8;"align="right" noWrap>
					<?php $this->btnSearch->Render() ?>&nbsp;<?php $this->btnClear->Render() ?>
				</td>
			</tr>
		</table>
		<br class="item_divider" />
		<?php $this->dtgLocation->Render() ?>