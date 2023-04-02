<?php
include('../database/connect.php');
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];
    if (!empty($brand_title)) {
        $select_query = "select * from `brands` where brand_title='$brand_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        if ($number > 0) {
            $message = "<P class='bg-light text-danger p-3 text-center w-100'>this brand is inside the database</P>";
        } else {
            $insert_query = "insert into `brands` (brand_title) value ('$brand_title')";
            $result = mysqli_query($con, $insert_query);
            if ($result) {
                $message = "<p class='bg-light text-warning p-3 text-center w-100'>the value inserted Succesfully</p>";
            }
        }
    } else {
        $message = "<P class='bg-light text-danger p-3 text-center w-100'>you should insert value</P>";
    }
}

?>

<h2 class="text-center mb-4">Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <div class="w-100"><?= $message ?? "" ?></div>
        <div class="input-group mb-3">
            <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="brand_title" placeholder="Insert_Brands" aria-label="Brands" aria-describedby="basic-addon1">
        </div>
    </div>
    <div class="input-group w-10 mb-2 ">
        <div class="input-group">
            <input type="submit" class=" btn text-light m-auto bg-success" name="insert_brand" value="Insert Brands" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <!-- <button class=" btn text-light m-auto bg-success">Insert Brands</button> -->
    </div>
</form>