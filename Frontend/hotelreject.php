<?php
include('connect.php');
$id = $_GET['id'];
$hname = $_GET['hname'];
$email = $_GET['email'];


$to_email = $email;
$subject = "HOTEL ADDA";
$body = "SORRY YOUR HOTEL"."&nbsp;".$hname."&nbsp;"."HAS BEEN REJECTED ";
$headers = "From: kingothapa123@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {


  
$sql = "UPDATE hotel SET flag='2' WHERE hotel_id='$id'";

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