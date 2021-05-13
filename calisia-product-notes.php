<?php
/**
 * Plugin Name: calisia-product-notes
 * Author: Tomasz Boroń
 * Text Domain: calisia-product-notes
 * Domain Path: /languages
 */
require_once __DIR__ . '/src/install.php';
require_once __DIR__ . '/src/data.php';
require_once __DIR__ . '/src/inputs.php';
require_once __DIR__ . '/src/renderer.php';
require_once __DIR__ . '/src/saver.php';
require_once __DIR__ . '/src/loader.php';
require_once __DIR__ . '/src/translations.php';
require_once __DIR__ . '/src/ajax.php';



//check if update is necessary
add_action( 'plugins_loaded', 'calisia_product_notes\install::update_check' );

//add metabox
add_action( 'add_meta_boxes', 'calisia_tmp::add_meta_boxes' );

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


class calisia_tmp{
    public static function add_meta_boxes(){
        add_meta_box( 'calisia-product-notes', __('Notes: Product','calisia-product-notes'), 'calisia_tmp::metabox_form', 'product', 'side', 'core' );
    }

    public static function metabox_form($post){
        $nonce = wp_create_nonce( 'calisia_delete_product_note_' . $post->ID );
        $notes = calisia_product_notes\data::get_product_notes($post->ID);
        calisia_product_notes\renderer::render_product_form($notes, $nonce, $post);//, $user
    }

    public static function debug($val){
        echo "<pre>";
        print_r($val);
        echo "</pre>";
    }
}
