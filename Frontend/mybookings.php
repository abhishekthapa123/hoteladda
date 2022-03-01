<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
    <br>
    <h4 style="text-align: center; color :green;">MY BOOKINGS</h4>
    <div style="margin:200px; background-color:#2850C3;" >
<table class="table table-hover">
  <thead>
    <tr style="color:white">
      <th scope="col">Hotel Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Rooms</th>
      <th scope="col">Room Type</th>
      <th scope="col">CheckIn</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     
  <?php
  
  
  include('connect.php');
  session_start();
  $email = $_SESSION['email'];
  $todayDate =  date("Y-m-d");
  $userid;
  $sql = "SELECT * FROM user where email ='$email'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)) {
    $userid = $row['id'];
  }
  $sql = "SELECT * FROM bookings b INNER JOIN hotel h 
  on b.hid = h.hotel_id 
  INNER JOIN rooms r 
  on b.rid = r.id
  where uid ='$userid' and check_in >= '$todayDate' ";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)) {
 
  ?>






    <tr style="color:white;">

    <td> <?php  echo $row['hotelname'];  ?></td>
    <td> <?php  echo $row['phone'];  ?></td>
    <td> <?php  echo $row['location'];  ?></td>
    <td> <?php  echo $row['total_number'];  ?></td>
    <td> <?php  echo $row['roomname'];  ?></td>
    <td> <?php  echo $row['check_in'];  ?></td>
    <td> <a href="cancelBooking.php?id=<?php echo $row['bid'];  ?>"><button class="btn btn-danger">Cancel</button></a>
    <a href="cancelBooking.php?id=<?php echo $row['bid'];  ?>"><button class="btn btn-success">Set Reminder</button></a>
    </td>
  
   

  </tr>
  <?php } ?>
  </tbody>
</table>
</div>
</body>
</html>