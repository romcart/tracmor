<table align="center" width="100%">
  <tr>
    <td>Label Stock:</td>
    <td><?php $this->lstLabelStock->RenderWithError() ?></td>
  </tr>
  <tr>
    <td>Label Offset:</td>
    <td><?php $this->lstLabelOffset->Render() ?></td>
  </tr>
</table>
<br />
<?php $this->btnPrint->Render() ?>&nbsp;<?php $this->btnCancel->Render() ?>
<br />
<?php $this->txtWarning->Render() ?>