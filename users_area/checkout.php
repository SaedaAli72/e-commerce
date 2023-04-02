<?php
include('../database/connect.php');
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
    <link rel="stylesheet" href="./style.css">
    <title>Ecommerce Website-CheckOut Page</title>
    <style>
        /* .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        } */

        .cart-image {
            width: 70px;
            height: 70px;
            object-fit: contain;
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
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search" action="search_product.php" method="get">
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
        <div class="text-success p-3">
            <h4 class="text-center"> Shopping Store </h4>
            <p class="text-center">A website that allows people to buy and sell physical goods, services, and digital products </p>
        </div>

        <!-- fourth child -->
        <div class="row">
            <div class="col-md-12 px-5">
                <!-- display products -->
                <div class="row ">
                    <?php
                    if (!isset($_SESSION['username'])) {
                        include('user_login.php');
                    } else {
                        include('payment.php');
                    }
                    ?>
                </div>

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