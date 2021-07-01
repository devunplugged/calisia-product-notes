<?php
namespace calisia_product_notes;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class settings{
    public static function add_settings_page() {
        add_options_page( 'Example plugin page', __( 'Product Notes', 'calisia-product-notes' ), 'manage_options', 'calisia-product-notes', 'calisia_product_notes\settings::render_plugin_settings_page' );
    }

    public static function render_plugin_settings_page() {
        renderer::render('settings-form');
    }

    public static function register_settings() {
        register_setting( 'calisia-product-notes-options', 'calisia_product_notes_plugin_options' ); //, 'dbi_example_plugin_options_validate'
        add_settings_section( 'display_settings', __( 'Display Settings', 'calisia-product-notes' ), 'calisia_product_notes\settings::section_text', 'calisia-product-notes-settings-page' );
    
        add_settings_field( 'calisia_product_notes_frontend_notes', __('Frontend product page (only for roles: administrator, shop_manager, worker)', 'calisia-product-notes'), 'calisia_product_notes\settings::frontend_notes_input', 'calisia-product-notes-settings-page', 'display_settings' );
        add_settings_field( 'calisia_product_notes_order_notes', __('Edit order page', 'calisia-product-notes'), 'calisia_product_notes\settings::order_notes_input', 'calisia-product-notes-settings-page', 'display_settings' );      
    }

    public static function section_text() {
        renderer::render('settings-section-text');
    }
    
    public static function order_notes_input() {
        $options = get_option( 'calisia_product_notes_plugin_options' );
        inputs::select(
            array(
                'id' => 'calisia_product_notes_order_notes',
                'name' => 'calisia_product_notes_plugin_options[order_notes]',
                'class' => 'select',
                'options' => array(
                    __('On', 'calisia-product-notes') => 1,
                    __('Off', 'calisia-product-notes') => 0
                ),
                'value' => options::option_on('order_notes')
            ),
            true
        );
    }

    public static function frontend_notes_input() {
        $options = get_option( 'calisia_product_notes_plugin_options' );
        inputs::select(
            array(
                'id' => 'calisia_product_notes_frontend_notes',
                'name' => 'calisia_product_notes_plugin_options[frontend_notes]',
                'class' => 'select',
                'options' => array(
                    __('On', 'calisia-product-notes') => 1,
                    __('Off', 'calisia-product-notes') => 0
                ),
                'value' => options::option_on('frontend_notes')
            ),
            true
        );
    }
    
}