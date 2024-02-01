<?php
session_start(); // Start the session at the beginning

// Include the database connection
include '../../db_connect.php'; // Adjust the path as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Function to generate UUID
    function generateUUID() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = 8;
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
    
        return $randomString;
    }
    
    // Retrieve form data sent by the user 
    $uuid = generateUUID(); // Generate UUID
    $name = $_POST['pgownername'];
    $email = $_POST['pgowneremail'];
    $password = $_POST['pgownerpassword']; // Consider encrypting the password

    // Validation and sanitization of the data should go here

    try {
        // Prepare SQL statement
        $sql = "INSERT INTO pg_owners (Owner_UUID, Owner_Name, Owner_Email, Owner_Password) VALUES (:uuid, :name, :email, :password)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':uuid', $uuid);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Execute the statement
        $stmt->execute();

        $_SESSION['signup_success'] = true; // Set a session variable on success
        header("Location: ../pgowner.php"); // Redirect to the pgowner.php script
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid Request";
}

// Close connection
$conn = null;
?>