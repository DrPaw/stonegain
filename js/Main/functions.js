/*
function add_to_cart(product_id,product_name,options){
    $.post(site_url+'main/add_to_cart',
            {
                product_id : product_id,
                product_name : product_name,
                options : options
            },
            function(response){
                alert(response);
            },
            "JSON");
}
*/

function delete_cart(index){
    $.post(site_url+'main/delete_cart',
    {
        index : index
    },
    function(response){
        $("#cart_row_"+index).remove();
        window.location = window.location;
    });
}