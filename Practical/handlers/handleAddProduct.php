<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $productName = htmlspecialchars(htmlentities($_POST['productName']));
    $productPrice = htmlspecialchars(htmlentities($_POST['productPrice']));
    $productDescription = htmlspecialchars(htmlentities($_POST['productDescription']));
    $productStock = htmlspecialchars(htmlentities($_POST['productStock']));
    $productThumbnail = htmlspecialchars(htmlentities($_POST['productThumbnail']));
    $productCategory = htmlspecialchars(htmlentities($_POST['productCategory']));

    $products_data = json_decode(file_get_contents("products.json"));
    $product_id = count($products_data) + 1;
    $products_data[] = [
        "id" => $product_id,
        "title" => $productName,
        "description" => $productDescription,
        "price" => $productPrice,
        "stock" => $productStock,
        "category" => $productCategory,
        "thumbnail" => $productThumbnail,
    ];
    file_put_contents("products.json", json_encode($products_data));
}
