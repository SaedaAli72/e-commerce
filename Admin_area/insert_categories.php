<?php
include('../database/connect.php');
if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];
    if (!empty($category_title)) {
        $select_query = "select * from `categories` where category_title='$category_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        if ($number > 0) {
            $message="<P class='bg-light text-danger p-3 text-center w-100'>this category is inside the database</P>";
        } else {
            $insert_query = "insert into `categories` (category_title) value ('$category_title')";
            $result = mysqli_query($con, $insert_query);
            if ($result) {
                $message = "<p class='bg-light text-warning p-3 text-center w-100'>the value inserted Succesfully</p>";
            }
        }
    }else{
        $message="<P class='bg-light text-danger p-3 text-center w-100'>you should insert value</P>";
    }
}

?>


<h2 class="text-center mb-4">Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <div class="w-100"><?= $message ?? "" ?></div>
        <div class="input-group mb-3">
            <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="cat_title" placeholder="Insert_Categories" aria-label="Categories" aria-describedby="basic-addon1">
        </div>
    </div>
    <div class="input-group w-10">
        <div class="input-group">
            <input type="submit" class=" btn text-light m-auto bg-success" name="insert_cat" value="Insert Caregories" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <!-- <button class=" btn text-light m-auto bg-success">Insert Caregories</button> -->
    </div>
</form>