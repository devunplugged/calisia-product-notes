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

    public static function render_product_form($notes, $nonce, $post){//, $user
        self::render(
            'product-notes',
            array(
                'notes' => $notes,
                'nonce' => $nonce,
                'post'  => $post
            )
        );
        self::render_note_textarea('product-notes-textarea');
    }

}