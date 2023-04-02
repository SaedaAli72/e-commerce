<?php
include('../database/connect.php');
include('../functions/common_function.php');


if (isset($_POST['user_register'])) {
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_ip = getIPAddress();
    // accessing images
    $user_image = $_FILES['user_image']['name'];
    // accessing images tmp
    $temp_image = $_FILES['user_image']['tmp_name'];
    //select query لمنع دخول نفس البيانات مرة اخرى 
    $select_query = "SELECT * FROM `user_table` where username='$username' or user_email='$user_email'";
    $result_select = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result_select);
    if ($rows_count > 0) {
        $message = "<p class='p-2 text-center bg-black text-dager'>Username or Email is already existed</p>";
    } elseif ($password != $confirm_password) {
        $message = "<p class='p-2 text-center bg-black text-danger'>Password is not Confirmed</p>";
    } else {
        //insert query
        move_uploaded_file($temp_image, "./user_images/$user_image");
        $insert_query = "INSERT INTO `user_table` ( `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES ('$username', '$user_email', '$hashpassword', '$user_image', '$user_ip', '$user_address', '$user_contact')";
        $result_user = mysqli_query($con, $insert_query);
        if ($result_user) {
            $message = "<p class='p-2 text-center bg-black text-warning'>the User Data is inserted successfully</p>";
        } else {
            $message = "<p class='p-2 text-center bg-black text-danger'>please fill the fields </p>";
        }
    }
    //selecting cart items عشان اشوف هيدخلنى على اى لما اعمل تسجيل دخول
    $select_cart_item = "SELECT * FROM `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_item);
    $rows_count_item = mysqli_num_rows($result_cart);
    if ($rows_count_item > 0) {
        $_SESSION['user_name'] = $username;
        echo "<script>alert('you have an items')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
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
    <title>User-Registeration</title>
</head>

<body class="bg-light">
    <div class="container mt-4">
        <h1 class="text-center text-success">
            User Registeration
        </h1>

        <form action="" method="post" enctype="multipart/form-data">
            <!-- error -->
            <div class="form-outline mb-4 w-50 m-auto">
                <?= $message ?? "" ?>
            </div>
            <!-- username -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="username" class="form-label text-success">Username</label>
                <input type="text" id="username" class="form-control" name="username" placeholder="Enter Username" autocomplete="off" required>
            </div>
            <!-- user email -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_email" class="form-label text-success">Email</label>
                <input type="email" id="user_email" class="form-control" name="user_email" placeholder="Enter Email" autocomplete="off" required>
            </div>
            <!-- user image -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_image" class="form-label text-success">User Image</label>
                <input type="file" id="user_image" class="form-control" name="user_image" required>
            </div>
            <!-- password -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_password" class="form-label text-success">Password</label>
                <input type="password" id="user_email" class="form-control" name="user_password" placeholder="Enter Password" autocomplete="off" required>
            </div>
            <!--confirm password -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="confirm_password" class="form-label text-success">Confirm Password</label>
                <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password" autocomplete="off" required>
            </div>
            <!-- user address -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_address" class="form-label text-success">User Address</label>
                <input type="text" id="user_address" class="form-control" name="user_address" placeholder="Enter Address" autocomplete="off" required>
            </div>
            <!-- user contact -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_contact" class="form-label text-success">User Phone</label>
                <input type="text" id="user_contact" class="form-control" name="user_contact" placeholder="Enter Phone Number" autocomplete="off" required>
            </div>

            <!-- submit -->
            <div class="form-outline mb-1 w-50 m-auto ">
                <input type="submit" class=" btn text-light bg-success mb-3" name="user_register" value="Register">
            </div>
            <p class="mb-4 w-50 m-auto fw-bold small">Already have an account? <a href="user_login.php" class="text-danger ">Login</a></p>
        </form>
    </div>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>