<?php
    require("../connect_db.php");

    if(isset($_GET['id'])){
        $get_id = $_GET['id'];

        $edit_user_info_sql = "SELECT * FROM users_info WHERE user_id=$get_id";
        $query_edit_user = $conn->query($edit_user_info_sql);
        $array_edit_user = mysqli_fetch_assoc($query_edit_user);

            $user_id = $array_edit_user['user_id'];
            $user_name = $array_edit_user['user_name'];
            $user_email = $array_edit_user['user_email'];
            $user_password = $array_edit_user['user_password'];
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
        <input type="submit" name="btnsubmit" value="Update">
    </form>
</body>
</html>