<h2 class="text-center">All Products</h2>
<table class="table table-bordered text-center my-4">
    <thead class="bg-success">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        // global $con;
        $get_products = "SELECT * from `products`";
        $query_result_products = mysqli_query($con, $get_products);
        while ($row_products = mysqli_fetch_assoc($query_result_products)) {
            $product_id = $row_products['product_id'];
            $product_title = $row_products['product_title'];
            $product_image = $row_products['product_image1'];
            $product_price = $row_products['product_price'];
            $product_status = $row_products['status'];
            echo "
            <tr>
            <td>$product_id</td>
            <td>$product_title</td>
            <td><img src='./product_images/$product_image'/ class='product_image'></td>
            <td>$product_price/-</td>
            " ?>

            <td>
                <?php
                $get_orders = "SELECT * from `orders_pending` where product_id=$product_id";
                $query_result_orders= mysqli_query($con, $get_orders);
                $rows_count=mysqli_num_rows($query_result_orders);
                echo $rows_count;
                ?>
            </td>
        <?php
            echo "
            <td>$product_status</td>
            <td><a href='index.php?edit_products=".$product_id."' class='text-warning'><i class='fa-solid fa-pen-to-square'> </i></a></td>
            <td><a href='index.php?delete_products=".$product_id."' class='text-danger'><i class='fa-solid fa-trash'> </i></a></td>
            </tr>
            ";
        }
        ?>
    </tbody>
</table>