<?php
// global $con;
if(isset($_GET['delete_category'])){
    $delete_id=$_GET['delete_category'];
    $delete_query = "DELETE from `categories` where category_id=$delete_id";
    $delete_result = mysqli_query($con, $delete_query);
    if ($delete_result) {
        echo "<script>alert('Category is Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_category','_self')</script>";
    }

}
