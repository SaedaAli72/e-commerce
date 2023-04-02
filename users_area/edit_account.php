<?php
if (isset($_GET['edit_account'])) {
    global $con;
    $user_name = $_SESSION['username'];
    $get_details = "SELECT * from `user_table` where username= '$user_name'";
    $query_result = mysqli_query($con, $get_details);
    $row = mysqli_fetch_assoc($query_result);
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_address = $row['user_address'];
    $user_mobile = $row['user_mobile'];

    if (isset($_POST['user_edit'])) {
        # code...
        $edit_id = $user_id;
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image= $_FILES['user_image']['name'];
        $user_image_tmp= $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        // update query
        $update_query="UPDATE `user_table` set username='$username',user_email='$user_email',user_address='$user_address',user_mobile='$user_mobile',user_image='$user_image' where user_id=$edit_id";
        $query_update_result = mysqli_query($con, $update_query);
        if ($query_update_result) {
            $message = "<p class='p-2 text-center bg-black text-warning'>the User Data is updated successfully</p>";
            echo"<script>window.open('logout.php','_self')</script>";
        }

    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Acount</title>
</head>

<body>
    <h3 class="text-center text-secondary mb-4 my-3">Edit Account </h3>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- error -->
        <div class="form-outline mb-4 w-50 m-auto">
                <?= $message ?? "" ?>
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="username" value="<?= $username ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="user_email" value="<?= $user_email ?>">
        </div>
        <div class="form-outline mb-4  w-50 m-auto d-flex">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="./user_images/<?= $image ?>" alt="" class="edit_img ">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?= $user_address ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?= $user_mobile ?>">
        </div>
        <input type="submit" class=" btn btn-secondary" name="user_edit" value="Edit Account">
        </div>
    </form>
</body>

</html>