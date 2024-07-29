<?php
    require("../connect_db.php");

    $select_product = "SELECT * FROM product";
    $product_query = $conn->query($select_product);

    $product_list = array();

    while($product_array = mysqli_fetch_assoc($product_query)){
        $product_id = $product_array['product_id'];
        $product_name = $product_array['product_name'];

        $product_list[$product_id] =  $product_name;
    }
?>

<?php
    $view_product = "SELECT * FROM store_product";
    $view_product_query = $conn->query($view_product);

    echo "<table>";
    echo "<tr>
        <th>Store Product ID</th>
        <th>Store Product Name</th>
        <th>Store Product Quantity</th>
        <th>Store Product Entry Date</th>
        <th>Action</th>
    </tr>";
    while($view_product_array = mysqli_fetch_assoc($view_product_query)){
        $store_product_id = $view_product_array['store_product_id'];
        $store_product_name = $view_product_array['store_product_name'];
        $store_product_quantity	 = $view_product_array['store_product_quantity'];
        $store_product_entry_date = $view_product_array['store_product_entry_date'];

        echo "<tr>
            <td>$store_product_id</td>
            <td>$product_list[$store_product_name]</td>
            <td>$store_product_quantity	</td>
            <td>$store_product_entry_date</td>
            <td>
                <a href='edit_store_product.php?id=$store_product_id'>Edit</a>
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
    <title>View Store Product</title>
    <style>
        table,th,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    
</body>
</html>