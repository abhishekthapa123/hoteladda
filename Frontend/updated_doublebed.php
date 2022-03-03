<?php


include('connect.php');
session_start();
$double_bed_total = $_POST['double_bed_total'];
$double_bed_price = $_POST['double_bed_price'];

$hid =  $_POST['hid'];

$double_bed_facility = $_POST['double_bed_facility'];
$double_bed_facility1 = implode(",", $double_bed_facility);



$filename = $_FILES['double_bed_image']["name"];
$tempname = $_FILES['double_bed_image']["tmp_name"];
$folder = "images/" . $filename;
move_uploaded_file($tempname, $folder);

$sql = "UPDATE rooms SET price= '$double_bed_price', total_numbers = '$double_bed_total',current_number='$double_bed_total', facilites='$double_bed_facility1' ,image='$folder' WHERE hid= $hid AND roomname ='Double Bed'";

if (mysqli_query($conn, $sql)) {
   
    $_SESSION['roomupdate_msg'] = "Updated Successfully";
    header("Location: http://localhost/hoteladda/Frontend/updateRooms.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

