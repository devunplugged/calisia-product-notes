<?php
namespace calisia_product_notes;

class inputs{

    public static function textarea($options, $output = false){
        $ta = '<label>'.$options['label'].'</label>';
        $ta .= '<textarea placeholder="'.$options['placeholder'].'" id="'.$options['id'].'" name="'.$options['id'].'" class="'.$options['class'].'">';
        $ta .= $options['value'];
        $ta .= '</textarea>';

        if(!$output)
            return $ta;

        echo $ta;
    }
}