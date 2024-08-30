<?php
    require("../connect_db.php");
    
    if(isset($_GET['id'])){
        $get_id = $_GET['id'];

        $select_product = "SELECT * FROM product WHERE product_id = $get_id";
        $select_product_query = $conn->query($select_product);
        $select_product_array = mysqli_fetch_assoc($select_product_query);

        $product_id         = $select_product_array['product_id'];
        $product_name       = $select_product_array['product_name']; 
        $product_category   = $select_product_array['product_category'];
        $product_code       = $select_product_array['product_code'];
        $product_entry_date = $select_product_array['product_entry_date'];


    }
?>

<?php
    if(isset($_GET['product_name'])){
        $new_product_id = $_GET['product_id'];
        $new_product_name = $_GET['product_name'];
        $new_product_category = $_GET['product_category'];
        $new_product_code = $_GET['product_code'];
        $new_product_entry_date = $_GET['product_entry_date'];

        $update_product = "UPDATE product 
                           SET product_name       = '$new_product_name',
                               product_category   = '$new_product_category', 
                               product_code       = '$new_product_code',
                               product_entry_date = '$new_product_entry_date' 
                           WHERE product_id = $new_product_id";
                           
        $update_product_query = $conn->query($update_product);
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="get">
        <label for="product_name">Product Name</label><br>
        <input type="text" id="product_name" name="product_name" value="<?php echo "$product_name"; ?>"><br><br>

        <label for="product_category">Product Category</label><br>
        <select name="product_category" id="product_category">
            <?php 
                $select_category = "SELECT * FROM category";
                $select_category_query = $conn->query($select_category);

                while($category_array = mysqli_fetch_assoc($select_category_query)){
                    $category_id = $category_array['category_id'];
                    $category_name = $category_array['category_name'];
            ?>

            <option 
                value='<?php echo $category_id;?>'
                    <?php if($category_id == $product_category){echo "selected";}?>>
                <?php echo $category_name;?>
            </option>

            <?php } ?>  

        </select> <br><br>

        <label for="product_code">Product Code</label><br>
        <input type="text" id="product_code" name="product_code" value="<?php echo "$product_code"; ?>"><br><br>

        <label for="product_entry_date">Product Entry Date</label><br>
        <input type="date" id="product_entry_date" name="product_entry_date" value="<?php echo "$product_entry_date"; ?>"><br><br>
        <input type="text" id="product_id" name="product_id" value="<?php echo "$product_id"; ?>"><br><br>

        <input type="submit" name="btnsubmit" value="Submit">
    </form>
</body>
</html>