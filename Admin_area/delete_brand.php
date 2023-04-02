<?php
// global $con;
if(isset($_GET['delete_brand'])){
    $delete_id=$_GET['delete_brand'];
    $delete_query = "DELETE from `brands` where brand_id=$delete_id";
    $delete_result = mysqli_query($con, $delete_query);
    if ($delete_result) {
        echo "<script>alert('Brand is Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_brand','_self')</script>";
    }

}