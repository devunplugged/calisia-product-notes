<?php
namespace calisia_product_notes;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class saver{

    public static function save_product_note($post_id, $post){

        if(!isset($_POST['_calisia_product_note']))
            return;

        if($_POST['_calisia_product_note'] == '')
            return;

        if ($post->post_type != 'product')
            return;

        global $wpdb;
        
        $wpdb->insert( 
            $wpdb->prefix . 'calisia_product_notes', 
            array( 
                'time' => current_time( 'mysql' ), 
                'text' => $_POST['_calisia_product_note'], 
                'product_id' => $post->ID, 
                'added_by' => get_current_user_id(), 
                'deleted' => 0 
            ) 
        );
    }
/*
    public static function save_user_note($user_id,$content){
        global $wpdb;

        $wpdb->insert( 
            $wpdb->prefix . 'calisia_customer_notes', 
            array( 
                'time' => current_time( 'mysql' ), 
                'text' => $content, 
                'user_id' => $user_id, 
                'added_by' => get_current_user_id(), 
                'deleted' => 0 
            ) 
        );
    }
*/

}