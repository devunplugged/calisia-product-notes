<?php
/**
 * Plugin Name: calisia-product-notes
 * Author: Tomasz Boroń
 * Text Domain: calisia-product-notes
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

require_once __DIR__ . '/src/install.php';
require_once __DIR__ . '/src/data.php';
require_once __DIR__ . '/src/inputs.php';
require_once __DIR__ . '/src/renderer.php';
require_once __DIR__ . '/src/saver.php';
require_once __DIR__ . '/src/loader.php';
require_once __DIR__ . '/src/translations.php';
require_once __DIR__ . '/src/ajax.php';
require_once __DIR__ . '/src/metabox.php';
require_once __DIR__ . '/src/tabs.php';
require_once __DIR__ . '/src/init.php';
require_once __DIR__ . '/src/settings.php';
require_once __DIR__ . '/src/wp-options.php';



//check if update is necessary
add_action( 'plugins_loaded', 'calisia_product_notes\install::update_check' );

//add metabox to product screen
add_action( 'add_meta_boxes', 'calisia_product_notes\metabox::add_meta_boxes' );

//save note
add_action( 'save_post', 'calisia_product_notes\saver::save_product_note', 1, 2);
//add_action( 'woocommerce_saved_product_items', 'calisia_product_notes\saver::save_product_note' );

//load css and js files in backend (admin)
add_action('admin_enqueue_scripts', 'calisia_product_notes\loader::load_css');
add_action('admin_enqueue_scripts', 'calisia_product_notes\loader::load_js' );

//ajax endpoint (delete note)
add_action( "wp_ajax_calisia_delete_product_note", 'calisia_product_notes\ajax::delete_note' ); //ajax call endpoint

//load plugin textdomain
add_action( 'init', 'calisia_product_notes\translations::load_textdomain' );

//add notes to order product list; backend edit order
add_action( 'woocommerce_before_order_itemmeta', 'calisia_product_notes\renderer::insert_before_order_itemmeta', 11, 3 );


//turn frontend notes on based on current user role
add_action( 'init', 'calisia_product_notes\init::frontend_notes' );
//add_filter( 'woocommerce_product_tabs', 'calisia_product_notes\tabs::add_product_page_tab' );


//settings page 
add_action( 'admin_menu', 'calisia_product_notes\settings::add_settings_page' );
add_action( 'admin_init', 'calisia_product_notes\settings::register_settings' );



class calisia_tmp{
    public static function debug($val){
        echo "<pre>";
        print_r($val);
        echo "</pre>";
    }
}
