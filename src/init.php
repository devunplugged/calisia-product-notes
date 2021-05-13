<?php
namespace calisia_product_notes;

class init{
    public static function frontend_notes(){
        //add notes tab to single product page
        if(!options::option_on('frontend_notes'))
            return;

        $user = wp_get_current_user();
        $allowed_roles = array( 'administrator', 'shop_manager', 'worker' );
        if ( array_intersect( $allowed_roles, $user->roles ) ) {
            add_filter( 'woocommerce_product_tabs', 'calisia_product_notes\tabs::add_product_page_tab' );
        }
    }   
}