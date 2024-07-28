<?php
    require("../connect_db.php");

    if(isset($_POST['btnsubmit'])){
        $product_name       = $_POST['product_name'];
        $product_category   = $_POST['product_category'];
        $product_code       = $_POST['product_code'];
        $product_entry_date = $_POST['product_entry_date'];
        
        $insert_product = "INSERT INTO product(product_name,product_category,product_code,product_entry_date)
                            VALUES('$product_name',' $product_category','$product_code','$product_entry_date')";
        $insert_product_query = $conn->query($insert_product);
    }
?>

<?php

     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <label for="product_name">Product Name</label><br>
        <input type="text" id="product_name" name="product_name"><br><br>

        <label for="product_category">Product Category</label><br>
        <select name="product_category" id="product_category">
            <?php 
                $select_category = "SELECT * FROM category";
                $select_category_query = $conn->query($select_category);

                while($category_array = mysqli_fetch_assoc($select_category_query)){
                    $category_id = $category_array['category_id'];
                    $category_name = $category_array['category_name'];

                    echo "<option value=' $category_id'>$category_name</option>";
                }      
            ?>
        </select> <br><br>

        <label for="product_code">Product Code</label><br>
        <input type="text" id="product_code" name="product_code"><br><br>

        <label for="product_entry_date">Product Entry Date</label><br>
        <input type="date" id="product_entry_date" name="product_entry_date"><br><br>

        <input type="submit" name="btnsubmit" value="Submit">
    </form>
</body>
</html>