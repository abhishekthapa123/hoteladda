<?php 

  session_start();
  if(!isset($_SESSION['email'])){
    header("Location: http://localhost/hoteladda/Frontend/loginform.php");
  }




?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="bookroom_style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function()
        {
            var dtToday = new Date();
            var month = dtToday.getMonth()+1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
            {
                month = '0'+month.toString();

            }
            if(day < 10)
            {
                day = '0'+day.toString();

            }
            var days = parseInt(day);
            var days2 = parseInt(day)+2;
            var days3 = parseInt(day)+3;
            var minDate = year + '-' + month +'-' + days;
            var minDate1 = year + '-' + month +'-' + days2;
            var maxDate = year + '-' + month +'-' + days3;
            
            $("#inputCheckInn").attr('min',minDate);
            // $("#inputCheckInn").attr('max',minDate1);
             $("#inputCheckOutt").attr('min',minDate);
            // $("#inputCheckOutt").attr('max',minDate1);


        });
</script>




<script>
$(document).bind("contextmenu",function(e) {
 e.preventDefault();
});
  function clicked()
  {
    
 
    
   var price1 = document.getElementsByClassName('room');
  if(price1[0].checked)
  {
    var s_date =document.getElementById("inputCheckInn").value;
    var e_date = document.getElementById("inputCheckOutt").value;
    var start_date = s_date.split('/').reverse().join(''); 
    var end_date =e_date.split('/').reverse().join(''); 
    var diff =  Math.floor(( Date.parse(end_date) - Date.parse(start_date) ) / 86400000);
  
    price = price1[0].value;
    price1 = parseInt(price);
    var total_rooms = parseInt(document.getElementById("rooms_num").value);
    if(diff!=0)
    {
    total_price = price1 * total_rooms*diff;
    }
    else{
      total_price = price1 * total_rooms*1;
    }
    // document.getElementById('totalPrice').value = total_price;
    if(s_date!="" && e_date!=""){

    document.getElementById('totalPrice').value = total_price;
    }
    
  }
  if(price1[1].checked)
  {
    var s_date =document.getElementById("inputCheckInn").value;
    var e_date = document.getElementById("inputCheckOutt").value;
    var start_date = s_date.split('/').reverse().join(''); 
  var end_date =e_date.split('/').reverse().join(''); 
  var diff =  Math.floor(( Date.parse(end_date) - Date.parse(start_date) ) / 86400000);
    price = price1[1].value;
    price1 = parseInt(price);
    var total_rooms = parseInt(document.getElementById("rooms_num").value);
 
    // document.getElementById('totalPrice').value = total_price;
    if(diff!=0)
    {
    total_price = price1 * total_rooms*diff;
    }
    else{
      total_price = price1 * total_rooms*1;
    }
    if(s_date!="" && e_date!="")
    {
    document.getElementById('totalPrice').value = total_price;
    }
  }
  


  }
  
</script>


</head>
  <body>
 
  <form action="bookedroom.php" action="GET">
    <div class="wrapper"  style="background-color:burlywood;height: 1000px;">
    <?php  
      include('connect.php');
      $id = $_GET['id'];
      $sql = "SELECT * FROM rooms where hid= '$id'";
    $result = mysqli_query($conn, $sql);


    while($row = mysqli_fetch_assoc($result)) {
   
      ?>
   
      <div class="container" style="height: 450px;">
        <input type="radio" class="room" value="<?php echo $row['price'];?>,<?php echo $row['id'];   ?>" name = "room"onclick="clicked()" required/>
        <input type="hidden" name="hid" value="<?php echo $id; ?>">
   
        <label for="dessert-1">
          <img src= "<?php echo $row['image']; ?>"/>
        </label>
        <h3 style="text-align: center; color:#196F3D; font-family: sans-serif; font-weight: bold;" ><?php echo $row['roomname'];?></h3>
        <div style="margin-top:300px; margin-left: 350px;">
        <h6 style="color:#154360;font-weight: bold;"> RS &nbsp; <?php echo $row['price']; ?></h6>
        </div>
        <div style="margin-top:-1px; margin-left: 10px;">
        <h6 style="margin-top:-20px; color:#D35400;"> Remaining  Rooms: <?php echo $row['current_number']; ?></h6>
        </div>
        <div style="margin-bottom:20px; margin-left: 10px;">
        <h6 style="margin-top:-1px; color:#0B5345;">Facilites: <?php echo $row['facilites']; ?></h6>
        </div>
      </div>
     <?php  } ?>
      
     <div>
  <div style="background-color:white;width: 350px; padding: 20px; border-radius:12px;">
  <h6 style="color:#1A5276 ;"> Please Fill Up the Information Below </h6> <br> 
     <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter full name">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone Number</label>
    <input type="number"name="phone" class="form-control" id="exampleInputPassword1" placeholder="Enter Phone Number" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">CheckIn</label>
    <input type="date" name="checkin" value=""class="form-control" id="inputCheckInn" onchange="clicked()" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">CheckOut</label>
    <input type="date" name="checkout" value="" class="form-control" id="inputCheckOutt" onchange="clicked()" required>
  </div>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Number Of Rooms</label>
  </div>
  <select class="custom-select" name="rooms_num" id="rooms_num" onchange="clicked()" required>
    <option value="1" selected>1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select>
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Total Price</label>
    <input type="text" name="totalprice"value="" class="form-control" id="totalPrice" readonly>

  <!-- <input type="button" name="totalprice" value="RS. 0" id="totalPrice1" style="background-color: transparent; border:none;color:orangered;" required> -->
      <!-- <button name="totalprice1" value="200">dd</button> -->
</div>
  
  <button type="submit" class="btn btn-success">Submit</button>



     </div>
     
    </div>
    </div>
    
   
    </form>
  
    
  </body>
</html>