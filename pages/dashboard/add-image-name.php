<?php

//start session
session_start();

include '../../db_connect.php';


//retive session data
$last_inserted_id = $_SESSION['last_inserted_id'];
$target_file = $_SESSION['filename'];


//print session data in console log

echo "<script>console.log('last_inserted_id: " . $last_inserted_id . "');</script>";
echo "<script>console.log('target_file: " . $target_file . "');</script>";

//insert the pg_id and image name into the database table
try {

    $sql = "INSERT INTO property_attachments (pg_id, file_name) VALUES (:pd_id, :image_name)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pd_id', $last_inserted_id);
    $stmt->bindParam(':image_name', $target_file);
    $stmt->execute();
    echo "<script>console.log('Image name inserted successfully');</script>";
    header('Location: properties-list.php');
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}



?>