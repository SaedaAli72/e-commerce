<?php
include('../database/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

//getting total price and total items
$get_ip=getIPAddress();
$total_price=0;
$select_cart="SELECT * from `cart_details` where ip_address='$get_ip'";
$result_select = mysqli_query($con, $select_cart);
//وضع رقم الفاتورة بشكل عشوائى
$invoice_number=mt_rand();
$status="Pending";
$rows_count = mysqli_num_rows($result_select);
while($row=mysqli_fetch_assoc($result_select)){
    $product_id=$row['product_id'];
    $select_products="SELECT * FROM `products` where product_id=$product_id";
    $result_products = mysqli_query($con, $select_products);
    while($row_product_price=mysqli_fetch_assoc($result_products)){
        $product_price=Array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }
}

//getting Quantity
$quantity_select_query="SELECT * from `cart_details`";
$result_quantity = mysqli_query($con, $quantity_select_query);
$get_item=mysqli_fetch_array($result_quantity);
$quantity=$get_item['quantity'];
//عشان عاملين القيمة الافتراضية للكمية ب زيرو
if ($quantity==0) {
    $quantity=1;
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}

$insert_orders="INSERT INTO `user_orders` ( `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES ( $user_id, $subtotal, $invoice_number, $rows_count, current_timestamp(), '$status')";
$result_insert = mysqli_query($con, $insert_orders);
if ($result_insert) {
    # code...
    echo"<script>alert(The order is created successfully)</script>";
    echo"<script>window.open('profile.php','_self')</script>";

}

// orders pending
$insert_pending_orders="INSERT INTO `orders_pending` ( `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES ( $user_id, $invoice_number, $product_id, $rows_count, '$status')";
$result_pending_insert = mysqli_query($con, $insert_pending_orders);

//delete items from cart
$empty_cart="DELETE from `cart_details` where ip_address='$get_ip'";
$result_empty = mysqli_query($con, $empty_cart);
?>
