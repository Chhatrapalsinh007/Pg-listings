<?php
session_start();

echo "<script>console.log('PHP Session Variables: " . json_encode($_SESSION) . "');</script>";

//retrive the OwnerId from the session data variable
$OwnerId = $_SESSION['data'][0]['OwnerId'];

//retrive the PropertyId from the url
$PropertyId = $_GET['property_id'];

//print the OwnerId
echo "<script>console.log('OwnerId: " . $OwnerId . "');</script>";

//print the PropertyId
echo "<script>console.log('PropertyId For Delete: " . $PropertyId . "');</script>";



// Include the database connection
include '../../db_connect.php'; // Adjust the path as needed

// SQL query to delete the property

try {

	//  <!--
	// 	=============================================
	// 	count the total number of properties for specific OwnerId from the database Start
	// 	==============================================
	// 	-->

	//count the total number of properties for specific OwnerId from the database
	$total_property = "SELECT COUNT(*) AS total FROM pg_listings WHERE OwnerId = :OwnerId";
	$stmt = $conn->prepare($total_property);




	// Bind parameters
	$stmt->bindParam(':OwnerId', $OwnerId);

	// Execute the statement
	$stmt->execute();

	// Set the resulting array to associative
	$total_property_count = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	// Retrieve the result
	$total_property_count = $stmt->fetchAll();

	//print the result
	echo "<script>console.log('Total Properties: " . json_encode($total_property_count) . "');</script>";

	//  <!--
    // 	=============================================
    // Delete the property from the database Start where owner can only delete the property if they are the owner of the property and prevent other owner to delete the property Start
    // 	==============================================
    // 	-->

    //delete the property from the database where owner can only delete the property if they are the owner of the property and prevent other owner to delete the property
    $delete_property = "DELETE FROM pg_listings WHERE OwnerId = :OwnerId AND PGID = :PropertyId";
    $stmt = $conn->prepare($delete_property);

    // Bind parameters
    $stmt->bindParam(':OwnerId', $OwnerId);
    $stmt->bindParam(':PropertyId', $PropertyId);

    // Execute the statement
    $stmt->execute();

    // Set the resulting array to associative
    $property = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Retrieve the result
    $property = $stmt->fetchAll();


	//if the property is deleted successfully then redirect to the dashboard page and prevent the owner to delete the property if they are not the owner of the property and display the error message
    if ($stmt->rowCount() > 0) {
        //if the property is deleted successfully then redirect to the dashboard page
        header("Location: properties-list.php?deletionStatus=success");

    } else {
        //if the property is not deleted successfully then redirect to the dashboard page and display the error message
        header("Location: properties-list.php?deletionStatus=error");
    }
   
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}

?>
