<?php
namespace calisia_product_notes;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class metabox{
    public static function add_meta_boxes(){
        add_meta_box( 'calisia-product-notes', __('Notes: Product','calisia-product-notes'), 'calisia_product_notes\renderer::metabox_form', 'product', 'side', 'core' );
    }
}