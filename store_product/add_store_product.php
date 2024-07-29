<?php
    require("../connect_db.php");
    if(isset($_POST['btnsubmit'])){
        $store_product =  $_POST['store_product'];
        $store_product_quantity =  $_POST['s_p_q'];
        $store_product_entry_date =  $_POST['s_p_entry_date'];
        		
        $insert_store_product ="INSERT INTO store_product(store_product_name,store_product_quantity,store_product_entry_date)
                                VALUES('$store_product','$store_product_quantity','$store_product_entry_date')";
        $insert_store_product_query = $conn->query($insert_store_product);
        

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Store Product</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="store_product">Store Product</label><br>
        <select name="store_product" id="store_product">
            <?php
                $select_product = "SELECT * FROM product"; 
                $select_product_query = $conn->query($select_product);
                while($store_product_array = mysqli_fetch_assoc($select_product_query)){
                    $product_id = $store_product_array['product_id'];
                    $product_name = $store_product_array['product_name'];

                    echo "<option value='$product_id'> $product_name</option>";
                }
            ?>
        </select><br><br>
        <label for="s_p_q">Store Product Quantity</label><br>
        <input type="text" id="s_p_q" name="s_p_q"><br><br>
        <label for="s_p_entry_date">Store Product Entry Date</label><br>
        <input type="date" id="s_p_entry_date" name="s_p_entry_date"><br><br>
        <input type="submit" name="btnsubmit" value="Submit">
    </form>
</body>
</html>