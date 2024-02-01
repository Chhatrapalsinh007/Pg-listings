<!-- Login Handler -->
<?php
session_start(); // Start the session at the beginning

// Include the database connection
include '../../db_connect.php'; // Adjust the path as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data sent by the user 
    $email = $_POST['pg_owner_loginemail'];
    $password = $_POST['pg_owner_loginpassword']; // Consider encrypting the password

    // Validation and sanitization of the data should go here

    try {
        // Prepare SQL statement
        $sql = "SELECT Owner_UUID, Owner_Name, Owner_Email, Owner_Password FROM pg_owners WHERE Owner_Email = :email AND Owner_Password = :password";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Execute the statement
        $stmt->execute();

        // Set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Retrieve the result
        $result = $stmt->fetchAll();

        // Check if the user exists
        if (count($result) == 1) {
            // Set session variables
            $_SESSION['pgowner_uuid'] = $result[0]['Owner_UUID'];
            $_SESSION['pgowner_name'] = $result[0]['Owner_Name'];
            $_SESSION['pgowner_email'] = $result[0]['Owner_Email'];
            $_SESSION['pgowner_password'] = $result[0]['Owner_Password'];

            $_SESSION['login_success'] = true; // Set a session variable on success
            header("Location: ../pgowner.php"); // Redirect to the pgowner.php script
            exit();
        } else {
            $_SESSION['login_error'] = true; // Set a session variable on error
            header("Location: ../pgowner.php"); // Redirect to the pgowner.php script
            exit();
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid Request";
}

// Close connection
$conn = null;
?>

