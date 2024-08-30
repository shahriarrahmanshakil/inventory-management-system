<?php
    require("../connect_db.php");


    if(isset($_GET['id'])){
        $get_category_id = $_GET['id'];
        $get_data = "SELECT * FROM category WHERE category_id = $get_category_id";
        $get_data_query = $conn->query($get_data);
        $get_data_query_array = mysqli_fetch_assoc($get_data_query);

        $category_id = $get_data_query_array['category_id'];
        $category_name = $get_data_query_array['category_name'];
        $category_entry_date = $get_data_query_array['category_entry_date'];    
    }

    if(isset($_POST['btnsubmit'])){
        $new_category_id = $_POST['category_id'];
        $new_category_name = $_POST['category_name'];
        $new_category_entry_date = $_POST['category_entry_date'];

        $new_data_insert = "UPDATE category SET category_name = '$new_category_name', category_entry_date = '$new_category_entry_date'
                            WHERE category_id = $new_category_id";

        $new_data_insert_query = $conn->query($new_data_insert);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <label for="category_name">Category Name</label><br>
        <input type="text" id="category_name" name="category_name" value="<?php echo $category_name; ?>"><br><br>
        <label for="category_entry_date	">Category Entry Date</label><br>
        <input type="date" id="category_entry_date" name="category_entry_date" value="<?php echo $category_entry_date; ?>"><br><br>
        <input type="text" id="category_id" name="category_id" value="<?php echo $category_id;?>" hidden>
        <input type="submit" name="btnsubmit" value="Update">
    </form>
</body>

</html>