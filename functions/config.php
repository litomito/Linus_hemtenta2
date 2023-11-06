<?php
    // Define database connection parameters.
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create a new MySQL database connection.
    $conn = new mysqli($servername, $username, $password);

    // Check if the database connection was successful or not.
    if ($conn->connect_error) {
        die("Connetion failed: " . $conn->connect_error);
    }

    // Create a database named 'crud_app' if it doesn't already exist.
    $createSQL = "CREATE DATABASE IF NOT EXISTS crud_app";
    if ($conn->query($createSQL) === TRUE) {
        echo "<script> console.log(`Database 'crud_app' created successfully.`)</script>";

        // Select the 'crud_app' database.
        $conn->select_db("crud_app");

        // Create a table named 'products' with specific fields if it doesn't already exist.
        $createTableSQL = "CREATE TABLE IF NOT EXISTS products (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(255) NOT NULL,
            `description` VARCHAR(255) NOT NULL,
            `price` VARCHAR(255) NOT NULL,
            `image` VARCHAR(255) NOT NULl
        )";

        // Check if the table creation was successful or not.
        if ($conn->query($createTableSQL) === TRUE) {
            echo "<script> console.log('The Table products was created successfully!')</script>";
        } else {
            echo "<script> console.log('Error with creating table: " . $conn->error . "')</script>";
        }

    } else {
        echo "<script> console.log('Error creating database: " . $conn->error . "')</script>";
    }
?>