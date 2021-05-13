<?php
namespace calisia_product_notes;

class data{
    public static function get_product_notes($product_id){
        global $wpdb;

        return $wpdb->get_results(
            $wpdb->prepare(
            "SELECT * FROM ".$wpdb->prefix."calisia_product_notes WHERE product_id = %d AND deleted = 0",
            array(
                $product_id
               )
            )
        );
    }
}