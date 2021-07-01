<?php
namespace calisia_product_notes;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class data{
    public static function get_product_notes($product_id){
        global $wpdb;

        return $wpdb->get_results(
            $wpdb->prepare(
            "SELECT * FROM ".$wpdb->prefix."calisia_product_notes WHERE product_id = %d AND deleted = 0 ORDER BY id DESC",
            array(
                $product_id
               )
            )
        );
    }
    public static function get_product_notes_count($product_id){
        global $wpdb;

        $result = $wpdb->get_results(
            $wpdb->prepare(
            "SELECT count(*) as quantity FROM ".$wpdb->prefix."calisia_product_notes WHERE product_id = %d AND deleted = 0 ORDER BY id DESC",
            array(
                $product_id
               )
            )
        );
        return $result[0]->quantity;
    }
}