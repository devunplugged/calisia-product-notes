<?php
namespace calisia_product_notes;

class translations{
    /**
     * Load plugin textdomain.
     */
    public static function load_textdomain() {
        load_plugin_textdomain( 'calisia-product-notes', false, dirname( plugin_basename( __FILE__ ) ) . '/../languages' ); 
    }
}