<?php
if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
    global $con;
    $get_products = "SELECT * from `products` where product_id=$edit_id";
    $query_result = mysqli_query($con, $get_products);
    $row = mysqli_fetch_assoc($query_result);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keyword = $row['product_keyword'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    // fetching_catigories
    $get_categories = "SELECT * from `categories` where category_id=$category_id";
    $query_category = mysqli_query($con, $get_categories);
    $row_category = mysqli_fetch_assoc($query_category);
    $category_title = $row_category['category_title'];


    // fetching_brands
    $get_brands = "SELECT * from `brands` where brand_id=$brand_id";
    $query_brand = mysqli_query($con, $get_brands);
    $row_brand = mysqli_fetch_assoc($query_brand);
    $brand_title = $row_brand['brand_title'];
}
?>


<div class="container">
    <h3 class="text-center text-secondary mb-4 my-3">Edit Products </h3>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- error -->
        <div class="form-outline mb-4 w-50 m-auto">
            <?= $message ?? "" ?>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form_lable">Product Title</label>
            <input type="text" id="product_title" class="form-control" name="product_title" required value="<?= $product_title ?>">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_desc" class="form_lable">Product Description</label>
            <input type="text" class="form-control" name="product_desc" value="<?= $product_description ?>">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_k" class="form_lable">Product Keywords</label>
            <input type="text" class="form-control" name="product_k" value="<?= $product_keyword ?>">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_cat" class="form_lable">Product Catigories</label>
            <select name="product_catigory" class="form-select" id="product_cat">
                <option value="<?= $category_id ?>"><?= $category_title ?></option>
                <?php
                $get_categories_all = "SELECT * from `categories`";
                $query_category_all = mysqli_query($con, $get_categories_all);
                while ($row_category_all = mysqli_fetch_assoc($query_category_all)) {
                    $category_title = $row_category_all['category_title'];
                    $category_id = $row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>
                    ";
                };
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_brand" class="form_lable">Product Brands</label>
            <select name="product_brand" class="form-select" id="product_brand">
                <option value="<?= $brand_id ?>"><?= $brand_title ?></option>
                <?php
                $get_brands_all = "SELECT * from `brands`";
                $query_brand_all = mysqli_query($con, $get_brands_all);
                while ($row_brands_all = mysqli_fetch_assoc($query_brand_all)) {
                    $brand_title = $row_brands_all['brand_title'];
                    $brand_id = $row_category_all['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>
                    ";
                };
                ?>
            </select>
        </div>
        <div class="form-outline mb-4  w-50 m-auto ">
            <label for="product_image1" class="form_lable">Product image1</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" name="product_image1">
                <img src="./product_images/<?= $product_image1 ?>" alt="" class="product_image">
            </div>
        </div>
        <div class="form-outline mb-4  w-50 m-auto ">
            <label for="product_image2" class="form_lable">Product image2</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" name="product_image2">
                <img src="./product_images/<?= $product_image2 ?>" alt="" class="product_image">
            </div>
        </div>
        <div class="form-outline mb-4  w-50 m-auto ">
            <label for="product_image3" class="form_lable">Product image3</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" name="product_image3">
                <img src="./product_images/<?= $product_image3 ?>" alt="" class="product_image">
            </div>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form_lable">Product Price</label>
            <input type="text" class="form-control" name="product_price" value="<?= $product_price ?>">
        </div>
        <div class="form-outline mb-4 w-50 m-auto text-center">
            <input type="submit" class=" btn btn-secondary" name="product_edit" value="Edit Products">
        </div>
</div>
</form>
</div>

<?php
if (isset($_POST['product_edit'])) {
    # code...
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_desc'];
    $product_keyword = $_POST['product_k'];
    $product_catigory = $_POST['product_catigory'];
    $product_brand = $_POST['product_brand'];

    //image1
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image1_tmp = $_FILES['product_image1']['tmp_name'];
    //image2
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image2_tmp = $_FILES['product_image2']['tmp_name'];
    //image3
    $product_image3 = $_FILES['product_image3']['name'];
    $product_image3_tmp = $_FILES['product_image3']['tmp_name'];

    $product_price = $_POST['product_price'];

    //cheching for empty files
    if ($product_title == '' or $product_description == '' or $product_keyword == '' or $product_brand == '' or $product_catigory == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == '' or $product_price == '') {
        # code...
        $message = "<p class='p-2 text-center bg-black text-warning'>Please fill all the fields</p>";
    } else {
        move_uploaded_file($product_image1_tmp, "./product_images/$product_image1");
        move_uploaded_file($product_image2_tmp, "./product_images/$product_image2");
        move_uploaded_file($product_image3_tmp, "./product_images/$product_image3");

        // update query
        $update_query = "UPDATE `products` set 
        product_title='$product_title',
        product_description='$product_description',
        category_id='$product_catigory',
        brand_id='$product_brand',
        product_keyword='$product_keyword',
        product_image1='$product_image1' ,
        product_image2='$product_image2' ,
        product_image3='$product_image3' ,
        product_price='$product_price',
        date=NOW()
        where product_id=$edit_id";
        $query_update_result = mysqli_query($con, $update_query);
        if ($query_update_result) {
            $message = "<p class='p-2 text-center bg-black text-warning'>the Product is updated successfully</p>";
            echo "<script>window.open('insert_products.php','_self')</script>";
        }
    }
}

?>