<?php
if (isset($_SESSION['Auth'])) {
    if (!$_SESSION['Auth']['Role'] == 'admin') {
        header("Location:./index.php");
    }
}
$products_data = json_decode(file_get_contents("./handlers/products.json"), true);

// invoke functions
require_once("./functions/check_url_id.php");
$url_id_existance = check_url_id_exist();

// check url id existance and store data if available
if ($url_id_existance) {
    $product_data = find_product($products_data);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/stylesheets/index.css">
    <link rel="stylesheet" href="Assets/stylesheets/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<style>
    .product_img_dashboard {
        width: 120px;
        height: 80px;
    }
</style>

<body>
    <?php include('./inc/navbar.php') ?>
    <div class="d-flex align-items-start m-5">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Products</button>
            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Users</button>
        </div>
        <div class="tab-content col-9 m-auto" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-center formDiv flex-column">
                        <h4>Add New Product</h4>
                        <div class="col-12 mx-auto">
                            <form action="<?= $url_id_existance ? "./handlers/handleEdit.php?id=" . $product_data['id'] : "./handlers/handleAddProduct.php" ?>" method="POST" class="border p-3 rounded-2">
                                <div class="mb-3">
                                    <label for="productName">Product Name</label>
                                    <input type="text" value="<?= $url_id_existance ? $product_data['title'] : "" ?>" class="form-control" id="productName" name="productName" placeholder="Enter Product Name">
                                </div>
                                <div class="mb-3">
                                    <label for="productPrice">Product price</label>
                                    <input type="text" value="<?= $url_id_existance ? $product_data['price'] : "" ?>" class="form-control" id="productPrice" name="productPrice" placeholder="Enter Product Price">
                                </div>
                                <div class="mb-3">
                                    <label for="productDescription">Product description</label>
                                    <input type="text" value="<?= $url_id_existance ? $product_data['description'] : "" ?>" class="form-control" id="productDescription" name="productDescription" placeholder="Enter Product description">
                                </div>
                                <div class="mb-3">
                                    <label for="productStock">Product stock</label>
                                    <input type="text" value="<?= $url_id_existance ? $product_data['stock'] : "" ?>" class="form-control" id="productStock" name="productStock" placeholder="Enter Product stock">
                                </div>
                                <div class="mb-3">
                                    <label for="productThumbnail">Product thumbnail</label>
                                    <input type="text" value="<?= $url_id_existance ? $product_data['thumbnail'] : "" ?>" class="form-control" id="productThumbnail" name="productThumbnail" placeholder="Enter Product thumbnail">
                                </div>
                                <div class="mb-3">
                                    <label for="productCategory">Product category</label>
                                    <input type="text" value="<?= $url_id_existance ? $product_data['category'] : "" ?>" class="form-control" id="productCategory" name="productCategory" placeholder="Enter Product category">
                                </div>
                                <input type="submit" value="<?= $url_id_existance ? "Edit" : "Add" ?>" class="bg-primary form-control text-white">
                            </form>
                        </div>
                        <div class="col-12 mx-auto my-3">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>category</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products_data as $product) : ?>
                                        <tr>
                                            <td><?= "<img class='product_img_dashboard' src='" . $product['thumbnail'] . "' alt='product img'>" ?></td>
                                            <td><?= $product['title'] ?></td>
                                            <td><?= $product['price']  . " EGP" ?></td>
                                            <td><?= $product['stock']  . " Item" ?></td>
                                            <td><?= $product['category'] ?></td>
                                            <!-- ./handlers/handleEdit.php?id=< $product['id'] ?> -->
                                            <td><a href="dashboard.php?id=<?= $product['id'] ?>" class="btn btn-primary m-auto">Edit</a></td>
                                            <td><a href="./handlers/handleDelete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger m-auto">Delete</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-center formDiv flex-column">
                        <h4>Website Users</h4>
                        <div class="col-12 mx-auto my-3">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = file_get_contents("./handlers/users.json");
                                    $data = json_decode($data, true);
                                    ?>
                                    <?php foreach ($data as $user) : ?>
                                        <tr>
                                            <td><?php echo $user['name'] ?></td>
                                            <td><?php echo $user['email'] ?></td>
                                            <td><?php echo $user['dateCreated'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>