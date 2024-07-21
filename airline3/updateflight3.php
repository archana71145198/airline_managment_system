<?php

include 'config.php';

$id = $_POST['id'];
$name = $_POST['name'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$departure = $_POST['departure'];
$arrival = $_POST['arrival'];
$fair_economic = $_POST['Fair_Economic'];
$fair_business = $_POST['Fair_Business'];
$fair_vip = $_POST['Fair_VIP'];
$available_seats = $_POST['Available_seats'];

// Check if there are any changes
$sqlCheckChanges = "SELECT * FROM flights WHERE Id = $id";
$resultCheckChanges = mysqli_query($conn, $sqlCheckChanges);
$rowCheckChanges = mysqli_fetch_assoc($resultCheckChanges);

if (
    $rowCheckChanges['Name'] == $name &&
    $rowCheckChanges['Source'] == $source &&
    $rowCheckChanges['Destination'] == $destination &&
    $rowCheckChanges['Departure'] == $departure &&
    $rowCheckChanges['Arrival'] == $arrival &&
    $rowCheckChanges['Fair_Economic'] == $fair_economic &&
    $rowCheckChanges['Fair_Business'] == $fair_business &&
    $rowCheckChanges['Fair_VIP'] == $fair_vip &&
    $rowCheckChanges['Available_seats'] == $available_seats
) {
    // No changes were made
    echo '<div class="info-message">No changes were made to the flight details.</div>';
} else {
    // Changes were made, proceed with the update
    $sql = "UPDATE flights SET Name='$name', Source='$source', Destination='$destination', Departure='$departure', Arrival='$arrival', Fair_Economic='$fair_economic', Fair_Business='$fair_business', Fair_VIP='$fair_vip', Available_seats='$available_seats' WHERE Id = $id";

    if (!mysqli_query($conn, $sql)) {
        // Display an error message with styling for Not Updated
        echo '<div class="error-message">Flight Not Updated!!!</div>';
    } else {
        // Display a success message with styling for Flight Updated Successfully
        echo '<div class="success-message">Flight Updated Successfully!!!</div>';
    }
}

header("Refresh:2; url=updateflight.html");

mysqli_close($conn);

?>
<style>
    .success-message {
        background-color: #ccffcc;
        color: #008000;
        padding: 15px;
        border-radius: 8px;
        margin: 20px auto;
        max-width: 400px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .error-message {
        background-color: #ffcccc;
        color: #cc0000;
        padding: 15px;
        border-radius: 8px;
        margin: 20px auto;
        max-width: 400px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .info-message {
        background-color: #f2f2f2;
        color: #333;
        padding: 15px;
        border-radius: 8px;
        margin: 20px auto;
        max-width: 400px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
