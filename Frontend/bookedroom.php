<?php
session_start();
include('connect.php');
$hotelid = $_GET['hotelid'];
$sql10 = "SELECT *FROM hotel h  INNER JOIN admin a on a.id = h.admin_id where h.hotel_id= $hotelid";
$result10 = mysqli_query($conn, $sql10);

if (mysqli_num_rows($result10) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result10)) {
   $gmail = $row['email'];
   $hotelnames = $row['hotelname'];
 
  }
} 



$room_id = $_GET['room'];//room id
$rid1 = explode(',', $room_id);
$rid = $rid1[1];
$current_room;

$fullname = $_GET['fullname'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$checkin  = $_GET['checkin'];
$checkout = $_GET['checkout'];
$room_num  = $_GET['rooms_num'];//room number
$totalprice = $_GET['totalprice'];
$hid = $_GET['hid'];
$email = $_SESSION['email'];
$user_id;
$sql = "SELECT *FROM user where email ='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
   $user_id = $row['id'];
  }
} 


$sql1 = "INSERT INTO bookings (name,phone,email,total_number,total_amount,check_in,check_out,hid,rid,uid)
VALUES ('$fullname','$phone','$email','$room_num','$totalprice','$checkin','$checkout','$hid','$rid','$user_id')";

if (mysqli_query($conn, $sql1)) {
  echo "New record created successfully";

  $sql2 = "SELECT *FROM  rooms where id ='$rid'";
  $result = mysqli_query($conn, $sql2);
  

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
     $current_room = $row['current_number'];
    }
     $current_room1 = $current_room - $room_num;
    $sql3 = "UPDATE rooms SET current_number='$current_room1' WHERE id='$rid'";

if (mysqli_query($conn, $sql3)) {
 
  $sql4 = "SELECT *FROM hotel where hotel_id = '$hid'";
  $result4 = mysqli_query($conn, $sql4);
  
  
    while($row = mysqli_fetch_assoc($result4)) {
     $hotel_total_rooms= $row['hotel_total_rooms'];
    }
    $hotel_total_rooms = $hotel_total_rooms - $room_num;
    
    $sql5 = "UPDATE hotel SET hotel_total_rooms ='$hotel_total_rooms' WHERE hotel_id='$hid'";

  if ($conn->query($sql5) === TRUE) {
   

    $to_email = $gmail;
    $subject = "BOOKED NOTIFICATION";
    $body = "IN"." ".$hotelnames."YOU GOT ROOM REQUEST ";
    $headers = "From: kingothapa123@gmail.com";
    
    if (mail($to_email, $subject, $body, $headers)) {
      $_SESSION['bookedroom'] = "Your Room is Successfully Booked!!";
      header('Location: http://localhost/hoteladda/Frontend/');
    } else {
        echo "Email sending failed...";
    }





  }





} else {
  echo "Error updating record: " . mysqli_error($conn);
}
    }
  else {
  echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
