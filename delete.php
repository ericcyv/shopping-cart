<!-- delete logic -->

<!-- php code -->
<?php
include 'connect.php';
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id=$delete_id") or die("Query failed");
    if($delete_query){
        $_SESSION['message'] = 'Product deleted successfully';
        header('location:view_products.php');
    } else {
        $_SESSION['message'] = 'Product could not be deleted';
        header('location:view_products.php');
    }
}


?>
