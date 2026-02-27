<!-- including php logic - connecting to the database -->
<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products | ShopCart</title>

    <!-- css file -->
    <link rel="stylesheet" href="css/style.css">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- header -->
    <?php include 'header.php' ?>
    <!-- container -->
    <div class="container">
        <section class="display_product">
            <h1 class="heading">Manage Products</h1>

            <?php
            $display_product = mysqli_query($conn, "Select * from `products`");
            $num = 1;
            if (mysqli_num_rows($display_product) > 0) {
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($display_product)) {
                            ?>
                            <tr>
                                <td><?php echo $num ?></td>
                                <td><img src="images/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>"></td>
                                <td><?php echo $row['name'] ?></td>
                                <td>$<?php echo number_format($row['price'], 2) ?></td>
                                <td>
                                    <div class="btns">
                                        <a href="update.php?edit=<?php echo $row['id'] ?>" class="update_product_btn"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="delete.php?delete=<?php echo $row['id'] ?>" class="delete_product_btn"
                                            onclick="return confirm('Are you sure you want to delete this product?');"
                                            title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $num++;
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            } else {
                echo "<div class='empty_text'><i class='fas fa-box-open' style='font-size: 3rem; margin-bottom: 1rem; display: block; opacity: 0.3;'></i>No products yet.<br><a href='index.php' style='color: var(--primary); margin-top: 1rem; display: inline-block;'>Add your first product →</a></div>";
            }
            ?>
        </section>
    </div>

    <!-- js file -->
    <script src="js/script.js"></script>
</body>

</html>