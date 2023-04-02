<?php
// global $con;
if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];
    $delete_query = "DELETE from `products` where product_id=$delete_id";
    $delete_result = mysqli_query($con, $delete_query);
    if ($delete_result) {
        echo "<script>alert('Product is Deleted Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }

}
