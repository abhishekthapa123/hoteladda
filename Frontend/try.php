

<?php
include('connect.php');
$sql = "SELECT * FROM bookings b inner join  hotel h on b.hid = h. hotel_id where remainder_flag='0' and check_in = CURDATE()";
$result = mysqli_query($conn, $sql);
$subject = "HI  THIS IS REMINDER FOR YOUR TODAY BOOKING IN HOTEL";

$headers = "From: kingothapa123@gmail.com";
while ($row = mysqli_fetch_assoc($result)) {
    if (mail($row['email'], $subject, $row['hotelname'], $headers)) {

        $bid = $row['bid'];
        $sql = "UPDATE bookings  SET remainder_flag='1' WHERE bid=$bid";

        if (mysqli_query($conn, $sql)) {
           
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Email sending failed...";
    }
}
