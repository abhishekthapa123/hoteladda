<?php

include('connect.php');
$double_bed_total = $_POST['double_bed_total'];
$double_bed_price =$_POST['double_bed_price'];

$hid =  $_POST['hid'];

$double_bed_facility= $_POST['double_bed_facility'];
$double_bed_facility1 = implode(",",$double_bed_facility);


$filename = $_FILES['double_bed_image']["name"];
$tempname = $_FILES['double_bed_image']["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($tempname,$folder);


$sql = "INSERT INTO rooms (roomname,price, total_numbers,current_number, image,facilites,hid)
VALUES ('Double Bed','$double_bed_price','$double_bed_total','$double_bed_total','$folder','$double_bed_facility1',$hid)";

if (mysqli_query($conn, $sql)) {

  $sql1 = "SELECT *FROM hotel where hotel_id = '$hid'";
  $result1 = mysqli_query($conn, $sql1);
  
  
    while($row = mysqli_fetch_assoc($result1)) {
     $hotel_total_rooms= $row['hotel_total_rooms'];
    }
    $hotel_total_rooms = $hotel_total_rooms + $double_bed_total;
    
    $sql2 = "UPDATE hotel SET hotel_total_rooms ='$hotel_total_rooms' WHERE hotel_id='$hid'";

  if ($conn->query($sql2) === TRUE) {
    $id= $hid;
    header('Location: http://localhost/hoteladda/Frontend/addroomsform.php?id='.$id);
  }
  else {
    echo "Error updating record: " . $conn->error;
    }
       

}
  else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




?>