<h2 class="text-center">All Brands</h2>
<table class="table table-bordered text-center my-4">
    <thead class="bg-success">
        <tr>
            <th>Brand ID</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        // global $con;
        $get_brands = "SELECT * from `brands`";
        $query_result_brands = mysqli_query($con, $get_brands);
        while ($row_products = mysqli_fetch_assoc($query_result_brands)) {
            $brand_id = $row_products['brand_id'];
            $brand_title = $row_products['brand_title'];
            echo "
            <tr>
            <td>$brand_id</td>
            <td>$brand_title</td>
            " ?>

        <?php
            echo "
            <td><a href='index.php?edit_brand=".$brand_id."' class='text-warning'><i class='fa-solid fa-pen-to-square'> </i></a></td>
            <td><a href='index.php?delete_brand=".$brand_id."' class='text-danger'><i class='fa-solid fa-trash'> </i></a></td>
            </tr>
            ";
        }
        ?>
    </tbody>
</table>