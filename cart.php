<?php include 'connect.php';
// update query  -->
if (isset($_POST['update_product_quantity'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    // query
    $update_quantity_query = mysqli_query($conn, "update `cart` set quantity=$update_value where id=$update_id");
    if ($update_quantity_query) {
        header('location:cart.php');
    }
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "Delete from `cart` where id=$remove_id");
    header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "Delete from `cart`");
    header('location:cart.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | ShopCart</title>
    <!-- css file -->
    <link rel="stylesheet" href="css/style.css">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- include header -->
    <?php include 'header.php'; ?>
    <div class="container">
        <section class="shopping_cart">
            <h1 class="heading">Your Cart</h1>
            <?php
            $select_cart_products = mysqli_query($conn, "Select * from cart `cart`");
            $num = 1;
            $grand_total = 0;
            if (mysqli_num_rows($select_cart_products) > 0) {
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($fetch_cart_products = mysqli_fetch_assoc($select_cart_products)) {
                            $subtotal = $fetch_cart_products['price'] * $fetch_cart_products['quantity'];
                            $grand_total += $subtotal;
                            ?>
                            <tr>
                                <td><?php echo $num ?></td>
                                <td><?php echo $fetch_cart_products['name'] ?></td>
                                <td>
                                    <img src="images/<?php echo $fetch_cart_products['image'] ?>"
                                        alt="<?php echo $fetch_cart_products['name'] ?>">
                                </td>
                                <td>$<?php echo number_format($fetch_cart_products['price'], 2) ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" value="<?php echo $fetch_cart_products['id'] ?>"
                                            name="update_quantity_id">
                                        <div class="quantity_box">
                                            <input type="number" min="1" value="<?php echo $fetch_cart_products['quantity'] ?>"
                                                name="update_quantity">
                                            <input type="submit" class="update_quantity" value="Update"
                                                name="update_product_quantity">
                                        </div>
                                    </form>
                                </td>
                                <td><strong>$<?php echo number_format($subtotal, 2) ?></strong></td>
                                <td>
                                    <a href="cart.php?remove=<?php echo $fetch_cart_products['id'] ?>"
                                        onclick="return confirm('Remove this item from cart?')">
                                        <i class="fas fa-trash"></i> Remove
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $num++;
                        }
                        ?>
                    </tbody>
                </table>

                <!-- bottom area -->
                <div class='table_bottom'>
                    <a href='shop_products.php' class='bottom_btn'><i class="fas fa-arrow-left"
                            style="margin-right: 0.5rem;"></i>Continue Shopping</a>
                    <h3 class='bottom_btn'>Grand Total: <span>$<?php echo number_format($grand_total, 2); ?></span></h3>
                    <a href='#' class='bottom_btn'><i class="fas fa-credit-card"
                            style="margin-right: 0.5rem;"></i>Checkout</a>
                </div>
                <a href="cart.php?delete_all" class="delete_all_btn" onclick="return confirm('Clear entire cart?')">
                    <i class="fas fa-trash"></i> Clear Cart
                </a>
                <?php
            } else {
                echo "<div class='empty_text'><i class='fas fa-shopping-cart' style='font-size: 3rem; margin-bottom: 1rem; display: block; opacity: 0.3;'></i>Your cart is empty.<br><a href='shop_products.php' style='color: var(--primary); margin-top: 1rem; display: inline-block;'>Start shopping →</a></div>";
            }
            ?>
        </section>
    </div>

    <!-- js file -->
    <script src="js/script.js"></script>
</body>

</html>