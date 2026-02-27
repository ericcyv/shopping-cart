<?php include 'connect.php';
if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_temp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'images/' . $product_image;

    $insert_query = mysqli_query($conn, "insert into `products` (name,price,image) values
    ('$product_name','$product_price','$product_image')") or die("Insert query 
    failed");

    if ($insert_query) {
        move_uploaded_file($product_image_temp_name, $product_image_folder);
        $display_message = "Product added successfully!";
    } else {
        $display_message = "Failed to add product";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products | ShopCart</title>

    <!-- css file -->
    <link rel="stylesheet" href="css/style.css">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!-- include header -->
    <?php include('header.php') ?>

    <!-- message display -->
    <?php if (isset($display_message)): ?>
        <div class='display_message'>
            <span><i class="fas fa-check-circle"
                    style="margin-right: 0.5rem; color: var(--success);"></i><?php echo $display_message; ?></span>
            <i class='fas fa-times' onclick='this.parentElement.style.display=`none`'></i>
        </div>
    <?php endif; ?>

    <!-- form section -->
    <div class="container">
        <section>
            <h3 class="heading">Add New Product</h3>
            <form action="" class="add_product" method="post" enctype="multipart/form-data">
                <input type="text" name="product_name" placeholder="Product name" class="input_fields" required>
                <input type="number" name="product_price" min="0" step="0.01" placeholder="Price" class="input_fields"
                    required>
                <input type="file" name="product_image" class="input_fields" required
                    accept="image/png, image/jpg, image/jpeg">
                <input type="submit" name="add_product" class="submit_btn" value="Add Product">
            </form>
        </section>
    </div>

    <!-- js file -->
    <script src="js/script.js"></script>
</body>

</html>