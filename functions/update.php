<?php
    // Include a PHP configuration file.
    include "config.php";

    // Check if the form is submitted for updating a product.
    if (isset($_POST['update'])) {
        // Retrieve data from the form fields.
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        // SQL query to update the product with the provided data.
        $sql = "UPDATE `products` SET `name` =  '$name', `description` = '$description', `price` = '$price',
         `image` = '$image' WHERE `id` = '$user_id'";

        // Execute the SQL query and check if it was successful.
        $result = $conn->query($sql);

        // Provide feedback based on the query result.
        if ($result == TRUE) {
            echo "Record updated seccessfully.  ";
        } else {
            echo "Error." . $sql . $conn->error;
        }
    }

    // Check if 'id' is set in the URL to edit a product.
    if(isset($_GET["id"])) {
        $user_id = $_GET['id'];

        // SQL query to select a specific product by 'id'.
        $sql = "SELECT * FROM products WHERE id = $user_id";

        // Execute the SQL query to retrieve the product data.
        $result = $conn->query($sql);

        // Check if there are rows in the result.
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Extract product data for editing.
                $name = $row['name'];
                $description = $row['description'];
                $price = $row['price'];
                $image = $row['image'];
                $id = $row['id'];
            }
?>
<h1>Products Update Form</h1>
<form method="POST">
    <!-- Form fields to edit product information. -->
    <label for="name">Name:</label>
    <br>
    <input type="text" name="name" id="name" require value="<?php echo $name; ?>">

    <!-- Hidden field to store the 'id' of the product being edited. -->
    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
    <br>

    <label for="description">Description:</label>
    <br>

    <input type="text" name="description" id="description" require value="<?php echo $description; ?>">
    <br>

    <label for="price">Price:</label>
    <br>
    <input type="number" name="price" id="price" require value="<?php echo $price; ?>">

    <br>
    <label for="image">Image:</label>
    <br>
    <input type="file" name="image" id="image" accept="image/png, image/gif, image/jpeg" require value="<?php echo $image; ?>">

    <br>
    <!-- Submit button to update the product. -->
    <input type="submit" value="Update" name="update">
</form>
<?php
        } else {
            // Redirect to the 'read.php' page if the specified product does not exist.
            header('Location: read.php');
        }
    }
?>