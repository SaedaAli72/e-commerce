<?php
if (isset($_GET['edit_category'])) {
    $edit_id = $_GET['edit_category'];
    global $con;
    $get_category = "SELECT * from `categories` where category_id=$edit_id";
    $query_result = mysqli_query($con, $get_category);
    $row = mysqli_fetch_assoc($query_result);
    $category_title = $row['category_title'];
}
?>


<div class="container">
    <h3 class="text-center text-secondary mb-4 my-3">Edit Category </h3>
    <form action="" method="post"  >
        <!-- error -->
        <div class="form-outline mb-4 w-50 m-auto">
            <?= $message ?? "" ?>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form_lable fw-bold">Category Title</label>
            <input type="text" id="category_title" class="form-control" name="category_title" required value="<?= $category_title ?>">
        </div>
        <div class="form-outline mb-4 w-50 m-auto text-center">
            <input type="submit" class=" btn btn-secondary" name="category_edit" value="Edit Category">
        </div>
</div>
</form>
</div>

<?php
if (isset($_POST['category_edit'])) {
    # code...
    
    $category_title=$_POST['category_title'];
    $update_query="UPDATE `categories` set category_title='$category_title' where category_id=$edit_id";
    $result_query=mysqli_query($con,$update_query);
    if ($result_query) {
        # code...
        echo"<script>alert('Category is Updated Successfully')</script>";
        echo"<script>window.open('index.php?view_category','_self')</script>";
    }

}

?>