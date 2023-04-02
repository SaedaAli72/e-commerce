<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>
</head>

<body>
    <?php
    $user_name = $_SESSION['username'];
    $get_details = "SELECT * from `user_table` where username= '$user_name'";
    $query_result = mysqli_query($con, $get_details);
    $row = mysqli_fetch_assoc($query_result);
    $user_id = $row['user_id'];

    ?>
    <h3 class="text-center text-secondary mb-4 my-3">All my Orders</h3>

    <table class="table table-bordered">
        <thead class="bg-success">
            <tr>
                <th scope="col">Si Num</th>
                <th scope="col">Amount Due</th>
                <th scope="col">Total Products</th>
                <th scope="col">Invoice Num</th>
                <th scope="col">Date</th>
                <th scope="col">Complete/Uncomplete</th>
                <th scope="col">Status</th>

            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_orders = "SELECT * from `user_orders` where user_id=$user_id";
            $query_result_order = mysqli_query($con, $get_orders);
            $number=1;
            while ($row_order = mysqli_fetch_assoc($query_result_order)) {
                $order_id = $row_order['order_id'];
                $Amount_due = $row_order['amount_due'];
                $total_products = $row_order['total_products'];
                $Invoice_Num = $row_order['invoice_number'];
                $Date = $row_order['order_date'];
                $Status = $row_order['order_status'];
                if ($Status=='Pending') {
                    $Status='Uncomplete';
                }else{
                    $Status='Complete';
                }
                echo "
                    <tr>
                        <td>$number</td>
                        <td>$Amount_due</td>
                        <td>$total_products</td>
                        <td>$Invoice_Num</td>
                        <td>$Date</td>
                        <td>$Status</td>
                        "?>
                        <?php
                        if ($Status=='Complete') {
                            # code...
                            echo"<td class='text-light'>paid</td>";

                        }else{
                        echo"
                        
                        <td><a href='conferm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
                    </tr>";}
                $number++;
            }

            ?>


        </tbody>
    </table>
</body>

</html>