<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set the character encoding and viewport meta information. -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <!-- Link to an external CSS file for styling. -->
    <link rel="stylesheet" href="../css/create.css">
</head>
<body>
    <!-- Create an HTML form for entering personal information. -->
    <div class="container">
        <h1>Personal information</h1>
        <form method="POST">

            <!-- Input field for entering a name. -->
            <div id="name">
                <label for="name">Name:</label>
                <input type="text" require placeholder="Name" id="name" name="name" class="empty">
            </div>

            <!-- Input field for entering a description. -->
            <div id="des">
                <label for="descrip">Description:</label>
                <input type="text" name="description" id="description" max="15" min="5" class="empty" placeholder="Description" require>
            </div>

            <!-- Input field for entering a price. -->
            <div id="price-div">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" placeholder="Price" require>
            </div>

            <!-- Input field for selecting an image file. -->
            <div id="img">
                <label for="image" id="label-gender">Image:</label>
                <input type="file" id="image" name="image" class="empty" accept="image/png, image/gif, image/jpeg" require>
            </div>

            <!-- Submit button for the form. -->
            <input type="submit" id="submit" name="submit">

        </form>
    </div>

<?php
    // Include a PHP configuration file.
    include "config.php";

    // Check if the form was submitted.
    if(isset($_POST["submit"])) {
        // Retrieve data from the form fields.
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $image = $_POST["image"];

        // SQL query to insert data into the 'products' table.
        $sql = "INSERT INTO `products` (`name`, `description`, `price`, `image`) VALUES
        ('$name','$description','$price','$image')";

        // Execute the SQL query and check if it was successful.
        $result = $conn->query($sql);

        // Provide feedback based on the query result.
        if ($result === TRUE) {
            echo "<script> console.log('New record created successfully.')</script>";
        } else {
            echo "Error." . $sql . "<br>" . $conn->error;
        }
        
        // Close the database connection.
        $conn->close(); 
    }
?>
</body>
</html>