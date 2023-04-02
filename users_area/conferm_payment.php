<?php
include('../database/connect.php');
session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $get_orders = "SELECT * from `user_orders` where order_id=$order_id";
    $query_result_order = mysqli_query($con, $get_orders);
    $row_order = mysqli_fetch_assoc($query_result_order);
    $invoice_number = $row_order['invoice_number'];
    $amount_due = $row_order['amount_due'];
}
if (isset($_POST['confirm_payment'])) {
    $invoice_num = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mood = $_POST['payment_mood'];
    $insert_query = "INSERT INTO `user_payments` (`order_id`, `invoice_number`, `amount_due`, `payment_mood`) VALUES ($order_id, $invoice_num, $amount, '$payment_mood')";
    $query_result = mysqli_query($con, $insert_query);
    if ($query_result) {
        # code...
        $message = "<p class='p-2 text-center bg-black text-warning'>Successfully completed the payment</p>";
        echo"<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_status="UPDATE `user_orders` set order_status='Complete' where order_id=$order_id";
    $query_result_update = mysqli_query($con, $update_status);
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
    <title>Payment Page</title>
</head>

<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Payment Confirm</h1>
        <form action="" method="post">
            <!-- error -->
            <div class="form-outline mb-4 w-50 m-auto">
                <?= $message ?? "" ?>
            </div>
            <div class="form-outline my-4 text-center">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?= $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?= $amount_due ?>">
            </div>
            <div class="form-outline mt-5 text-center">
                <select name="payment_mood" class="form-select w-50 m-auto text-secondary">
                    <option>Select On Payment Mood</option>
                    <option>UPI</option>
                    <option>Netpanking</option>
                    <option>Paypal</option>
                    <option>Cash on delivary</option>
                    <option>Pay offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center">
                <input type="submit" name="confirm_payment" value="Confirm" class="btn btn-success w-25">
            </div>


        </form>
    </div>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>