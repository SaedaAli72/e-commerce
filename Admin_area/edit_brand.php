<?php
if (isset($_GET['edit_brand'])) {
    $edit_id = $_GET['edit_brand'];
    global $con;
    $get_brand = "SELECT * from `brands` where brand_id=$edit_id";
    $query_result = mysqli_query($con, $get_brand);
    $row = mysqli_fetch_assoc($query_result);
    $brand_title = $row['brand_title'];
}

?>


<div class="container">
    <h3 class="text-center text-secondary mb-4 my-3">Edit Brand </h3>
    <form action="" method="post"  >
        <!-- error -->
        <div class="form-outline mb-4 w-50 m-auto">
            <?= $message ?? "" ?>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form_lable fw-bold">Brand Title</label>
            <input type="text" id="brand_title" class="form-control" name="brand_title" required value="<?= $brand_title ?>">
        </div>
        <div class="form-outline mb-4 w-50 m-auto text-center">
            <input type="submit" class=" btn btn-secondary" name="brand_edit" value="Edit Brand">
        </div>
</div>
</form>
</div>

<?php
if (isset($_POST['brand_edit'])) {
    # code...
    
    $brand_title=$_POST['brand_title'];
    $update_query="UPDATE `brands` set brand_title='$brand_title' where brand_id=$edit_id";
    $result_query=mysqli_query($con,$update_query);
    if ($result_query) {
        # code...
        echo"<script>alert('Category is Updated Successfully')</script>";
        echo"<script>window.open('index.php?view_brand','_self')</script>";

    }

}

?>