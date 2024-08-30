<?php
    require("../connect_db.php");

    $view_users_info = "SELECT * FROM users_info";
    $query_users_info = $conn->query($view_users_info);

    echo "<table>";
    echo "<tr>
        <th>User ID</th> 
        <th>User Name</th> 
        <th>User Email</th> 
        <th>Action</th> 
    </tr>";
    while($array_users_info = mysqli_fetch_assoc($query_users_info)){
        $user_id = $array_users_info['user_id'];
        $user_name = $array_users_info['user_name'];
        $user_email = $array_users_info['user_email'];

        echo "<tr>
            <td>$user_id</td>
            <td>$user_name</td>
            <td>$user_email</td>
            <td>
                <a href='edit_user_info.php?id=$user_id'>Edit</a> 
            </td>
        </tr>";
    }
    echo "</table>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Info</title>
    <style>
        table,tr,th,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    
</body>
</html>