<?php
    require("../connect_db.php");

    if(isset($_GET['id'])){
        $get_id = $_GET['id'];

        $edit_user_info_sql = "SELECT * FROM users_info WHERE user_id=$get_id";
        $query_edit_user = $conn->query($edit_user_info_sql);
        $array_edit_user = mysqli_fetch_assoc($query_edit_user);

            $user_id        = $array_edit_user['user_id'];
            $user_name      = $array_edit_user['user_name'];
            $user_email     = $array_edit_user['user_email'];
            $user_password  = $array_edit_user['user_password'];
    }
?>

<?php
    if(isset($_POST['btnsubmit'])){
        $new_user_id       = $_POST['user_id'];   
        $new_user_name     = $_POST['user_name']; 
        $new_user_email    = $_POST['user_email']; 
        $new_user_password = $_POST['user_password']; 

        $update_user_info = "UPDATE users_info
                            SET user_name='$new_user_name',
                                user_email='$new_user_email',
                                user_password='$new_user_password'
                            WHERE user_id=$new_user_id";

        $query_update_user_info = $conn->query($update_user_info);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Info</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <label for="user_name">User Name</label><br>
        <input type="text" id="user_name" name="user_name" value="<?php echo $user_name?>"><br><br>
        <label for="user_email">User Email</label><br>
        <input type="email" id="user_email" name="user_email" value="<?php echo $user_email?>"><br><br>
        <label for="user_password">User Password</label><br>
        <input type="password" id="user_password" name="user_password" value="<?php echo $user_password?>"><br><br>
        <input type="text" id="user_id" name="user_id" value="<?php echo $user_id ?>" hidden>
        <input type="submit" name="btnsubmit" value="Update">
    </form>
</body>
</html>