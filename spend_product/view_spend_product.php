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
    $select_spend_product = "SELECT * FROM spend_product";
    $spend_product_query = $conn->query($select_spend_product);

    echo "<table>";
    echo "<tr>
            <th>Spend Product ID</th>
            <th>Spend Product Name</th>
            <th>Spend Product Quantity</th>
            <th>Spend Product Entry Date</th>
            <th>Action</th>
    </tr>";

    while($spend_product_array = mysqli_fetch_assoc($spend_product_query)){
        $spend_product_id         = $spend_product_array['spend_product_id'];
        $spend_product_name       = $spend_product_array['spend_product_name'];
        $spend_product_quantity   = $spend_product_array['spend_product_quantity'];
        $spend_product_entry_date = $spend_product_array['spend_product_entry_date'];

        echo "<tr>
                <td>$spend_product_id</td>
                <td>$product_list[$spend_product_name]</td>
                <td>$spend_product_quantity</td>
                <td>$spend_product_entry_date</td>
                <td>
                    <a href='edit_spend_product.php?id= $spend_product_id'>Edit</a>
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
    <title>View Spend Product</title>
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