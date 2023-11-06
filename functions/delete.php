<?php
    // Include a PHP configuration file.
    include "config.php"; 

    // Check if 'id' is set in the URL.
    if (isset($_GET['id'])) {
        // Retrieve the 'id' from the URL.
        $user_id = $_GET['id'];

        // SQL query to delete a record from the 'products' table using the provided 'id'.
        $sql = "DELETE FROM `products` WHERE `id`='$user_id'";

        // Execute the SQL query and check if it was successful.
        $result = $conn->query($sql);

        // Provide feedback based on the query result.
        if ($result == TRUE) {
            echo "Record deleted successfully.";
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    } 
?>