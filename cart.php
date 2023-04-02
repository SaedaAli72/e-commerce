<?php
include('./includes/nav.php');

//  function to remove item  
function Removeitem()
{
    global $con;
    if (isset($_POST['remove_cart'])) {
        foreach ($_POST['removeitem'] as $remove_id) {
            // echo $remove_id;
            $delet_query = "DELETE from `cart_details` where product_id= $remove_id";
            $result_remove = mysqli_query($con, $delet_query);
            if ($result_remove) {
                echo "<p class='form bg-danger text-light text-center p-2'>The Cart Item is removed Successfully</p>";
            }
        }
    }
}
?>
<div class="container">
    <table class="table table-bordered text-center">
        <?php echo $remove_item = Removeitem(); ?>
        <form method="post">
            <!-- php code to display dynamic cart -->
            <?php
            global $con;
            $get_ip_address = getIPAddress();
            $total_price = 0;
            $select_query = "SELECT * FROM `cart_details` where ip_address='$get_ip_address'";
            $result = mysqli_query($con, $select_query);
            $result_count = mysqli_num_rows($result);
            if ($result_count > 0) {
                echo " <thead class='text-center'>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                    </thead>
                    <tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['product_id'];
                    $select_products = "SELECT * FROM `products` where product_id=$product_id";
                    $result_products = mysqli_query($con, $select_products);
                    while ($row_product_items = mysqli_fetch_assoc($result_products)) {
                        $price_table = $row_product_items['product_price'];
                        $image_table = $row_product_items['product_image1'];
                        $product_title_table = $row_product_items['product_title'];
                        $product_price = array($row_product_items['product_price']);
                        $product_values = array_sum($product_price);
                        $total_price += $product_values;

            ?>
                        <!-- <thead class='text-center'>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                        </thead>
                        <tbody> -->
                            <tr class="text-center">
                                <td>
                                    <p class="my-3"><?= $product_title_table ?></p>
                                </td>
                                <td>
                                    <img class="cart-image" src='./Admin_area/product_images/<?= $image_table ?>'>
                                </td>
                                <td><input type="text" class="form-control w-50 m-auto my-3" name="qty"></td>
                                <?php
                                $get_ip_address = getIPAddress();
                                if (isset($_POST['update_cart'])) {
                                    $quantity = $_POST['qty'];
                                    $update_query = "UPDATE `cart_details` set quantity=$quantity where ip_address='$get_ip_address'";
                                    $result_update = mysqli_query($con, $update_query);
                                    if ($result_update) {
                                        $message = "<p class='form bg-warning text-light text-center p-2'>The Cart Item is removed Successfully</p>";
                                    }
                                    $total_price = $total_price * $quantity;
                                }

                                ?>
                                <td>
                                    <p class="my-3"><?= $price_table ?></p>
                                </td>
                                <td><input type="checkbox" class="form-check m-auto my-3" name="removeitem[]" value="<?= $product_id ?>"></td>
                                <td>
                                    <input type="submit" class="btn btn-warning my-3" value="Update" name="update_cart">
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-danger my-3" value="Remove" name="remove_cart">
                                </td>
                            </tr>
                <?php
                    }
                }
            } else {
                echo "<h2 class='bg-light p-3 text-center text-danger'>Cart is Empty</h2>";
            }
                ?>
        </form>


        </tbody>
    </table>
    <!-- sub total -->
    <div class="d-flex my-5 ">
        <?php global $con;
        $get_ip_address = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` where ip_address='$get_ip_address'";
        $result = mysqli_query($con, $select_query);
        $result_count = mysqli_num_rows($result);
        if ($result_count > 0) {
            echo " <h4 class='px-3'>SubTotal: <strong class='text-success'> $total_price </strong>/-</h4>
                <a href='index.php'><input type='submit' class='btn btn-success mx-2' value='Continue Shopping'></a>
                <button class='btn p-0'><a href='users_area/checkout.php' class='btn btn-secondary'>Check Out</a></button>";
        }else{
            echo" <a href='index.php' class='m-auto'><input type='submit' class='btn btn-success mx-2' value='Continue Shopping'></a>";
        }if (isset($_POST['Continue Shopping'])) {
            echo"<script>window.open('index.php','_self')</script>";        
        } ?>
    </div>
</div>


<!-- last child footer -->
<?php
include('./includes/footer.php');
?>
</div>


<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>