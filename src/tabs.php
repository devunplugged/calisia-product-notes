<?php
namespace calisia_product_notes;

class tabs{
    public static function add_product_page_tab($tabs){
        global $post;
        $tabs['calisia_product_notes_tab'] = array(
            'title' 	=> sprintf(__( 'Internal Notes (%1$s)', 'calisia-product-notes' ),data::get_product_notes_count($post->ID)),
            'priority' 	=> 50,
            'callback' 	=> 'calisia_product_notes\tabs::tab_content'
        );
    
        return $tabs;
    }

    public static function tab_content() {

        // The new tab content
        global $post;
        $notes = data::get_product_notes($post->ID);
        renderer::render(
            'product-notes-frontend',
            array(
                'notes' => $notes
            )
        );
    }
}
