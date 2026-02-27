<?php include 'connect.php';
// update logic
if (isset($_POST['update_product'])) {
    $update_product_id = $_POST['update_product_id'];
    $update_product_name = $_POST['update_product_name'];
    $update_product_price = $_POST['update_product_price'];
    $update_product_image = $_FILES['update_product_image']['name'];
    $update_product_image_tmp_name = $_FILES['update_product_image']['tmp_name'];
    $update_product_image_folder = 'images/' . $update_product_image;

    // update query
    $update_products = mysqli_query($conn, "Update `products` set name='$update_product_name', price='$update_product_price', image='$update_product_image' where id=$update_product_id");
    if ($update_products) {
        move_uploaded_file($update_product_image_tmp_name, $update_product_image_folder);
        header('location:view_products.php');
    } else {
        $display_message = "Failed to update product";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product | ShopCart</title>
    <!-- css file -->
    <link rel="stylesheet" href="css/style.css">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include 'header.php' ?>

    <!-- message display -->
    <?php if (isset($display_message)): ?>
        <div class='display_message' style="border-left-color: var(--danger);">
            <span><i class="fas fa-exclamation-circle"
                    style="margin-right: 0.5rem; color: var(--danger);"></i><?php echo $display_message; ?></span>
            <i class='fas fa-times' onclick='this.parentElement.style.display=`none`'></i>
        </div>
    <?php endif; ?>

    <div class="container">
        <section>
            <h3 class="heading">Update Product</h3>
            <?php
            if (isset($_GET['edit'])) {
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($conn, "Select * from `products` where id=$edit_id");
                if (mysqli_num_rows($edit_query) > 0) {
                    $fetch_data = mysqli_fetch_assoc($edit_query);
                    ?>
                    <form action="" method="post" enctype="multipart/form-data" class="update_product">
                        <div style="text-align: center; margin-bottom: 1.5rem;">
                            <img src="images/<?php echo $fetch_data['image'] ?>" alt="<?php echo $fetch_data['name'] ?>"
                                style="width: 150px; height: 150px; object-fit: cover; border-radius: 12px;">
                        </div>
                        <input type="hidden" value="<?php echo $fetch_data['id'] ?>" name="update_product_id">
                        <input type="text" class="input_fields" required value="<?php echo $fetch_data['name'] ?>"
                            name="update_product_name" placeholder="Product name">
                        <input type="number" class="input_fields" required value="<?php echo $fetch_data['price'] ?>"
                            name="update_product_price" step="0.01" placeholder="Price">
                        <input type="file" class="input_fields" required accept="image/png, image/jpg, image/jpeg"
                            name="update_product_image">
                        <input type="submit" class="submit_btn" value="Update Product" name="update_product">
                        <a href="view_products.php" class="cancel_btn">Cancel</a>
                    </form>
                <?php
                }
            }
            ?>
        </section>
    </div>

    <!-- js file -->
    <script src="js/script.js"></script>
</body>

</html>