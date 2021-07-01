<?php
namespace calisia_product_notes;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class loader{
    public static function load_css(){
        wp_enqueue_style('calisia_product_notes_css', plugins_url('../css/calisia_product_notes.css',__FILE__ ));
    }

    public static function load_js(){
        wp_enqueue_script('calisia_product_notes_js', plugins_url('../js/calisia_product_notes.js',__FILE__ ));
    }
}