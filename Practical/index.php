<?php

session_start();
// session_destroy();

// get data from json file
$products_data = json_decode(file_get_contents("./handlers/products.json"), true);

if (isset($_SESSION['Auth'])) {
    $user_data = $_SESSION['Auth'];
    $users_data = json_decode(file_get_contents("./handlers/users.json"), true);
    foreach ($users_data as $key => $user) {
        if ($user['id'] == $user_data['id']) {
            $_SESSION['cart'] =  $users_data[$key]['cart'];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/stylesheets/index.css">
    <link rel="stylesheet" href="Assets/stylesheets/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" integrity="sha256-ZCK10swXv9CN059AmZf9UzWpJS34XvilDMJ79K+WOgc=" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <?php include('./inc/navbar.php') ?>
    <div class="container">

        <!-- Notifications -->
        <?php require_once("./functions/alert.php");
        alert('Added');
        // alert('Deleted', 'success');
        // alert('error', 'danger');
        // print_r($_SESSION[$name])
        ?>

    </div>
    <div class="d-flex align-items-center justify-content-center formDiv flex-column">
        <div class="container row align-items-stretch mx-auto my-3">
            <h3 class="text-center">Our Products</h3>
            <?php if (count($products_data) > 0) : ?>
                <?php foreach ($products_data as $key => $product) : ?>
                    <div class="productCard col-12 col-sm-6 col-md-4 col-lg-3 g-3 border-4 rounded-2" data-id="<?= $product['id'] ?>" data-stock="<?= $product['stock'] ?>">
                        <div class="overflow-hidden card h-100 d-flex flex-column align-items-stretch justify-content-between">
                            <div class="position-relative h-100 productLabel">
                                <div class="card-img-top overflow-hidden">
                                    <img class="w-100 h-100" src="<?= $product['thumbnail'] ?>" alt="Card image cap">
                                    <div class="cardIcons rounded- position-absolute rounded-2 px-1">
                                        <div class="heart position-relative my-1 rounded-2">
                                            <a href="#" class="heartIcon"><i class="fa-regular fa-heart rounded-2 p-2"></i></a>
                                            <span class="bg-danger m-2 p-1 rounded-4 text-center hiddenHeart text-white mx-4 px-2 position-absolute">Add to Wishlist</span>
                                        </div>
                                        <div class="view position-relative my-1 rounded-2">
                                            <a href="#" class="viewIcon"><i class="fas fa-magnifying-glass rounded-2 p-2"></i></a>
                                            <span class="bg-danger m-2 p-1 rounded-4 text-center hiddenVeiw text-white mx-4 px-4 position-absolute">View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center px-2 h-100">
                                <a href="#" class="card-title h4 fs-3 text-decoration-none"><?= $product['title'] ?></a>
                            </div>
                            <div class="text-center h-100">
                                <h6 class="text-danger fs-3"><span class="price"><?= $product['price'] ?></span><span class="priceSign"> EGP</span></h6>
                                <span class="btnSpan"><a href="./handlers/addtocart.php?product_id=<?= $product['id'] ?>" class="btn btn-info d-block m-auto mb-4 addToCartBtn">Add To Cart</a></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <span colspan="4" class="text-center">No data available</span>
            <?php endif; ?>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js" integrity="sha256-IW9RTty6djbi3+dyypxajC14pE6ZrP53DLfY9w40Xn4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
    </script>
</body>

</html>