<<?php
include 'config.php';
$sql = "SELECT * FROM cities";
$result = mysqli_query($conn,$sql);
$result2 = mysqli_query($conn,$sql);


 ?>


<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 20px;
    overflow: hidden;
  /*  background-color: #5c5c5c;*/
}

li {
    float: right;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    /*font-weight: bold;*/
    /*font-size: 20px;*/
}


li a:hover:not(.active) {
    background-color: #63b8ff;
}

.active {
    background-color:#1874cd;
}

body{
  background: url("images/wall_website.jfif");
  background-size: cover;
  background-repeat: no-repeat;
}
.wrapper{
      margin: 0px auto;
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
input[type=text],[type=number],[type=email],[type=date],select{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #424242;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
      font-size: 15px;
}

input[type=submit]:hover {
    background-color: cornflowerblue;
    /*background-color: #ff3e96;*/
}
</style>


</head>
<body>

<ul>
  <li style="font-weight: bold;"><a class="active" href="website.php">Home</a></li>
  <li><a href="userlogot.php">User Logout</a></li>
  <li><a href="contact.html">Contact us</a></li>
  
  <li style="float: left; font-weight:bold; color:white;font-family: sans-serif;font-size: 43px;">AIRLINE MANAGEMENT SYSTEM</li>
</ul>
<div class="wrapper">
<form action="search_flight.php" method="post">
  <input onclick="document.getElementById('arrive').disabled = true;" type="radio" name="trip" value="oneway" id="oneway"> One way
  <input onclick="document.getElementById('arrive').disabled = false;"type="radio" name="trip" value="return" id="return"> Return<br><br>
  Source:
  <select name="source">
    <?php
    while ($row = mysqli_fetch_array($result))
    {
        echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
    }
    ?>
  </select><br><br>
  Destination:
  <select name="destination">
    <?php
    while ($test = mysqli_fetch_array($result2))
    {
        echo "<option value='".$test['Name']."'>".$test['Name']."</option>";
    }
    ?>
  </select><br><br>

  Departure: <input type="date" name="departdate" id="dept" required></input><br><br>
  Arrival:   <input type="date" name="arrivedate" id="arrive" required></input><br><br>
  Adults: <input type="number" min="0" name="adults" required></input><br><br>
  Childrens: <input type="number" min="0" name="childrens" placeholder="Above 3 yrs" required></input><br><br>
  Class:   <select name="travel_class">
      <option value="economic">Economic</option>
      <option value="business">Business</option>
      <option value="vip">VIP</option>

    </select><br><br>

  <input type="submit" value="Search Flights"></input>


</form>
</div>
</body>
</html>
