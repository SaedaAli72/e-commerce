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
    <link rel="stylesheet" href="../style.css">
    <title>Welcome <?= $_SESSION['username'] ?></title>
    <style>
        .logo {
            width: 7%;
            height: 7%;
        }

        body {
            overflow-x: hidden;
        }
        .edit_img{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
        .profile_img {
            width: 90%;
            display: block;
            object-fit: contain;
            margin: auto;
        }
    </style>
</head>

<body>
    <!--statr navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-success">
            <div class="container-fluid">
                <img src="../images/logo11.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item() ?></sup></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price() ?>/-</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" class="btn btn-outline-light" value="Search" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
        <!-- calling cart function -->

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['username'])) {
                    # code...
                    echo " <li class='nav-item'>
                            <a class='nav-link' href='#'>Welcome Guest</a>
                        </li>";
                } else {
                    echo " <li class='nav-item'>
                                <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
                            </li>";
                }
                if (!isset($_SESSION['username'])) {
                    # code...
                    echo " <li class='nav-item'>
                                <a class='nav-link' href='user_login.php'>Login</a>
                            </li>";
                } else {
                    echo " <li class='nav-item'>
                                <a class='nav-link' href='logout.php'>Logout</a>
                            </li>";
                }
                ?>
            </ul>

        </nav>
        <!-- thid child -->
        <div class="text-success pt-3">
            <h4 class="text-center"> Shopping Store </h4>
            <p class="text-center">A website that allows people to buy and sell physical goods, services, and digital products </p>
        </div>
        <!-- forth child -->
        <div class="row ">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height: 100vh;">
                    <li class="nav-item bg-success">
                        <a class="nav-link active text-light " href="profile.php">
                            <h4>Your Profile</h4>
                        </a>
                    </li>
                    <?php
                    $user_name = $_SESSION['username'];
                    $user_image = "SELECT * from `user_table` where username= '$user_name'";
                    $image_result = mysqli_query($con, $user_image);
                    $row_image = mysqli_fetch_array($image_result);
                    $image = $row_image['user_image'];
                    echo " <li class='nav-item bg-secondary my-2'>
                            <img src='./user_images/" . $image . "' class='profile_img' alt=''>
                        </li>";
                    ?>

                    <li class="nav-item bg-secondary">
                        <a class="nav-link active text-light " href="profile.php?edit_account">
                            Edit Account
                        </a>
                    </li>
                    <li class="nav-item bg-secondary">
                        <a class="nav-link active text-light " href="profile.php">
                            Order Pending
                        </a>
                    </li>
                    <li class="nav-item bg-secondary">
                        <a class="nav-link active text-light " href="profile.php?my_orders">
                            My Orders
                        </a>
                    </li>
                    <li class="nav-item bg-secondary">
                        <a class="nav-link active text-light " href="profile.php?delete_account">
                            Delete Account
                        </a>
                    </li>
                    <li class="nav-item bg-secondary">
                        <a class="nav-link active text-light " href="logout.php">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php get_user_order_details();
                    if (isset($_GET['edit_account'])) {
                        include('edit_account.php');
                    }
                    if (isset($_GET['my_orders'])) {
                        include('user_orders.php');
                    }
                    if (isset($_GET['delete_account'])) {
                        include('delete_account.php');
                    }
                ?>
            </div>
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