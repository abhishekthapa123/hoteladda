<?php
include('connect.php');
session_start();
$hotelname =$_POST['hotelname'];
$hotelowner =$_POST['ownername'];
$pan_number = $_POST['pan_number'];
$location = $_POST['location'];
$phone = $_POST['phone'];
$lat = $_POST['lat'];
$lng  = $_POST['lng'];
$email  = $_POST['email'];
$pic  = $_FILES['image'];
$services  = $_POST['services'];
$services1 = implode(",",$services);

$admin_id;
$adminemail= $_SESSION['adminemail'];
$sql = "SELECT * FROM admin WHERE email='$adminemail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $admin_id= $row["id"];
  }
} else {
  echo "0 results";
}


$filename = $_FILES['image']["name"];
$tempname = $_FILES['image']["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($tempname,$folder);



$sql = "INSERT INTO hotel (hotelname,pan_number, location, ownername,phone,hotel_email,services,lat,lng,image,admin_id)
VALUES ('$hotelname','$pan_number','$location','$hotelowner','$phone','$email','$services1','$lat','$lng','$folder','$admin_id')";

if ($conn->query($sql) === TRUE) {
   $_SESSION['addhotel_message'] ="Your request has been sent to the addaAdmin please wait.." ;
    header('Location:http://localhost/hoteladda/Frontend/myhotels.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}






?>