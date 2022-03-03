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
                            <h2 style="color:seagreen; font-weight: bold;"> ADD HOTEL</h2>
                            <form method="POST" action="addhotel.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Hotelname</label>
    <input type="text" name="hotelname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Hotel Pan Number</label>
    <input type="number" name="pan_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Owner name</label>
    <input type="text" name="ownername" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Location</label>
    <input type="text" name="location" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone number</label>
    <input type="number" name="phone" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hotel Image</label>
    <input type="file" name="image" class="form-control" id="exampleInputPassword1" accept="image/*" required>
  </div>
  <div class="form-check">
    <input type="checkbox" value="Parking" name="services[]" class="form-check-input" id="exampleCheck1" >
    <label class="form-check-label" for="exampleCheck1">Parking</label>&nbsp;
    <input type="checkbox" value="Security Guard"name="services[]" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Security Guard </label> &nbsp;
    <input type="checkbox" value="Hotel Taxi"name="services[]"class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Hotel Taxi </label>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Latitude</label>
    <input type="text" name="lat" class="form-control" id="lat" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Longitude</label>
    <input type="text" name="lng" class="form-control" id="long" required>
  </div>
  <button onclick="getlocation()">Get Location</button>  
  <div id="location"></div>  
  <br>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
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
    <script>  
   
    var y = document.getElementById("lat");
    var z= document.getElementById("long");
    function getlocation() {  
        if(navigator.geolocation){  
            navigator.geolocation.getCurrentPosition(showPosition)  
          }  
        else  
        {  
             alert("Sorry! your browser is not supporting")  
         } }  
       
     function showPosition(position){  
      //  var x = "Your current location is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " +    position.coords.longitude + ")";  
                // document.getElementById("location").innerHTML = x;  
      var y =  position.coords.latitude ;
      var z = position.coords.longitude;
      document.getElementById("lat").value = y;
      document.getElementById("long").value = z;

     }  
</script>  
</body>

</html>
