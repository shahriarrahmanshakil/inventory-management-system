<?php
    require("../connect_db.php");
    if(isset($_GET['id'])){
        $get_id = $_GET['id'];

        $select_store_product = "SELECT * FROM store_product WHERE store_product_id = $get_id";
        $store_product_query = $conn->query($select_store_product);
        $store_product_array = mysqli_fetch_assoc($store_product_query);

        $store_product_id        = $store_product_array['store_product_id'];
        $store_product_name      = $store_product_array['store_product_name'];
        $store_product_quantity  = $store_product_array['store_product_quantity'];
        $store_product_entry_date= $store_product_array['store_product_entry_date'];
    }
?>

<?php
    if(isset($_POST['btnsubmit'])){
        $new_store_product_id        = $_POST['store_product_id'];
        $new_store_product_name      = $_POST['store_product'];
        $new_store_product_quantity  = $_POST['s_p_q'];
        $new_store_product_entry_date= $_POST['s_p_entry_date'];

        $update_store_product = "UPDATE store_product
                                SET store_product_name = '$new_store_product_name',
                                    store_product_quantity = '$new_store_product_quantity',
                                    store_product_entry_date = '$new_store_product_entry_date'
                                WHERE store_product_id = $new_store_product_id ";
        $update_store_product_query = $conn->query($update_store_product);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Store Product</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="store_product">Store Product</label><br>
        <select name="store_product" id="store_product" >
            <?php
                $select_product = "SELECT * FROM product"; 
                $select_product_query = $conn->query($select_product);
                while($store_product_array = mysqli_fetch_assoc($select_product_query)){
                    $product_id = $store_product_array['product_id'];
                    $product_name = $store_product_array['product_name'];
            ?>
                <option value=<?php echo $product_id ?>
                    <?php if($product_id == $store_product_name){echo "selected";}?>> 
                    <?php echo $product_name; ?>
                </option>

            <?php  }  ?> 
        </select><br><br>
        <label for="s_p_q">Store Product Quantity</label><br>
        <input type="text" id="s_p_q" name="s_p_q" value="<?php echo $store_product_quantity;?>"><br><br>
        <label for="s_p_entry_date">Store Product Entry Date</label><br>
        <input type="date" id="s_p_entry_date" name="s_p_entry_date" value="<?php echo $store_product_entry_date;?>"><br><br>
        <input type="text" id="store_product_id" name="store_product_id" value="<?php echo $store_product_id;?>" hidden>
        <input type="submit" name="btnsubmit" value="Submit">
    </form>
</body>
</html>