<?php
    require("../connect_db.php");

    if(isset($_POST['btnsubmit'])){
        $spend_product_name = $_POST['spend_product'];
        $spend_product_quantity = $_POST['spend_product_quantity'];
        $spend_product_entry_date = $_POST['spend_product_entry_date'];

        $insert_spend_product = "INSERT INTO spend_product(spend_product_name, spend_product_quantity, spend_product_entry_date)
                                VALUES('$spend_product_name', ' $spend_product_quantity', '$spend_product_entry_date')";
        $spend_product_query = $conn->query($insert_spend_product);

        if(  $spend_product_query == TRUE){
            echo "Spend Data Inserted";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add spend product</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <label for="spend_product">Spend Product Name</label><br>
        <select name="spend_product" id="spend_product">
            <?php
                $view_product = "SELECT * FROM product";
                $view_product_query = $conn->query($view_product);

                while($view_product_array = mysqli_fetch_assoc($view_product_query)){
                    $product_id = $view_product_array['product_id'];
                    $product_name = $view_product_array['product_name'];

                    echo "<option value='$product_id'>$product_name</option>" ;
                }
            ?>
        </select><br><br>

        <label for="spend_product_quantity">Spend Product Quantity</label><br>
        <input type="text" id="spend_product_quantity" name="spend_product_quantity"><br><br>

        <label for="spend_product_entry_date">Spend Product Entry Date</label><br>
        <input type="date" id="spend_product_entry_date" name="spend_product_entry_date"><br><br>
       
        <input type="submit" name="btnsubmit" value="Submit">
    </form>
</body>
</html>