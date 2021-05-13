<?php
namespace calisia_product_notes;

class renderer{
    public static function render($template, $args = array()){
        include  __DIR__ . '/../templates/'.$template.'.php';
    }


    public static function render_note_textarea($template){    
        $textarea = inputs::textarea(array(
            'id'            => '_calisia_product_note',
            'label'         => __( 'Add comment:', 'calisia-product-notes' ) . '<br>',
            'placeholder'   => __( 'Your Comment', 'calisia-product-notes' ),
            'value'         => '',
            'class'         => 'w-100'
        ));
        self::render($template, array("textarea_input"=>$textarea));
    }

    public static function render_product_form($notes, $nonce, $post_id){//, $user
        self::render(
            'product-notes',
            array(
                'notes' => $notes,
                'nonce' => $nonce,
                'post_id'  => $post_id
            )
        );
        self::render_note_textarea('product-notes-textarea');
    }

    public static function insert_before_order_itemmeta($item_id, $item, $product){
        if(!options::option_on('order_notes'))
            return;

        if($item->get_type() != 'line_item')
            return;

        $nonce = wp_create_nonce( 'calisia_delete_product_note_' . $product->get_id() );
        $notes = data::get_product_notes($product->get_id());
        self::render(
            'product-notes',
            array(
                'notes' => $notes,
                'nonce' => $nonce,
                'post_id'  => $product->get_id()
            )
        );
    }

    public static function metabox_form($post){
        $nonce = wp_create_nonce( 'calisia_delete_product_note_' . $post->ID );
        $notes = data::get_product_notes($post->ID);
        self::render_product_form($notes, $nonce, $post->ID);//, $user
    }
}