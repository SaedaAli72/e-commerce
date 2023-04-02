<?php 
include('./includes/nav.php')
?>

        <!-- fourth child -->
        <div class="row">
            <div class="col-md-10 px-5">
                <!-- display products -->
                <div class="row">
                    <?php
                    // var_dump($product_id);
                    view_details();
                    get_unique_categories();
                    get_unique_brands();
                    ?>
                </div>

            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- sidebar -->
                <!-- brands to be dislayed -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item bg-success">
                        <a href="#" class="nav-link text-light text-center fw-bold">
                            <h5>Delivary Brands</h5>
                        </a>
                    </li>
                    <!-- get brands name from db -->
                    <?php getbrands(); ?>


                </ul>
                <!-- catigories to be dislayed -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item bg-success">
                        <a href="#" class="nav-link text-light text-center fw-bold">
                            <h5>Catigories</h5>
                        </a>
                    </li>
                    <!-- get categories name from db -->
                    <?php getcategories() ?>
                </ul>
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