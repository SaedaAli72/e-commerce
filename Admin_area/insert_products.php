<?php
include('../database/connect.php');
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_key = $_POST['product_key'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    // accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    // accessing images tmp
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    //chicking empty
    if (
        !empty($product_title) or !empty($product_description) or !empty($product_key) or
        !empty($product_category) or !empty($product_brand) or !empty($product_price) or
        !empty($product_image1) or !empty($product_image2) or !empty($product_image3)
    ) {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        
        //insert products
        $insert_products = "insert into `products` (product_title,product_description,product_keyword,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$product_description','$product_key','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_products = mysqli_query($con, $insert_products);
        if ($result_products) {
            $message = "<p class='p-2 text-center bg-black text-warning'>the product inserted successfully</p>";
        }
    } else {
        $message = "<p class='p-2 text-center bg-black text-danger'>please fill the fields </p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <title>Insert Product Admin Dashboard</title>
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center text-success">
            Insert Products
        </h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- error -->
            <div class="form-outline mb-4 w-50 m-auto">
                <?= $message ?? "" ?>
            </div>
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label text-success">Product Title</label>
                <input type="text" id="product_title" class="form-control" name="product_title" placeholder="Enter Product Title" autocomplete="off" required>
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label text-success">Product Description</label>
                <input type="text" id="product_description" class="form-control" name="product_description" placeholder="Enter Product Description" autocomplete="off" required>
            </div>
            <!-- Product Key -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_key" class="form-label text-success">Product Key</label>
                <input type="text" id="product_key" class="form-control" name="product_key" placeholder="Enter Product Key" autocomplete="off" required>
            </div>
            <!-- Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">select a category</option>
                    <?php
                    $select_categories = "select * from `categories`";
                    $result_categories = mysqli_query($con, $select_categories);
                    while ($row_data = mysqli_fetch_assoc($result_categories)) {
                        $category_title = $row_data['category_title'];
                        $category_id = $row_data['category_id'];
                        echo " <option value='" . $category_id . "'>" . $category_title . "</option>";
                    }
                    ?>

                </select>
            </div>
            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">select a brand</option>
                    <?php
                    $select_brands = "select * from `brands`";
                    $result_brands = mysqli_query($con, $select_brands);
                    while ($row_data = mysqli_fetch_assoc($result_brands)) {
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id'];
                        echo " <option value='" . $brand_id . "'>" . $brand_title . "</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label text-success">Product Image 1</label>
                <input type="file" id="product_image1" class="form-control" name="product_image1" required>
            </div>
            <!-- image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label text-success">Product Image 2</label>
                <input type="file" id="product_image2" class="form-control" name="product_image2" required>
            </div>
            <!-- image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label text-success">Product Image 3</label>
                <input type="file" id="product_image3" class="form-control" name="product_image3" required>
            </div>
            <!-- Price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label text-success">Product Price</label>
                <input type="text" id="product_price" class="form-control" name="product_price" placeholder="Enter Product Price" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto ">
                <input type="submit" class=" btn text-light bg-success mb-3" name="insert_product" value="Insert Products">
            </div>
        </form>
    </div>
</body>

</html>