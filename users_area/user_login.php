<?php
include('../database/connect.php');
include('../functions/common_function.php');
@session_start();

if (isset($_POST['user_login'])) {
    $username = $_POST['username'];
    $password = $_POST['user_password'];
    $select_query = "SELECT * FROM `user_table` where username='$username'";
    $result_select = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result_select);
    $row_data = mysqli_fetch_assoc($result_select);
    $user_ip= getIPAddress();

    //cart items
    $select_query_cart = "SELECT * FROM `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_query_cart);
    $rows_count_cart = mysqli_num_rows($result_cart);

    if ($rows_count > 0) {
        $_SESSION['username'] = $username;
        if (password_verify($password, $row_data['user_password'])) {
            // $message = "<p class='p-2 text-center bg-black text-warning'>Login Successful</p>";
            if ($rows_count==1 and $rows_count_cart==0) {
                # code...
                $_SESSION['username'] = $username;
                echo"<script>alert('Login Successful')</script>";
                echo"<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username'] = $username;
                echo"<script>alert('Login Successful')</script>";
                echo"<script>window.open('payment.php','_self')</script>";
            }
        } else {
            $message = "<p class='p-2 text-center bg-black text-danger'>invalid credentials</p>";
        }
    } else {
        $message = "<p class='p-2 text-center bg-black text-danger'>invalid credentials</p>";
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
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
    <title>User-Login</title>
</head>

<body class="bg-light">
    <div class="container mt-4">
        <h1 class="text-center text-success">
            User Login
        </h1>

        <form action="" method="post">
            <!-- error -->
            <div class="form-outline mb-4 w-50 m-auto">
                <?= $message ?? "" ?>
            </div>
            <!-- username -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="username" class="form-label text-success">Username</label>
                <input type="text" id="username" class="form-control" name="username" placeholder="Enter Username" autocomplete="off" required>
            </div>
            <!-- password -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_password" class="form-label text-success">Password</label>
                <input type="password" id="user_email" class="form-control" name="user_password" placeholder="Enter Password" autocomplete="off" required>
            </div>


            <!-- submit -->
            <div class="form-outline mb-1 w-50 m-auto ">
                <input type="submit" class=" btn text-light bg-success mb-3" name="user_login" value="Login">
            </div>
            <p class="mb-4 w-50 m-auto fw-bold small">Don’t Have Any Account ? <a href="user_registeration.php" class="text-danger ">Register</a></p>
        </form>
    </div>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>