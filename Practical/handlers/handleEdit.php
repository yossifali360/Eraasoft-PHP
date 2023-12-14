<?php
session_start();
$product_id = $_GET["id"];
$productName = htmlspecialchars(htmlentities($_POST['productName']));
$productPrice = htmlspecialchars(htmlentities($_POST['productPrice']));
$productDescription = htmlspecialchars(htmlentities($_POST['productDescription']));
$productStock = htmlspecialchars(htmlentities($_POST['productStock']));
$productThumbnail = htmlspecialchars(htmlentities($_POST['productThumbnail']));
$productCategory = htmlspecialchars(htmlentities($_POST['productCategory']));

$products_data = json_decode(file_get_contents("products.json"), true);

require_once("../functions/validations.php");

// // Validate department Name Empty
// if (validateEmpty($NewName)) {
//     $_SESSION['error'] = "Please enter Department Name";
// }

// // Validate department Name Min length
// if (validateMinimum($NewName)) {
//     $_SESSION['error'] = "Department Name Must be at least 3 characters";
// }

// // Validate department Name Max length
// if (validateMaximum($NewName)) {
//     $_SESSION['error'] = "Department Name must be Less Than 30 characters";
// }

foreach ($products_data as $key =>  $product) {
    if ($product['id'] == $product_id) {
        $products_data[$key]['title'] = $productName;
        $products_data[$key]['price'] = $productPrice;
        $products_data[$key]['description'] = $productDescription;
        $products_data[$key]['stock'] = $productStock;
        $products_data[$key]['category'] = $productCategory;
        $products_data[$key]['thumbnail'] = $productThumbnail;
        file_put_contents("products.json", json_encode($products_data));
        header("Location:../dashboard.php");
    }
}
