<div class="datarepeater">
    <div class="transaction_type">
        <img src="../images/icons/<?php _p($_ITEM->Transaction->__toIconName(),false) ?>.png" />
    </div>  
    <div class="transaction_data">
      <div class="summary">
          <?php _p($_ITEM->Transaction->__toStringUser()) ?>

                <?php _p($_ITEM->Transaction->__toStringVerbWithLink(),false)?>
                <?php _p($_ITEM->__toStringData(),false) ?>
                <?php _p($_ITEM->Transaction->__toStringDate()) ?>
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
    <div style="clear:both;"></div>
</div>
