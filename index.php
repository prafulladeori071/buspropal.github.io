<!DOCTYPE html>


<head>
	
<meta charset="utf-8">
	
<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Online Bus Ticket Reservation System By Prafulla Deori</title>
	
	
<!-- [ FONT-AWESOME ICON ] 
        
=========================================================================================================================-->
	
<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">

	
<!-- [ PLUGIN STYLESHEET ]
        
=========================================================================================================================-->
	
<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
	
<link rel="stylesheet" type="text/css" href="css/animate.css">
	
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        
<link rel="stylesheet" type="text/css" href="css/owl.theme.css">
	
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
	
<!-- [ Boot STYLESHEET ]
        
=========================================================================================================================-->
	
<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">
	
<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">
       
<!-- [ DEFAULT STYLESHEET ] 
        
=========================================================================================================================-->
	
<link rel="stylesheet" type="text/css" href="css/style.css">
        
<link rel="stylesheet" type="text/css" href="css/responsive.css">
	
<link rel="stylesheet" type="text/css" href="css/color/rose.css">
        



</head>
<body >











<?php
$error = NULL;
include ('connection.php');
// login php code
if(isset($_POST['login'])){
  //connect to database
  //get form data
  $email = $mysqli->real_escape_string($_POST['email']);
  $password = $mysqli->real_escape_string($_POST['password']); 
  // query the database
  $resultSet = $mysqli->query("select * from registration where email = '$email' and password = '$password' limit 1");
  if($resultSet->num_rows == 1){
      header("location:checkseat.php");
    }else{
      $error = '<div class="font-italic text-danger">something went wrong</div>';
    }
}
// login php code end

// registration php code start
if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $contact_no = $_POST['contact_no'];
  $address = $_POST['address'];
  $pin = $_POST['pin'];
  $password = $_POST['password'];

      $reg_query = $mysqli->query("insert into registration(fname, lname, email, contact_no, address, password, pin) values('$fname', '$lname', '$email', '$contact_no', '$address', '$password', '$pin')");
      if($reg_query){
        header("location:index.php");
      }else{
        $error = "Somthing went Wrong Please Try Again After Sometime";
      }
  }
// registration php code end

?>


<!-- <ul class="nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>

   
    <li class="nav-link list-inline-item">
      <a href="#" data-toggle="modal" data-target="#login-modal" >Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tologin/index.php">Admin-login</a>
    </li>
    </ul> -->

    
<!-- login modal pro start-->
<div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action=" " method="post">
                  <div class="form-group">
                     <input type="email" placeholder="email" name="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" placeholder="password" class="form-control">
                  </div>
                  <p class="text-center">
                    <button class="btn btn-primary" type="submit" value="login" name="login">Log in</button>
                  </p>
                </form>
                <center>
                    <?php
                      echo $error;
                    ?>
                </center>
                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="#" data-toggle="modal" data-target="#registration-modal"><strong>Register now</strong></a>! It is easy and done in 1 minute!</p>
              </div>
            </div>
          </div>
        </div>
<!-- login modal john end -->
<!-- registrtion modal john -->
<div id="registration-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <div class="box">
                <h1>New account</h1>
                <hr>
                <form action=" " method="post">
                  <div class="form-group">
                    <label for="fname">First name</label>
                    <input name="fname" type="text" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label for="lname">Last name</label>
                    <input name="lname" type="text" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label for="contact_no">Contact No.</label>
                    <input name="contact_no" type="number" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input name="address" type="text-area" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label for="pin">Pin no.</label>
                    <input name="pin" type="text-area" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" required="required">
                  </div>
                  <div class="text-center">
                    <button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button>
                  </div>
                </form>
                <center>
                    <?php
                      echo $error;
                    ?>
                </center>
              </div>
              </div>
            </div>
          </div>
        </div>
<!-- end of registration john -->













<!-- [ LOADERs ]

================================================================================================================================-->
	
    <div class="preloader">
    
<div class="loader theme_background_color">
        
<span></span>
      
    
</div>
</div>
<!-- [ /PRELOADER ]

=============================================================================================================================-->

<!-- [WRAPPER ]

=============================================================================================================================-->

<div class="wrapper">
  
<!-- [NAV]
 
============================================================================================================================-->    
   
<!-- Navigation
    ==========================================-->
    
<nav  class=" nim-menu navbar navbar-default navbar-fixed-top">
      
<div class="container">
        
<!-- Brand and toggle get grouped for better mobile display -->
        
<div class="navbar-header">
          
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            
<span class="sr-only">Toggle navigation</span>
            
<span class="icon-bar"></span>
            
<span class="icon-bar"></span>
            
<span class="icon-bar"></span>
          
</button>
            
<a class="navbar-brand" href="index.html">Online<span class="themecolor"> T</span>ickets</a>
        
</div>

        
<!-- Collect the nav links, forms, and other content for toggling -->
        
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
<ul class="nav navbar-nav navbar-right">
            
<li><a href="#home" class="page-scroll"><h3>Home</h3></a></li>
            
<li><a href="about.php" class="page-scroll"><h3>About</h3></a></li>
                                   
<li><a href="#one" class="page-scroll"><h3>Inspiration</h3></a></li>
                                 
<li><a href="#three" class="page-scroll"><h3>Services</h3></a></li>
            
<li><a href="#four" class="page-scroll"><h3>Contact</h3></a></li>

<li><a href="tologin/index.php" class="page-scroll"><h3>Admin-login</h3></a></li>
<li class="nav-link list-inline-item">
      <a href="#" data-toggle="modal" data-target="#login-modal" >User-Login</a>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link" href="tologin/index.php">Admin-login</a>
    </li> -->


<!-- <li>
<p class="text-center">
      <button class="btn btn-primary" type="submit" value="login" name="login">Log in</button>
    </p>
 </li>  -->


</ul>
        
</div>
<!-- /.navbar-collapse -->
      
</div><!-- /.container-fluid -->
    
</nav>


   
<!-- [/NAV]
 
============================================================================================================================--> 
    
   
<!-- [/MAIN-HEADING]
 
============================================================================================================================--> 
   
<section class="main-heading" id="home">
       
<div class="overlay">
           
<div class="container">
               
<div class="row">
                   
<div class="main-heading-content col-md-12 col-sm-12 text-center">
        
<h1 class="main-heading-title"><span class="main-element themecolor" data-elements=" Online Bus Ticket, Online Bus Ticket, Online Bus Ticket"></span></h1>
 
<h1 class="main-heading-title"><span class="main-element themecolor" data-elements=" Reservation System, Reservation System, Reservation System"></span></h1>
       
<p class="main-heading-text">WELCOME TO,<br/>ONLINE BUS TICKET RESERVATION SYSTEM</p>
        
<div class="btn-bar">
          
<a href="create.php" class="btn btn-custom theme_background_color">Reserve Now</a>
                 
</div>
      
</div>
               
</div>
           
</div>
       
</div>  
      
   
</section>
 
<section class="main-heading" id="home">
       
<div class="overlay">
           
<div class="container">
               
<div class="row">
                   
<div class="main-heading-content col-md-12 col-sm-12 text-center">
        
<h1 class="main-heading-title">We are Creative</h1>
        
<p class="main-heading-text">This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
        
<div class="btn-bar">
          
<a href="#" class="btn btn-custom theme_background_color">Ge Started</a>
          
<a href="#" class="btn btn-custom-outline">Contact Us</a>
        
</div>
      
</div>
               
</div>
           
</div>
       
</div>  
      
   
</section>
    
 
<!-- [/MAIN-HEADING]
 
============================================================================================================================-->
 
 
 
<!-- [ABOUT US]
 
============================================================================================================================-->
 
<section class="aboutus white-background black" id="one">
     
<div class="container">
         
<div class="row">
             
<div class="col-md-12 text-center black">
                 
<h3 class="title">ABOUT <span class="themecolor">US</span></h3>
            
<p class="a-slog">This is my Bus ticket Reservation project, Here user can book their tickets online.</div>
         
</div>
         
<div class="gap">
             
         
</div>
         
         
<div class="row about-box">
          
<div class="col-sm-4 text-center">
            
<div class="margin-bottom">
              
<i class="fa fa-newspaper-o"></i>
              
<h4>POWER OF FLEXIBILITY</h4>
              
<p class="black">This is my Bus ticket Reservation project, Here user can book their tickets online..</p>
            
</div> <!-- / margin -->
          
</div> <!-- /col -->
          
<div class="col-sm-4 about-line text-center">
            
<div class="margin-bottom">
              
<i class="fa fa-diamond"></i>
              
<h4>FULLY RESPONSIVE</h4>
              
<p class="black">This ticketing system is fully responsive This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
            
</div> <!-- / margin -->
          
</div><!-- /col -->
          
<div class="col-sm-4 text-center">
            
<div class="margin-bottom">
              
<i class="fa fa-area-chart"></i>
              
<h4>GREAT WEB IDEAS</h4>
              
<p class="black">This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
            
</div> <!-- / margin -->
          
</div><!-- /col -->
        
</div> <!-- /row -->
         
         
         
         
     
</div>
 </section>
 
 
 
<!-- [/ABOUTUS]
 
 
============================================================================================================================-->
 
 
 
 
 
<!-- [INSPIRATION]
 
============================================================================================================================-->
 
<section class="inspiration" id="four">
     
<div class="overlay">
         
<div class="container">
             
<div class="row">
                
 <article class="col-md-12 text-center">
           
 <div class="intermediate-container">
             
 <div class="subheading">
                 
 <h4>Are You Ready To <span class="themecolor">Enjoy?</span></h4>
           
   </div>
             
 <div class="heading">
              
  <h2>hey! Don't worry you can book your bus ticket here</h2>
          
    </div>
              
<div class="">
              
  <a class="btn btn-custom-outline" href="#"><span>get started</span></a>
        
      </div>
        
    </div>
       
   </article>
       
      </div>
    
    </div>
    
 </div>
 
</section>
 
 
<!-- [/INSPIRATION]
 

============================================================================================================================-->
 
 
<!-- [/SERVICES]
 
============================================================================================================================-->
 
 
 
<section class="services white-background black" id="seven">
     
 <div class="container">
        
<div class="row text-center">
          
<div class="col-md-12">
              
<h3 class="title">We Are <span class="themecolor">Good In</span></h3>
            
<p class="a-slog">This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
          
</div> <!-- /col -->
        
</div> <!-- /row -->
        
<div class="gap"></div>

        
<div class="row">
          
<div class="col-sm-4">
            
<div class="nim-service margin-bottom">
              
<i class="fa fa-diamond"></i>
              
<div class="nim-service-detail">
                
<h4>Strategy Solutions</h4>
                
<p>This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
   
           </div> <!-- /nim-service-detail -->
            
</div> <!-- /nim-service margin-bottom -->
          
</div> <!-- /col -->

          
<div class="col-sm-4">
            
<div class="nim-service margin-bottom">
             
 <i class="fa fa-tablet"></i>
             
 <div class="nim-service-detail">
              
  <h4>Digital Design</h4>
              
  <p>This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
 
             </div> <!-- /nim-service-detail -->
            
</div> <!-- /nim-service margin-bottom -->
          
</div> <!-- /col -->

          
<div class="col-sm-4">
            
<div class="nim-service margin-bottom">
              
<i class="fa fa-magic"></i>
              
<div class="nim-service-detail">
                
<h4>SEO</h4>
                
<p>This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
 
             </div> <!-- /nim-service-detail -->
            
</div> <!-- /nim-service margin-bottom -->
         
 </div> <!-- /col -->       
        
</div> <!-- end row -->

        
<div class="row">
          
<div class="col-sm-4">
            
<div class="nim-service margin-bottom">
             
 <i class="fa fa-rocket"></i>
             
 <div class="nim-service-detail">
               
 <h4>Graphic Design</h4>
                
<p>This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
          
    </div> <!-- /nim-service-detail -->
            
</div> <!-- /nim-service margin-bottom -->
         
 </div> <!-- /col -->

          
<div class="col-sm-4">
           
 <div class="nim-service margin-bottom">
              
<i class="fa fa-map-marker"></i>
              
<div class="nim-service-detail">
                
<h4>Analystics</h4>
                
<p>This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
             
 </div> <!-- /nim-service-detail -->
            
</div> <!-- /nim-service margin-bottom -->
          
</div> <!-- /col -->

          
<div class="col-sm-4">
            
<div class="nim-service margin-bottom">
             
 <i class="fa fa-paypal"></i>
              
<div class="nim-service-detail">
               
 <h4>Dedicated Support</h4>
                
<p>This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
              
</div> <!-- /nim-service-detail -->
            
</div> <!-- /nim-service margin-bottom -->
          
</div> <!-- /col -->         
        
</div> <!-- end row -->

        
<div class="row">
          
<div class="col-sm-4">
            
<div class="nim-service margin-bottom">
             
 <i class="fa fa-bar-chart-o"></i>
              
<div class="nim-service-detail">
                
<h4>Truly Multipurpose</h4>
               
 <p>This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
             
 </div> <!-- /nim-service-detail -->
           
 </div> <!-- /nim-service margin-bottom -->
          
</div> <!-- /col -->

          
<div class="col-sm-4">
            
<div class="nim-service margin-bottom">
              
<i class="fa fa-delicious"></i>
              
<div class="nim-service-detail">
               
 <h4>Unlimited Colors</h4>
                
<p>We put a lot of effort in design, as it’s the most important ingredient of successful website.</p>
              
</div> <!-- /nim-service-detail -->
            
</div> <!-- /nim-service margin-bottom -->
         
 </div> <!-- /col -->

          
<div class="col-sm-4">
           
 <div class="nim-service margin-bottom">
              
<i class="fa fa-pencil-square"></i>
             
 <div class="nim-service-detail">
                
<h4>Easy to customize</h4>
                
<p>This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
             
 </div> <!-- /nim-service-detail -->
            
</div> <!-- /nim-service margin-bottom -->
          
</div> <!-- /col -->                      
       
 </div> <!-- end row -->

      
</div>  <!-- container -->
    
</section>
 
 
 
<!-- [/SERVICES]
 
============================================================================================================================-->
 
 
 
<!-- [CONTACT]
 
============================================================================================================================-->
 
<!--sub-form-->
<section class="sub-form text-center" id="eight">
  
<div class="container">
    <div class="col-md-12">
        
<h3 class="title">Subscribe to our <span class="themecolor"> News letter</span></h3>
            
<p class="lead">This is my Bus ticket Reservation project, Here user can book their tickets online.</p>
    
</div> 
    
<div class="row">
        
<div class="col-md-3 col-sm-3"></div>
      
<div class="col-md-6 center-block col-sm-6 ">
        
<form id="mc-form">
          
<div class="input-group">
            
<input type="email" class="form-control" placeholder="Email Address" required id="mc-email">
           
<span class="input-group-btn">
            
<button type="submit" class="btn btn-default">SUBSCRIBE <i class="fa fa-envelope"></i> </button>
            
</span> </div>
          
<label for="mc-email" id="mc-notification"></label>
       
 </form>
      
</div>
   
 </div>
  
</div>

</section>

<!--sub-form end--> 


 
 
<!-- [/CONTACT]
 
============================================================================================================================-->
 
 
 
<!-- [FOOTER]
 
============================================================================================================================-->
 

<footer class="site-footer section-spacing text-center " id="eight">
    
  
<div class="container">
    
<div class="row">
      
<div class="col-md-4">
        
<p class="footer-links"><a href="#">Terms of Use</a> <a href="#">Privacy Policy</a></p>
      
</div>
      
<div class="col-md-4"> <small>&copy; 2021, Brought To You By Prafulla Deori  </small></div>
      
<div class="col-md-4"> 
        
<!--social-->
        
        
<ul class="social">
          
<li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter "></i></a></li>
          
<li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
          
<li><a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
        
</ul>
        
        
<!--social end--> 
        
      
</div>
    
</div>
  
</div>

</footer>

 
 
 
<!-- [/FOOTER]
 
============================================================================================================================-->
 
 
 

</div>
 

<!-- [ /WRAPPER ]

=============================================================================================================================-->

	
<!-- [ DEFAULT SCRIPT ] -->
	
<script src="library/modernizr.custom.97074.js"></script>
	
<script src="library/jquery-1.11.3.min.js"></script>
        
<script src="library/bootstrap/js/bootstrap.js"></script>
	
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>	
	
<!-- [ PLUGIN SCRIPT ] -->
        
<script src="library/vegas/vegas.min.js"></script>
	
<script src="js/plugins.js"></script>
        
<!-- [ TYPING SCRIPT ] -->
         
<script src="js/typed.js"></script>
         
<!-- [ COUNT SCRIPT ] -->
         
<script src="js/fappear.js"></script>
       
<script src="js/jquery.countTo.js"></script>
	
<!-- [ SLIDER SCRIPT ] -->  
        
<script src="js/owl.carousel.js"></script>
         
<script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        
<script type="text/javascript" src="js/SmoothScroll.js"></script>
        
        
<!-- [ COMMON SCRIPT ] -->
	<script src="js/common.js"></script>



  
</body>


</html>