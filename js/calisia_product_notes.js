jQuery( document ).on( "click", ".calisia-delete-product-note-button", function() {
    var r = confirm("Czy na pewno chcesz usunąć tą notatkę do produktu?");
    if (r == false){
        return;
    }
    let calisia_nonce = jQuery( "#calisia-nonce" ).val();
    let calisia_post_id = jQuery( "#calisia-post-id" ).val();
    jQuery.ajax({
        url: "admin-ajax.php", // this is the object instantiated in wp_localize_script function
        type: 'POST',
        data:{ 
            action: 'calisia_delete_product_note', // this is the function in your functions.php that will be triggered
            id: this.dataset.id,
            calisia_nonce: calisia_nonce,
            post_id: calisia_post_id
        },
        success: function( data ){
            //Do something with the result from server
            data = JSON.parse(data);
            console.log(data);
            if(data.result == 0){
                alert("Błąd podczas usuwania notatki.");
                return;
            }
            jQuery(".calisia-product-notes-" + data.id).remove();
        }
      });
});