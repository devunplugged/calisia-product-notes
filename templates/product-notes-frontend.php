<div class="calisia-product-notes">
<?php if(count($args['notes'])){ ?>
    <?php foreach($args['notes'] as $note){ ?>
        <?php 
            $poster = get_user_by( 'id', $note->added_by ); 
            $poster_name = trim($poster->first_name . ' ' . $poster->last_name);
            $poster_name = !empty($poster_name) ? $poster_name : $poster->user_login;
        ?>
        <div class="calisia-product-notes-<?php echo $note->id; ?>">
            <div class="calisia-product-note" style="padding:10px; background: #d4f1ce;">
                <?php echo $note->text; ?>
            </div>
            
            <div class="calisia-product-note-info-bar" style="font-size:.8em; padding-bottom:10px;"><span class="calisia-product-note-info"><?php echo $note->time; ?> <?php echo $poster_name; ?></span></div>
        </div>
    <?php } ?>
<?php }else{ ?>
    <?php _e( 'No notes for that product yet', 'calisia-product-notes' ); ?>
<?php } ?>
</div>