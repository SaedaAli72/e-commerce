<?php
include('../database/connect.php');
include('../functions/common_function.php');
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
        img{
            width: 90%;
            margin: auto;
            display: block;
        }
        
    </style>
    <title>User Payment</title>
</head>

<body>
    <?php
    //php code to access user id
    $user_ip=getIPAddress();
    $select_query = "SELECT * FROM `user_table` where user_ip='$user_ip'";
    $result_select = mysqli_query($con, $select_query);
    $run_query= mysqli_fetch_array($result_select);
    $user_id=$run_query['user_id'];

    ?>
    <div class="container ">
        <h1 class="text-center text-success">
            Payment Options
        </h1>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com/eg/home" target="_blank"><img src="../images/payment.jpg" alt=""></a>
            </div>
            <div class="col-md-6 text-center">
                <!-- عشان احدد انا عامل لوجين لانهي يوزر -->
                <a href="order.php?user_id=<?= $user_id?>" class="btn btn-success"><h3>Pay offline</h3></a>
            </div>


        </div>
    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>