<?php

include '../../db_connect.php';

//if the form is submitted print the data
if (isset($_POST['submit'])) {
    //get the data from the form
    $property_id = $_POST['property_id'];
    $owner_id = $_POST['OwnerId'];
    $property_name = $_POST['PropertyTitle'];
    $property_description = $_POST['PropertyDescription'];
    $property_category = $_POST['PropertyCategory'];
    $property_price = $_POST['PropertyPrice'];
    $property_size = $_POST['PropertySize'];
    $property_bedrooms = $_POST['PropertyBedrooms'];
    $property_beds = $_POST['PropertyBeds'];
    $property_bathrooms = $_POST['PropertyBathrooms'];
    $property_kitchens = $_POST['PropertyKitchens'];
    $property_numberofperson = $_POST['PropertyNumberOfPersons'];
    $property_furniched = $_POST['PropertyFarnichar'];
    $property_yeabuild = $_POST['PropertyYearBuilt'];
    $property_for = $_POST['PropertyFor'];
    $property_status = $_POST['PropertyAvailabilityStatus'];

    // Check if each checkbox was checked and set variables accordingly
    $PropertyWifi = isset($_POST['Wifi']) ? '1' : '0';
    $PropertyAC = isset($_POST['AC']) ? '1' : '0';
    $PropertyGeyser = isset($_POST['Geyser']) ? '1' : '0';
    $PropertyTV = isset($_POST['TV']) ? '1' : '0';
    $PropertyParking = isset($_POST['Parking']) ? '1' : '0';
    $PropertyLaundry = isset($_POST['Laundry']) ? '1' : '0';
    $PropertyVisitorsAllowed = isset($_POST['VisitorsAllowed']) ? '1' : '0';
    $PropertyElevator = isset($_POST['Elevator']) ? '1' : '0';
    $PropertyRefrigerator = isset($_POST['Refrigerator']) ? '1' : '0';
    $PropertyCCTV = isset($_POST['CCTV']) ? '1' : '0';


    $property_address = $_POST['PropertyAddress'];
    $property_city = $_POST['PropertyCity'];
    $property_state = $_POST['PropertyState'];
    $property_pincode = $_POST['PropertyPinCode'];


    //print the data in the console
    echo "Property ID: " . $property_id . "<br>";
    echo "Owner ID: " . $owner_id . "<br>";
    echo "Property Name: " . $property_name . "<br>";
    echo "Property Description: " . $property_description . "<br>";
    echo "Property Category: " . $property_category . "<br>";
    echo "Property Price: " . $property_price . "<br>";
    echo "Property Size: " . $property_size . "<br>";
    echo "Property Bedrooms: " . $property_bedrooms . "<br>";
    echo "Property Beds: " . $property_beds . "<br>";
    echo "Property Bathrooms: " . $property_bathrooms . "<br>";
    echo "Property Kitchens: " . $property_kitchens . "<br>";
    echo "Property Number of Person: " . $property_numberofperson . "<br>";
    echo "Property Furniched: " . $property_furniched . "<br>";
    echo "Property Year Build: " . $property_yeabuild . "<br>";
    echo "Property For: " . $property_for . "<br>";
    echo "Property Status: " . $property_status . "<br>";

    echo "Property Wifi: " . $PropertyWifi . "<br>";
    echo "Property AC: " . $PropertyAC . "<br>";
    echo "Property Geyser: " . $PropertyGeyser . "<br>";
    echo "Property TV: " . $PropertyTV . "<br>";
    echo "Property Parking: " . $PropertyParking . "<br>";
    echo "Property Laundry: " . $PropertyLaundry . "<br>";
    echo "Property Visitors Allowed: " . $PropertyVisitorsAllowed . "<br>";
    echo "Property Elevator: " . $PropertyElevator . "<br>";
    echo "Property Refrigerator: " . $PropertyRefrigerator . "<br>";
    echo "Property CCTV: " . $PropertyCCTV . "<br>";

    echo "Property Address: " . $property_address . "<br>";
    echo "Property City: " . $property_city . "<br>";
    echo "Property State: " . $property_state . "<br>";
    echo "Property Pincode: " . $property_pincode . "<br>";

    //update the data in the database
    // $sql = "INSERT INTO pg_listings (
    //     OwnerId, PG_Title,PG_Description,PG_Category,
    //     PG_Rent,PG_Size_sqft,PG_Bedrooms,PG_Beds,
    //     PG_Bathrooms,PG_Farnichar,PG_BuiltYear,PG_ApprovalStatus,
    //     PG_Kitchens,PG_WiFi,PG_AC,PG_Geyser,
    //     PG_TV,PG_Parking,PG_Laundry,PG_VisitorsAllowed,
    //     PG_Elevator,PG_Refrigerator,PG_CCTV,PG_Address,
    //     PG_City,PG_State,PG_PinCode) VALUES 
    //     ('$OwnerId', '$PropertyTitle', '$PropertyDescription','$PropertyCategory', 
    //      '$PropertyPrice','$PropertySize', '$PropertyBedrooms','$PropertyBeds',
    //      '$PropertyBathrooms','$PropertyFarnichar','$PropertyYearBuilt', '$PropertyAvailabilityStatus',
    //      '$PropertyKitchens', '$Wifi', '$AC','$Geyser','$TV',
    //       '$Parking', '$Laundry', '$VisitorsAllowed', '$Elevator', 
    //       '$Refrigerator', '$CCTV', '$PropertyAddress', '$PropertyCity', 
    //       '$PropertyState', '$PropertyPinCode')";

    //update the data in the database using prepared statement to prevent sql injection and idor

    $sql = "UPDATE pg_listings SET
    PG_Title = '$property_name', PG_Description = '$property_description', PG_Category = '$property_category',
    PG_Rent = '$property_price', PG_Size_sqft = '$property_size', PG_Bedrooms = '$property_bedrooms', PG_Beds = '$property_beds',
    PG_Bathrooms = '$property_bathrooms', PG_Farnichar = '$property_furniched', PG_BuiltYear = '$property_yeabuild', PG_ApprovalStatus = 'Under Process',PG_Availability = '$property_status',
    PG_Kitchens = '$property_kitchens', PG_WiFi = '$PropertyWifi', PG_AC = '$PropertyAC', PG_Geyser = '$PropertyGeyser',
    PG_TV = '$PropertyTV', PG_Parking = '$PropertyParking', PG_Laundry = '$PropertyLaundry', PG_VisitorsAllowed = '$PropertyVisitorsAllowed',
    PG_Elevator = '$PropertyElevator', PG_Refrigerator = '$PropertyRefrigerator', PG_CCTV = '$PropertyCCTV', PG_Address = '$property_address',
    PG_City = '$property_city', PG_State = '$property_state', PG_PinCode = '$property_pincode' WHERE PGID = '$property_id'";





    try{

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        echo "Record updated successfully";

        header("Location: properties-list.php");


    }
    catch (Exception $e){
        echo "Error: " . $e->getMessage();
    }


} else {
    echo "Form was not submitted";
}
