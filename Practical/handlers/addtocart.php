<?php
session_start();
// session_destroy();
$product_id = $_GET["product_id"];

$allData = file_get_contents("products.json");
$allData = json_decode($allData, true);



if (isset($_SESSION['Auth'])) {
    $user_data = $_SESSION['Auth'];
    $users_data = json_decode(file_get_contents("users.json"), true);
    foreach ($users_data as $key => $user) {
        if ($user['id'] == $user_data['id']) {
            $user_id = $key;
            $user_cart =  $users_data[$user_id]['cart'];
            
            echo "<pre>";
            // print_r( $_SESSION['cart']);
            // print_r($user['cart'][1]);
            echo "</pre>";
            foreach ($allData as $product) {
                if ($product['id'] == $product_id) {
                    $productInCart = false;
                    foreach ($user_cart  as $key => &$cartItem) {
                        if ($cartItem['id'] == $product['id']) {
                            if (!isset($cartItem['quantity'])) {
                                $cartItem['quantity'] = 1;
                                $users_data[$user_id]['cart'][$key]['quantity'] = 1;
                                file_put_contents("users.json", json_encode($users_data));
                            } else {
                                $cartItem['quantity'] += 1;
                                echo "inc";
                                $users_data[$user_id]['cart'][$key]['quantity'] += 1;
                                $updated_data = $users_data;
                                echo "<pre>";
                                print_r($updated_data);
                                echo "</pre>";
                                file_put_contents("users.json", json_encode($updated_data));
                            }
                            $productInCart = true;
                        }
                    }

                    if (!$productInCart) {
                        $product['quantity'] = 1;
                        $users_data[$user_id]['cart'][] = $product;
                        echo "<pre>";
                        print_r($users_data[$user_id]);
                        echo "</pre>";
                        file_put_contents("users.json", json_encode($users_data));
                    }
                    $_SESSION["Added"] = $product['title']  . " Added to cart Successfully";
                    header("Location:../index.php");

                    // echo "<pre>";
                    // print_r($_SESSION['cart']);
                    // echo "</pre>";
                }
            }
        }
    }
}else{
    $_SESSION["login_required"] = "login required";
    header("Location:../login.php");
}
