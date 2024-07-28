<?php
    require("../connect_db.php");
    
    $select_category = "SELECT * FROM category";
    $select_category_query = $conn->query($select_category);

    $category_list = array();
   
    
    while($select_category_array = mysqli_fetch_assoc($select_category_query)){
        $category_id = $select_category_array['category_id'];
        $category_name = $select_category_array['category_name'];

        $category_list[$category_id] = $category_name;
    }
    

?>

<?php
    $select_product = "SELECT * FROM product";
    $select_product_query = $conn->query($select_product);

        echo "<table>";
        echo "<tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Product Code</th>
            <th>Product Entry Date</th>
            <th>Action</th>
        </tr>";

    while($select_product_array = mysqli_fetch_assoc($select_product_query)){
        $product_id         = $select_product_array['product_id'];
        $product_name       = $select_product_array['product_name'];
        $product_category   = $select_product_array['product_category'];
        $product_code       = $select_product_array['product_code'];
        $product_entry_date = $select_product_array['product_entry_date'];
       
        echo "<tr>
            <td>$product_id</td>
            <td>$product_name</td>
            <td>$category_list[$product_category]</td>
            <td>$product_code</td>
            <td>$product_entry_date </td>
            <td>
                <a href='edit_product.php?id=$product_id'>Edit</a>
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
    <title>View Product</title>
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