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

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
  

</head>
<body>
    <br>
    <h4 style="text-align: center; color :green;"></h4>
    <div style="margin:200px; " >
<table class="table table-hover">
  <thead>
    <tr style="color:orange">
      <th scope="col">Hotel Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Rate</th>

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
  where uid ='$userid' and rate_flag='0' ";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)) {
 
  ?>






    <tr style="color:green; font-weight: bold;">

    <td> <?php  echo $row['hotelname'];  ?></td>
    <td> <?php  echo $row['phone'];  ?></td>
    <td> <?php  echo $row['location'];  ?></td>
    <td>

    <div class="container">
    <div class="row">

<form action="add_rate.php" method="post">
    <div>
        <input type="hidden" name="hid" value="<?php echo $row['hid']; ?>">
        <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>">
    </div>

         <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>

    <span class='result'>0</span>
    <input type="hidden" name="rating" value="">

    </div>

    <div><a><button class="btn btn-primary">Submit</button></a></div>

</form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); 
        });
    });

</script>






    </td>




    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
</body>
</html>