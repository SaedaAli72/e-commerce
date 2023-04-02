<?php
include('../database/connect.php');
include('../functions/common_function.php');
session_start();
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
    <title>Admin Dashboard</title>
    <style>
        body {
            overflow-x: hidden;
        }

        .admin_image {
            width: 100px;
            object-fit: contain;

        }
        .product_image{
            width: 100PX;
            object-fit: contain;
        }
        
        /*  */
    </style>
</head>

<body>
    <!--statr navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-success navbar-light ">
            <div class="container-fluid">
                <img src="../images/logo11.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second child -->
        <div class="text-success p-3">
            <h4 class="text-center"> Manage Detailes </h4>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../images/avatar.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <!-- button*10>a.nav-link.text-light.bg-success -->
                    <button class="btn btn-success my-3"><a href="insert_products.php" class="nav-link text-light  my-1">Insert Products</a></button>
                    <button class="btn btn-success"><a href="index.php?view_products" class="nav-link text-light   my-1">View Products</a></button>
                    <button class="btn btn-success"><a href="index.php?insert_category" class="nav-link text-light   my-1">Insert Catigories</a></button>
                    <button class="btn btn-success"><a href="index.php?view_category" class="nav-link text-light   my-1">View Catigories</a></button>
                    <button class="btn btn-success"><a href="index.php?insert_brand" class="nav-link text-light   my-1">Insert Brands</a></button>
                    <button class="btn btn-success"><a href="index.php?view_brand" class="nav-link text-light   my-1">View Brands</a></button>
                    <button class="btn btn-success"><a href="" class="nav-link text-light  
                    my-1">All Orders</a></button>
                    <button class="btn btn-success"><a href="" class="nav-link text-light   
                    my-1">All Payments</a></button>
                    <button class="btn btn-success"><a href="" class="nav-link text-light   my-1">List Users</a></button>
                    <br>
                    <button class="btn btn-danger my-1"><a href="" class="nav-link text-light">LogOut</a></button>
                </div>
            </div>
        </div>
        <!-- forth child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_products'])) {
                include('delete_products.php');
            }
            if (isset($_GET['view_category'])) {
                include('view_category.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['edit_brand'])) {
                include('edit_brand.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('delete_brand.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['view_brand'])) {
                include('view_brand.php');
            }
            ?>
        </div>



        <!-- last child footer -->
        <?php
        include('../includes/footer.php');
        ?>
    </div>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>