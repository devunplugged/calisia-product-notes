<?php
namespace calisia_product_notes;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class translations{
    /**
     * Load plugin textdomain.
     */
    public static function load_textdomain() {
        load_plugin_textdomain( 'calisia-product-notes', false, dirname( plugin_basename( __FILE__ ) ) . '/../languages' ); 
    }
}