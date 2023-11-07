<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set the character encoding and viewport meta information. -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <!-- Link to an external Bootstrap CSS file for styling. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        img {
            width: 50px;
        }
    </style>
</head>
<body>
    <!-- Create the main container for displaying data from the 'products' table. -->
    <div class="container">
        <h2>Users</h2>
        <!-- Create a table to display product information. -->
        <table class="table">
            <thead>
                <tr>
                    <!-- Table header columns. -->
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include a PHP configuration file.
                include "config.php";

                // SQL query to select all records from the 'products' table.
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                // Check if there are rows in the result.
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>

                <tr>
                    <!-- Display product information in table rows. -->
                    <td><?php echo $row["id"];?></td>
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["description"];?></td>
                    <td><?php echo $row["price"];?></td>
                    <td><?php echo"<img src='../img/" . $row['image'] . "'>";?></td>
                    <td>
                        <!-- Create 'Edit' and 'Delete' buttons for each product entry. -->
                        <a class="btn btn-info" href="update.php?id=<?php echo $row['id'];?>">Edit</a>&nbsp;
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>