<div class="calisia-product-notes">
<?php foreach($args['notes'] as $note){ ?>
    <?php $poster = get_user_by( 'id', $note->added_by ); ?>
    <div class="calisia-product-notes-<?php echo $note->id; ?>">
        <div class="calisia-product-note">
            <?php echo $note->text; ?>
        </div>
        
        <div class="calisia-product-note-info-bar"><span class="calisia-product-note-info"><?php echo $note->time; ?> <?php echo $poster->first_name . ' ' . $poster->last_name; ?></span> <a class="calisia-delete-product-note-button" data-id="<?php echo $note->id; ?>"><?php _e( 'Delete note', 'calisia-product-notes' ); ?></a></div>
    </div>
<?php } ?>
<input type="hidden" id="calisia-nonce"   name="calisia-nonce"   value="<?php echo $args['nonce']; ?>">
<input type="hidden" id="calisia-post-id" name="calisia-post-id" value="<?php echo $args['post']->ID; ?>">
</div>