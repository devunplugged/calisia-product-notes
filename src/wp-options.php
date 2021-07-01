<?php
namespace calisia_product_notes;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class options{
    public static function option_on($option_name){
        $options = get_option( 'calisia_product_notes_plugin_options' );
        if(!isset($options[$option_name]) || !$options[$option_name])
            return 0;
        return 1;
    }
}