<?php


include('connect.php');
session_start();
$single_bed_total = $_POST['single_bed_total'];
$single_bed_price = $_POST['single_bed_price'];

$hid =  $_POST['hid'];

$single_bed_facility = $_POST['single_bed_facility'];
$single_bed_facility1 = implode(",", $single_bed_facility);



$filename = $_FILES['single_bed_image']["name"];
$tempname = $_FILES['single_bed_image']["tmp_name"];
$folder = "images/" . $filename;
move_uploaded_file($tempname, $folder);

$sql = "UPDATE rooms SET price= '$single_bed_price', total_numbers = '$single_bed_total',current_number='$single_bed_total', facilites='$single_bed_facility1' ,image='$folder' WHERE hid= $hid AND roomname ='Single Bed'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['roomupdate_msg'] = "Updated Successfully";
    header("Location: http://localhost/hoteladda/Frontend/updateRooms.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

