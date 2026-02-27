<!-- Header -->
<header class="header">
<div class="header_body">
    <a href="index.php" class="logo">🛒 ShopCart</a>
    <nav class="navbar" id="navbar">
        <a href="index.php">Add Products</a>
        <a href="view_products.php">View Products</a>
        <a href="shop_products.php">Shop Now</a>
    </nav>
<!-- select query -->
<?php
$select_product=mysqli_query($conn, "Select * from `cart`") or die('query failed');
$row_count=mysqli_num_rows($select_product);
?>

    <!-- shopping cart icon -->
    <a href="cart.php" class="cart">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        Cart
        <?php if($row_count > 0): ?>
        <span><?php echo $row_count ?></span>
        <?php endif; ?>
    </a>
    <div id="menu-btn" class="fas fa-bars"></div>
</div>
</header>
