<?php



include('adminsidebar.php');

?>
<!-- End Left Sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
         
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                
              
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
      
     <!-- Start of single bed     -->

    <?php 
     include('connect.php');
     $hid = $_GET['id'];
     $sql2 = "SELECT *FROM rooms where roomname='Single Bed'and  hid ='$hid' ";
     $result2 = mysqli_query($conn, $sql2);
     if (mysqli_num_rows($result2) > 0) {
        

     }
     else
     {
      
  
    ?>



 <form method="POST" action="add_singlebed.php" enctype="multipart/form-data">
<div class="form-group">
    <input type="hidden" value= <?php echo $_GET['id'];?> name="hid">
<label for="exampleInputEmail1" style="color:tomato;font-size:large; ">Single Bed</label><br><br>
<div style="margin-left:30px">

    <label for="exampleInputEmail1">Total Room</label>
    <input type="number" name="single_bed_total" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <br>
    <label for="exampleInputEmail1"> Price</label>
    <input type="number" name="single_bed_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <br>
    <label for="exampleInputEmail1"> Image</label>
    <input type="file" name="single_bed_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <br>
    <label for="exampleInputEmail1"> Facilites</label>

    
<div class="form-check">
<input type="checkbox" value="AC" name="single_bed_facility[]" class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">AC</label>&nbsp;
<input type="checkbox" value="WIFI"name="single_bed_facility[]" class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">WIFI </label> &nbsp;
<input type="checkbox" value="Attached Bathroom"name="single_bed_facility[]"class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">Attacted Bathroom </label> &nbsp;
<input type="checkbox" value="TV"name="single_bed_facility[]"class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">TV </label>
</div>
</div>
</div><br>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php } ?>
<!-- End of single bed -->
<br><br><br>


<!-- Start of   Double Bed -->
<?php 
     include('connect.php');
     $hid = $_GET['id'];
     $sql3 = "SELECT *FROM rooms where roomname='Double Bed'and  hid ='$hid' ";
     $result3 = mysqli_query($conn, $sql3);
     if (mysqli_num_rows($result3) > 0) {
        

     }
     else
     {
      
  
    ?>
<form method="POST" action="add_doublebed.php" enctype="multipart/form-data">
<div class="form-group">
<input type="hidden" value= <?php echo $_GET['id'];?> name="hid">
<label for="exampleInputEmail1" style="color:tomato;font-size:large; ">Double Bed</label><br><br>
<div style="margin-left:30px">

    <label for="exampleInputEmail1">Total Room</label>
    <input type="number" name="double_bed_total" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <br>
    <label for="exampleInputEmail1"> Price</label>
    <input type="number" name="double_bed_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <br>
    <label for="exampleInputEmail1"> Image</label>
    <input type="file" name="double_bed_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <br>
    <label for="exampleInputEmail1"> Facilites</label>

    
<div class="form-check">
<input type="checkbox" value="AC" name="double_bed_facility[]" class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">AC</label>&nbsp;
<input type="checkbox" value="WIFI"name="double_bed_facility[]" class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">WIFI </label> &nbsp;
<input type="checkbox" value="Attached Bathroom"name="double_bed_facility[]"class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">Attacted Bathroom </label>&nbsp;
<input type="checkbox" value="TV"name="single_bed_facility[]"class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">TV </label>
</div>
</div>

</div>


<br>

<button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php  } ?>
                </div>

                
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
   
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
</body>

</html>


