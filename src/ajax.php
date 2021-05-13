<?php
namespace calisia_product_notes;

class ajax{
    public static function delete_note(){

        if(!wp_verify_nonce( $_POST['calisia_nonce'], 'calisia_delete_product_note_' . $_POST['post_id'] )){
            echo json_encode(array('result'=>0, 'id'=>$_POST['id']));
            wp_die();
        }


        global $wpdb;
        $result = $wpdb->update( $wpdb->prefix . 'calisia_product_notes', array( 'deleted' => 1 ), array( 'id' => $_POST['id'] ), array( '%d' ), array( '%d' ) );
      /*  $result = $wpdb->delete(
            'wp_calisia_product_notes', // table to delete from
            array(
                'id' => $_POST['id'] // value in column to target for deletion
            ),
            array(
                '%d' // format of value being targeted for deletion
            )
        );*/
        echo json_encode(array('result'=>$result, 'id'=>$_POST['id']));
        wp_die();
    }
}