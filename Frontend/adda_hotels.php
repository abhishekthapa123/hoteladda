<?php


include('adda_adminsidebar.php');

?>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title" style="color:tomato;"> होटल अडृा Admin</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title"> Hotels Request</h3>

                    <?php

                    if (isset($_SESSION['addadelete_hotels'])) {

                    ?>

                        <script>
                            swal({
                                title: "<?php  echo $_SESSION['addadelete_hotels'];?>",
                                
                                icon: "success",
                            });
                        </script>


                    <?php
                     unset($_SESSION['addadelete_hotels']);
                     }
                    ?>


                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>Hotel Name</th>
                                    <th>Location</th>
                                    <th>Image</th>
                                    <th>Contact</th>
                                    <th>Owner Name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('connect.php');
                                $sql = "SELECT * FROM hotel where flag='1'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                    <tr>
                                        <td> <?php echo $row['hotelname'] ?></td>
                                        <td> <?php echo $row['location'] ?></td>
                                        <td><img src=<?php echo $row['image'];  ?> height="200px"></td>
                                        <td> <?php echo $row['phone'] ?></td>
                                        <td> <?php echo $row['ownername'] ?></td>
                                        <td>

                                            <a href="hotelremove.php?id=<?php echo $row['hotel_id']; ?>"> <button type="button" class="btn btn-danger">Remove</button> </a>

                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
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