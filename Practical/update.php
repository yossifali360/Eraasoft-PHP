<?php 
session_start();
// session_destroy();
// print_r($_SESSION['Deleted']);
// $data = file_get_contents("./handlers/products.json");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php include('./inc/navbar.php') ?>
    <!-- <td><a href="./handlers/.php?name=<?php echo $deb['name']?>" class="btn btn-primary m-auto">Edit</a></td>

    <td><a href="./handlers/update.php?name=<?php echo $deb['name']?>" class="btn btn-primary m-auto">Edit</a></td> -->
    <?php $urlName = $_GET["name"]; ?>
    <div class="container">
            <div class="d-flex align-items-center justify-content-center formDiv flex-column">
            <h4>Edit Department</h4>
            <div class="col-8 mx-auto">
                <form action="./handlers/handleEdit.php?name=<?php echo $urlName ?>" method="POST" class="border p-3 rounded-2">
                    <div class="mb-3">
                        <label for="newName">New Name</label>
                        <input type="text" class="form-control" id="newName" name="newName" value="<?= $urlName ?>" placeholder="New Department Name">
                    </div>
                    <input type="submit" value = "Edit"  class="bg-primary form-control text-white">
                </form>
            </div>
        </div>
    </div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</body>
</html>