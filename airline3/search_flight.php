<style>
table {
    width: 100%;
}

th{
   height: 50px;
  text-align:center;
  font-size: 15px;
  font-family: sans-serif;
    padding: 15px;
    text-align: left;
  background-color: #4f94cd;
color: white;
}

td {
  text-align:center;
  font-size: 15px;
  font-family: sans-serif;
    padding: 15px;
    text-align: left;

}
tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}

</style>
<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 20px;
    overflow: hidden;
    /*background-color: #333;*/
}

li {
    float: right;
}

li a {
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}


li a:hover:not(.active) {
    background-color: #87cefa;
}

.active {
    background-color: #4f94cd;
}

body{
  background: url("images/plane.jpg");
  background-size: cover;
  background-repeat: no-repeat;
}
.wrapper{
  width: 350px; padding: 20px;
  display: block;
  color: black;
  text-align: left;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 25px;
  font-family: sans-serif;
  //background-image: url("images/cssback.png");

}
</style>


</head>
<body>

<ul>
  <li style="font-weight: bold;"><a class="active" href="website.php">Home</a></li>
  <li><a href="userlogot.php">User Logoout</a></li>
  <li><a href="contact.html">Contact us</a></li>
  <li style="float: left; color:black;font-family: sans-serif; font-weight:bold;font-size: 43px;">AIRLINE MANAGEMENT SYSTEM</li>
</ul>
<h1 style="color:black; text-align: center; ">availability of flights </h1>

<?php
include 'confige.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $source = $_POST["source"];
  $destination = $_POST["destination"];
  $departure = $_POST["departdate"];
  // Check if 'trip' key exists in $_POST array before accessing it
  $trip = isset($_POST["trip"]) ? $_POST["trip"] : ''; 
  if ($trip == 'return') {
      $arrival = $_POST["arrivedate"];
  }
  $adults = $_POST["adults"];
  $childrens = $_POST["childrens"];
  $trip_class = $_POST['travel_class'];
  $total_passengers = $adults + $childrens;



  // Perform SQL query based on trip type
  if ($trip == 'oneway') {
    $sql = "SELECT * FROM flights WHERE Source = '$source' AND Destination = '$destination' AND '$departure' >= Departure AND Available_seats > 0";
  } else {
    $arrival = mysqli_real_escape_string($conn, $_POST["arrivedate"]);
    $sql = "SELECT * FROM flights WHERE Source = '$source' AND Destination = '$destination' AND '$departure' >= Departure AND '$arrival' <= Arrival AND Available_seats > 0";
  }

  // Execute SQL query
  $result = mysqli_query($conn, $sql);

  // Check if query was successful
  if ($result) {
    // Display flight availability table
    echo "<table border='1'>";
    echo "<tr><th>Id</th><th>Name</th><th>Source</th><th>Destination</th><th>Fare</th><th>Action</th></tr>";

    // Fetch and display results
    while ($row = mysqli_fetch_assoc($result)) {
      // Calculate price based on trip class
      if ($trip_class == 'economic') {
        $fare = $row['Fair_Economic'] * $adults + 0.5 * $row['Fair_Economic'] * $childrens;
      } elseif ($trip_class == 'business') {
        $fare = $row['Fair_Business'] * $adults + 0.5 * $row['Fair_Business'] * $childrens;
      } else {
        $fare = $row['Fair_VIP'] * $adults + 0.5 * $row['Fair_VIP'] * $childrens;
      }

      // Display flight details and booking form
      echo "<tr><td>{$row['Id']}</td><td>{$row['Name']}</td><td>{$row['Source']}</td><td>{$row['Destination']}</td><td>{$fare}</td><td><form id=\"Passing\" method=\"post\" action=\"book_flight.php\">
      <input name=\"Id\" type=\"hidden\" value=\"{$row['Id']}\">
      <input name=\"price\" type=\"hidden\" value=\"$fare\">
      <input name=\"total_passengers\" type=\"hidden\" value=\"$total_passengers\">
      <input name=\"submit\" type=\"submit\" value=\"Book\">
      </form></td></tr>";
    }
    echo "</table>";
  } else {
    // Display error message if query fails
    echo "Error: " . mysqli_error($conn);
  }

  // Close database connection
  mysqli_close($conn);
}
?>

</body>
</html>
