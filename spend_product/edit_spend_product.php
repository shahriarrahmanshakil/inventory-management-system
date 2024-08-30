<?php
    require("../connect_db.php");
    
    if(isset($_GET['id'])){
        $getid = $_GET['id'];

        $edit_sql = "SELECT * FROM spend_product WHERE spend_product_id=$getid";
        $edit_sql_query = $conn->query($edit_sql);
        $edit_sql_array = mysqli_fetch_assoc($edit_sql_query);
        
            $spend_product_id         = $edit_sql_array['spend_product_id'];
            $spend_product_name       = $edit_sql_array['spend_product_name'];
            $spend_product_quantity   = $edit_sql_array['spend_product_quantity'];
            $spend_product_entry_date = $edit_sql_array['spend_product_entry_date'];
    }
?>

<?php
    if(isset($_POST['btnsubmit'])){
       $new_spend_product_id          = $_POST['spend_product_id'];
       $new_spend_product_name        = $_POST['spend_product'];
       $new_spend_product_quantity    = $_POST['spend_product_quantity'];
       $new_spend_product_entry_date  = $_POST['spend_product_entry_date'];

       $update_spend_product = "UPDATE spend_product 
                                SET spend_product_name = '$new_spend_product_name',
                                    spend_product_quantity ='$new_spend_product_quantity',
                                    spend_product_entry_date ='$new_spend_product_entry_date'
                                WHERE spend_product_id =   $new_spend_product_id";
        $update_spend_product_query = $conn->query($update_spend_product);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit spend product</title>
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

                ?>
                <option value=<?php echo $product_id?>
                <?php if($product_id ==  $spend_product_name){echo "selected";} ?>>
                    <?php echo $product_name ?>
                </option>" ;
                
                <?php } ?>
        </select><br><br>

        <label for="spend_product_quantity">Spend Product Quantity</label><br>
        <input type="text" id="spend_product_quantity" name="spend_product_quantity" value="<?php echo $spend_product_quantity?>"><br><br>

        <label for="spend_product_entry_date">Spend Product Entry Date</label><br>
        <input type="date" id="spend_product_entry_date" name="spend_product_entry_date" value="<?php echo $spend_product_entry_date?>"><br><br>
        <input type="text" id="spend_product_id" name="spend_product_id" value="<?php echo $spend_product_id; ?>" hidden>
        <input type="submit" name="btnsubmit" value="Submit">
    </form>
</body>
</html>