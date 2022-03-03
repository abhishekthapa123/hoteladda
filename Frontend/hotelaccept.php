<?php
include('connect.php');
$id = $_GET['id'];
$email = $_GET['email'];
$hname = $_GET['hname'];



$to_email = $email;
$subject = "HOTEL ADDA ";
$body = "YOUR HOTEL"."&nbsp;".$hname."&nbsp;"."HAS BEEN ACCEPTED BEING YOUR JOURNEY";
$headers = "From: kingothapa123@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    
  $sql = "UPDATE hotel SET flag='1' WHERE hotel_id='$id'";

  if (mysqli_query($conn, $sql)) {
      header("Location:http://localhost/hoteladda/Frontend/adda_admin.php");
  }
   else {
    echo "Error updating record: " . mysqli_error($conn);
  }

} else {
    echo "Email sending failed...";
}




?>