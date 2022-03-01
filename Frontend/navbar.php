<div class="tm-main-content" id="top">
         
                <!-- Top Navbar -->
                <div class="container">
                    <div class="row">
                        
                        <nav class="navbar navbar-expand-lg narbar-light">
                            <a class="navbar-brand mr-auto" href="#">
                                <img src="img/logo.png" alt="Site logo">
                                <span style="color:#2E86C1">होटल अडृा</span>
                            </a>
                            <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse tm-bg-white">
                                <ul class="navbar-nav ml-auto">
                                  <li class="nav-item">
                              
                                    <a class="nav-link" href="index.php">Home </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="propertyloginform.php">List your Property </a>
                                  </li>
                                  <li class="nav-item">
                                   <?php
                                 
                                    if(!isset($_SESSION["email"]))
                                    {
                                   ?>
                                    <a class="nav-link" href="loginform.php">
                                    Login/Signup
                                    </a>
                                    <?php }
                                    else
                                    {
                                    
                                    ?>
                                     <a class="nav-link" href="logout.php">
                                     logout
                                    </a>
                                   
                                    <?php } ?>

                                    
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="adda_admin_login.php">Hotel Adda </a>
                                  </li>
                                  
                                    <?php 
                                    if(isset($_SESSION['email']))
                                  {?>
                                    <li class="nav-item dropdown">
                                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <?php echo $_SESSION['email']; ?>
                                     </a>   
                                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="mybookings.php" style="color:green;">My Bookings</a>
                                      <a class="dropdown-item" href="myratings.php" style="color:orange;">Hotel Ratings</a>
                                      </div>
                                      <?php } ?>
                                    </li>
                                </ul>
                            </div>                            
                        </nav>            
                    </div>
                </div>
            </div>
            
   