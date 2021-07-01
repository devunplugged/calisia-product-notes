<?php
namespace calisia_product_notes;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class install{
    private static $db_version = '1.2';
    
    public static function update_check(){
        //global $calisia_product_notes_db_version;
        if ( get_site_option( 'calisia_product_notes_db_version' ) != self::$db_version ) {
            self::db_install();
        }
    }

    public static function db_install() {
        global $wpdb;
       // global $calisia_product_notes_db_version;
    
        $table_name = $wpdb->prefix . 'calisia_product_notes';
        
        $charset_collate = $wpdb->get_charset_collate();
    
        $sql = "CREATE TABLE $table_name (
            id int(11) NOT NULL AUTO_INCREMENT,
            time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            text text NOT NULL,
            product_id int(11) NOT NULL,
            added_by int(11) NOT NULL,
            deleted int(1) NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";
    
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    
        add_option( 'calisia_product_notes_db_version', self::$db_version );
    }
}