<div>
    <div style="float:left;width:15px;">
       444 <img src="../images/icons/'.'<?php _p($_ITEM->Transaction->__toIconName()) ?>'.'.png" />
    </div>  
    <div style="float:left;">
      <div class="summary">
          <?php _p($_ITEM->Transaction->__toStringUser())
                . ' '
                . _p($_ITEM->Transaction->__toStringVerbWithLink())
                . ' '
                . _($_ITEM->__toStringData()) ?>
      </div>
      <div>
          <div class="gravatar" >
              <img src=<?php _p($_ITEM->Transaction->__toStringCreated()) ?> />
          </div>
          <div class="history_note">
              <?php _p($_ITEM->Transaction->__toStringNote()) ?>
          </div>
      </div>
    </div>
</div>