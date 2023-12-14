<?php
session_start();
// get data from url parameters
$product_id = $_GET["id"];
$products_data = json_decode(file_get_contents("products.json"), true);

foreach ($products_data as $key => $product){
    if($product['id'] == $product_id){
        unset($products_data[$key]);
        file_put_contents("products.json", json_encode($products_data));   
        // $_SESSION["Deleted"] = $dep['name']  . " Deleted Successfully";
        // print_r($_SESSION['Deleted']);
        header("Location:../dashboard.php");

    }
}

?>