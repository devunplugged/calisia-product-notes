<h1><?php _e( 'Product Notes Settings', 'calisia-product-notes' ); ?></h1>
<form action="options.php" method="post">
    <?php 
        settings_fields( 'calisia-product-notes-options' );
        do_settings_sections( 'calisia-product-notes-settings-page' ); 
    ?>
    <input name="submit" class="button button-primary" type="submit" value="<?php _e( 'Save', 'calisia-product-notes' ); ?>" />
</form>