<?php require "connect_db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Category</title>
    <style>
        table,tr,th,td{
            border: 1px solid black;
            border-collapse: collapse;

        }
    </style>
</head>
<body>
    <?php
        $select_data = "SELECT * FROM category";
        $select_data_query = $conn->query($select_data);
       
        echo "<table>";
            echo "<tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Category Entry Date</th>
                    <th>Action</th>
                </tr>";

            while($data_in_array = mysqli_fetch_assoc($select_data_query)){
                $category_id = $data_in_array['category_id'];
                $category_name = $data_in_array['category_name'];
                $category_entry_date = $data_in_array['category_entry_date'];

                echo "<tr>
                        <td>$category_id</td>
                        <td>$category_name</td>
                        <td>$category_entry_date</td>
                        <td>
                            <a href='edit_category.php?id=$category_id'>Edit</a>
                        </td>
                    </tr>";
            }

        echo "</table>";
    ?>
</body>
</html>