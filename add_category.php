<?php
    require("connect_db.php");
    
    if (isset($_POST['btnsubmit'])) {
        $category_name       = $_POST['category_name'];
        $category_entry_date = $_POST['category_entry_date'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>

<body>
    <form action="add_category.php" method="post">
        <label for="category_name">Category Name</label><br>
        <input type="text" id="category_name" name="category_name"><br><br>
        <label for="category_entry_date	">Category Entry Date</label><br>
        <input type="date" id="category_entry_date" name="category_entry_date"><br><br>
        <input type="submit" name="btnsubmit" value="Submit">
    </form>
</body>

</html>