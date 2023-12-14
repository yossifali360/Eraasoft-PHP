<?php

function check_url_id_exist(){
    if (isset($_GET['id'])) {
        return true;
    } else {
        return false;
    }
}
function find_product($products_data){
    foreach ($products_data as $product) {
        if($product['id'] == $_GET['id']){
            $product_data = $product;
            return $product_data;
            die;
        }
    }
}

?>