<?php
    require("../connect_db.php");

    if(isset($_GET['id'])){
        $get_id = $_GET['id'];

        $edit_user_info_sql = "SELECT * FROM users_info WHERE user_id=$get_id";
        $query_edit_user = $conn->query($edit_user_info_sql);
        $array_edit_user = mysqli_fetch_assoc($query_edit_user);

        echo $user_id = $array_edit_user['user_id'];
        echo $user_name = $array_edit_user['user_name'];
        echo $user_email = $array_edit_user['user_email'];
        echo $user_password = $array_edit_user['user_password'];

    }
?>