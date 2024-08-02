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
        <input type="text" id="user_name" name="user_name"><br><br>
        <label for="user_email">User Email</label><br>
        <input type="email" id="user_email" name="user_email"><br><br>
        <label for="user_password">User Password</label><br>
        <input type="password" id="user_password" name="user_password"><br><br>
        <input type="submit" name="btnsubmit" value="Login">
    </form>
</body>
</html>