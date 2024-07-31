<?php

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
        <input type="text" id="spend_product" name="spend_product"><br><br>

        <label for="spend_product_quantity">Spend Product Quantity</label><br>
        <input type="text" id="spend_product_quantity" name="spend_product_quantity"><br><br>

        <label for="spend_product_entry_date">Spend Product Entry Date</label><br>
        <input type="date" id="spend_product_entry_date" name="spend_product_entry_date"><br><br>
       
        <input type="submit" name="btnsubmit" value="Submit">
    </form>
</body>
</html>