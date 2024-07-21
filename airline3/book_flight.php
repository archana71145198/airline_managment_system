<style>
table {
    width: 100%;
}

th{
   height: 50px;
  text-align:center;
  font-size: 25px;
  font-family: sans-serif;
    padding: 15px;
    text-align: center;
  background-color: #4f94cd;
color: white;
}

td {
  text-align:center;
  font-size: 25px;
  font-family: sans-serif;
    padding: 15px;
    text-align: center;

}
tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}

</style>

<?php

$id = $_POST['Id'];
$price = $_POST['price'];
$total_passengers = $_POST['total_passengers'];


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
   /* background-color: #333;*/
}

li {
    float: right;
}

li a {
    display: block;
    color: black;
    text-align: center;
    padding: 5px 35px;
    text-decoration: none;
}


li a:hover:not(.active) {
    background-color: #87cefa;
}

.active {
    background-color: #4f94cd;
}

body{
  background: url("images/book1.jpg");
  background-size: cover;
  background-repeat: no-repeat;
}
.wrapper{
  width: 350px; 
  padding: 20px;
  display: block;
  color: black;
  text-align: center;
  padding: 0px 550px;
  text-decoration: none;
  font-size: 25px;
  font-family: sans-serif;
  /*background-image: url("images/cssback.png");*/

}

textarea{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=text],[type=number],[type=email],[type=date][type=tel],select{
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
    background-color: #363636;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: cornflowerblue;
}
</style>


</head>
<body>

<ul>
  <li style="font-weight: bold;"><a class="active" href="website.php">Home</a></li>
  <li><a href="userlogot.php">User Logout</a></li>
  <li><a href="contact.html">Contact us</a></li>
  <li style="float: left; color:black; font-weight:bold; font-weight:bold; font-family: sans-serif;font-size: 43px;">AIRLINE MANAGEMENT SYSTEM</li>
</ul>
<div class="wrapper">
<form action="update.php" method="post">
  <input type="hidden" name="flight_id" value="<?php echo "$id"?>"></input>
  <input type="hidden" name="price" value="<?php echo "$price"?>"></input>
  <input type="hidden" name="total_passengers" value="<?php echo "$total_passengers"?>"></input>
  
  <h2 style="color:black; text-align: center;">Booking</h2>
  First Name:  <input type="text" name="firstname" required ></input><br><br>
  Last Name:   <input type="text" name="lastname" required ></input><br><br>
  Mobile No: <input type="text"  minlength ="10" maxlength="10" name="mob_no" pattern=[0-9]{10} required></input><br><br>
<!-- Mobile No: <input type="text"  minlength ="10" maxlength="10" name="mob_no" pattern=[0-9]{10} required></input><br><br>-->
  Email Id:  <input type="email" placeholder="Enter email..." name="email" required></input><br><br>

  <input type="submit" value="Book Flight"></input>


</form>
</div>









</body>
</html>
