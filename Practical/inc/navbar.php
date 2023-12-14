<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">E-commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
      </ul>
      <div class="nav-item dropdown px-2">
        <a class="nav-link menu" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user bg-dark text-white userImg p-2 rounded-pill"><img class="rounded-pill" src="" alt=""></i>
        </a>
        <div class="dropdown-menu userSettings " aria-labelledby="navbarDropdown">
          <?= isset($_SESSION['Auth']) ? "<span class='dropdown-item user_name'>" . $_SESSION['Auth']['name'] . "</span>"   : "" ?>
          <?= isset($_SESSION['Auth']) ? ($_SESSION['Auth']['Role'] == "admin" ? "<a href = './dashboard.php' class='dropdown-item dashboardTab'>Dashboard</a>" : "") : "" ?>
          <a class="dropdown-item logout" href="#">Logout</a>
          <a class="dropdown-item" href="profile.html">Edit Profile</a>
          <a class="dropdown-item" href="orderhistory.html">Order History</a>
        </div>
      </div>
      <i class="fas fa-cart-shopping fs-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i>
    </div>
  </div>
</nav>

<div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Shopping Cart</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="h-100">
      <?php
      if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $cartItem) : ?>
          <div class="cartItem px-3 position-relative" data-id="${item.id}">
            <div class="d-flex align-items-center">
              <a href="./handlers/removeFromCart.php?id=<?=$key?>" type="button" class="btn-close position-absolute deleteFromWishList" aria-label="Close"></a>
              <img src=<?= $cartItem['thumbnail'] ?> alt="Product img" class="rounded-2 cartImg">
              <div class="cartText px-3">
                <h4><?= $cartItem['title'] ?></h4>
                <div>
                  <span class="text-muted"><?= $cartItem['quantity'] ?>X</span>
                  <span class="price px-3"><?= $cartItem['price'] ?>EGP</span>
                </div>
              </div>
            </div>
            <hr>
          </div>
      <?php endforeach;
      } else {
        echo "<div class='d-flex align-items-center justify-content-center h-100'><span class='fs-3 text-muted'> No items in card </span></div>";
      }
      ?>

    </div>
  </div>
  <div class="offcanvasEnd py-4 px-3 w-100">
    <span>
      <?php
      $totalPrice = 0;
      if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cartItem) {
          if (isset($cartItem['price'], $cartItem['quantity'])) {
            $totalPrice += $cartItem['price'] * $cartItem['quantity'];
          }
        }
        echo "Total Price : $totalPrice EGP";
      } else {
        echo "Total Price : Zero";
      }

      ?>
    </span>
  </div>
</div>
<style>
  .offcanvas {
    z-index: 9999;
  }

  .user_name {
    border-bottom: 2px solid #0000008b;
  }

  .user_name:active {
    color: #000 !important;
  }

  .user_name:hover {
    background-color: white;
  }
</style>