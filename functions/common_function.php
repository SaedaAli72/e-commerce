<?php
// include('./database/connect.php');

// get limit products
function getproducts()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_products = "select * from `products` order by rand() LIMIT 0,3";
            $result_products = mysqli_query($con, $select_products);
            while ($row_data = mysqli_fetch_assoc($result_products)) {
                $product_title = $row_data['product_title'];
                $product_id = $row_data['product_id'];
                $product_description = $row_data['product_description'];
                $product_image1 = $row_data['product_image1'];
                $product_price = $row_data['product_price'];
                $category_id = $row_data['product_id'];
                $brand_id = $row_data['product_id'];

                echo " <div class='col-md-4 mb-4'>
                    <div class='card'>
                    <img src='./Admin_area/product_images/" . $product_image1 . "' class='card-img-top' alt='" . $product_title . "'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $product_title . "</h5>
                        <p class='card-text'>" . $product_description . "</p>
                        <p class='card-text'>Price : " . $product_price . "/-</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>'
                    </div>
                    </div>
                </div>";
            }
        }
    }
}
// getting all products
function getting_all_products()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_products = "select * from `products` order by rand()";
            $result_products = mysqli_query($con, $select_products);
            while ($row_data = mysqli_fetch_assoc($result_products)) {
                $product_title = $row_data['product_title'];
                $product_id = $row_data['product_id'];
                $product_description = $row_data['product_description'];
                $product_image1 = $row_data['product_image1'];
                $product_price = $row_data['product_price'];
                $category_id = $row_data['product_id'];
                $brand_id = $row_data['product_id'];

                echo " <div class='col-md-4 mb-4'>
                    <div class='card'>
                    <img src='./Admin_area/product_images/" . $product_image1 . "' class='card-img-top' alt='" . $product_title . "'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $product_title . "</h5>
                        <p class='card-text'>" . $product_description . "</p>
                        <p class='card-text'>Price : " . $product_price . "/-</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>                        
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>'                    
                        </div>
                    </div>
                </div>";
            }
        }
    }
}

// geting unique category
function get_unique_categories()
{
    global $con;
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_products = "select * from `products` where category_id=$category_id";
        $result_products = mysqli_query($con, $select_products);
        $num_of_rows = mysqli_num_rows($result_products);
        if ($num_of_rows == 0) {
            echo "<h2 class='bg-light p-3 text-center text-danger'>No Stock of this Category</h2>";
        }
        while ($row_data = mysqli_fetch_assoc($result_products)) {
            $product_title = $row_data['product_title'];
            $product_id = $row_data['product_id'];
            $product_description = $row_data['product_description'];
            $product_image1 = $row_data['product_image1'];
            $product_price = $row_data['product_price'];
            $category_id = $row_data['product_id'];
            $brand_id = $row_data['product_id'];

            echo " <div class='col-md-4 mb-4'>
                    <div class='card'>
                    <img src='./Admin_area/product_images/" . $product_image1 . "' class='card-img-top' alt='" . $product_title . "'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $product_title . "</h5>
                        <p class='card-text'>" . $product_description . "</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>                        
                        <a href='product_details.php/product_id=$product_id' class='btn btn-secondary'>View more</a>'
                                            </div>
                    </div>
                </div>";
        }
    }
}
// geting unique brand
function get_unique_brands()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_products = "select * from `products` where brand_id=$brand_id";
        $result_products = mysqli_query($con, $select_products);
        $num_of_rows = mysqli_num_rows($result_products);
        if ($num_of_rows == 0) {
            echo "<h2 class='bg-light p-3 text-center text-danger'>This Brand is not Available for Service</h2>";
        }
        while ($row_data = mysqli_fetch_assoc($result_products)) {
            $product_title = $row_data['product_title'];
            $product_id = $row_data['product_id'];
            $product_description = $row_data['product_description'];
            $product_image1 = $row_data['product_image1'];
            $product_price = $row_data['product_price'];
            $category_id = $row_data['product_id'];
            $brand_id = $row_data['product_id'];

            echo " <div class='col-md-4 mb-4'>
                    <div class='card'>
                    <img src='./Admin_area/product_images/" . $product_image1 . "' class='card-img-top' alt='" . $product_title . "'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $product_title . "</h5>
                        <p class='card-text'>" . $product_description . "</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>                        
                        <a href='product_details.php/product_id=$product_id' class='btn btn-secondary'>View more</a>'                    
                        </div>
                    </div>
                </div>";
        }
    }
}

// sidbaaaaaaaaaaaar
// get brands
function getbrands()
{
    global $con;
    $select_brands = "select * from `brands`";
    $result_brands = mysqli_query($con, $select_brands);

    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo " <li class='nav-item '>
            <a href='index.php?brand=" . $brand_id . "' class='nav-link text-light text-center '>" . $brand_title . "</a>
        </li>";
    }
}

// get categories
function getcategories()
{
    global $con;
    $select_categories = "select * from `categories`";
    $result_categories = mysqli_query($con, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo " <li class='nav-item '>
            <a href='index.php?category=" . $category_id . "' class='nav-link text-light text-center '>" . $category_title . "</a>
        </li>";
    }
}

//serching product

function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from `products` where product_keyword like '%$search_data_value%'";
        $result_products = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_products);
        if ($num_of_rows == 0) {
            echo "<h2 class='bg-light p-3 text-center text-danger'>No Result match, No Products found on this Category</h2>";
        }
        while ($row_data = mysqli_fetch_assoc($result_products)) {
            $product_title = $row_data['product_title'];
            $product_id = $row_data['product_id'];
            $product_description = $row_data['product_description'];
            $product_image1 = $row_data['product_image1'];
            $product_price = $row_data['product_price'];
            $category_id = $row_data['product_id'];
            $brand_id = $row_data['product_id'];

            echo " <div class='col-md-4 mb-4'>
                    <div class='card'>
                    <img src='./Admin_area/product_images/" . $product_image1 . "' class='card-img-top' alt='" . $product_title . "'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $product_title . "</h5>
                        <p class='card-text'>" . $product_description . "</p>
                        <p class='card-text'>Price : " . $product_price . "/-</p>
                        <a href='#' class='btn btn-success'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>'                    
                        </div>
                    </div>
                </div>";
        }
    }
}

// get view details
function view_details()
{
    global $con;
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_products = "select * from `products` where product_id=$product_id";
                $result_products = mysqli_query($con, $select_products);
                while ($row_data = mysqli_fetch_assoc($result_products)) {
                    $product_title = $row_data['product_title'];
                    $product_id = $row_data['product_id'];
                    $product_description = $row_data['product_description'];
                    $product_image1 = $row_data['product_image1'];
                    $product_image2 = $row_data['product_image2'];
                    $product_image3 = $row_data['product_image3'];
                    $product_price = $row_data['product_price'];
                    $category_id = $row_data['product_id'];
                    $brand_id = $row_data['product_id'];
                    echo " <div class='col-md-4 mb-4'>
                    <div class='card'>
                    <img src='./Admin_area/product_images/" . $product_image1 . "' class='card-img-top' alt='" . $product_title . "'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $product_title . "</h5>
                        <p class='card-text'>" . $product_description . "</p>
                        <p class='card-text'>Price : " . $product_price . "/-</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>                        
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>'
                    </div>
                    </div>
                </div>
                <div class='col-md-8'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-success mb-5'>Related Products</h4>
                            </div>
                            <div class='col-md-6'>
                                <img src='./Admin_area/product_images/" . $product_image2 . "' class='card-img-top' alt='$product_title'>
                            </div>
                            <div class='col-md-6'>
                                <img src='./Admin_area/product_images/" . $product_image3 . "' class='card-img-top' alt='$product_title'>
                            </div>
                        </div>

                    </div>";
                }
            }
        }
    }
}

// get ip address function
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - ' . $ip;



// cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_address = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart_details` where product_id=$get_product_id and ip_address='$get_ip_address'";
        $result_products = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_products);
        if ($num_of_rows > 0) {
            echo "<script>alert('this product is already inserted in Cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT into `cart_details`(product_id,ip_address,quantity) values($get_product_id,'$get_ip_address',0)";
            $result_products = mysqli_query($con, $insert_query);
            echo "<script>alert('this product is added to Cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


// cart item function
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_address = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` where ip_address='$get_ip_address'";
        $result_products = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_products);
    } else {
        global $con;
        $get_ip_address = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` where ip_address='$get_ip_address'";
        $result_products = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_products);
    }
    echo $count_cart_items;
}

//total cart price
function total_cart_price()
{
    global $con;
    $get_ip_address = getIPAddress();
    $total_price = 0;
    $select_query = "SELECT * FROM `cart_details` where ip_address='$get_ip_address'";
    $result = mysqli_query($con, $select_query);
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM `products` where product_id=$product_id";
        $result_products = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_assoc($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}
//get_user_order_details
function get_user_order_details()
{
    global $con;
    $user_name = $_SESSION['username'];
    $get_details = "SELECT * from `user_table` where username= '$user_name'";
    $query_result = mysqli_query($con, $get_details);
    while ($row_details = mysqli_fetch_array($query_result)) {
        $user_id = $row_details['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $user_orders="SELECT * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $orders_result = mysqli_query($con, $user_orders);
                    $row_count=mysqli_num_rows($orders_result);
                    if ($row_count>0) {
                        echo"<h2 class='text-center my-5'>You have <span class='text-danger'>".$row_count."</span> Pending Orders</h2>
                        <h4 class='text-center py-2'><a href='profile.php?my_orders' class='text-danger'>Order Details</a></h4>";
                    }else{
                        echo"<h2 class='text-center'>You have Zero Pending Orders</h2>
                        <h4 class='text-center py-2'><a href='../index.php?my_orders' class='text-danger'>Explore Products</a></h4>";
                    }
                }
            }
        }
    }
}
