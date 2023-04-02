<h2 class="text-center">All Categories</h2>
<table class="table table-bordered text-center my-4">
    <thead class="bg-success">
        <tr>
            <th>Category ID</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        // global $con;
        $get_categories = "SELECT * from `categories`";
        $query_result_categories = mysqli_query($con, $get_categories);
        while ($row_products = mysqli_fetch_assoc($query_result_categories)) {
            $cat_id = $row_products['category_id'];
            $cat_title = $row_products['category_title'];
            echo "
            <tr>
            <td>$cat_id</td>
            <td>$cat_title</td>
            " ?>

        <?php
            echo "
            <td><a href='index.php?edit_category=".$cat_id."' class='text-warning'><i class='fa-solid fa-pen-to-square'> </i></a></td>
            <td><a href='index.php?delete_category=".$cat_id."' class='text-danger'><i class='fa-solid fa-trash'> </i></a></td>
            </tr>
            ";
        }
        ?>
    </tbody>
</table>