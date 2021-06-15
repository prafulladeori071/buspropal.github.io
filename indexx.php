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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>


<ul class="nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>

   
    <li class="nav-link list-inline-item">
      <a href="#" data-toggle="modal" data-target="#login-modal" >Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tologin/index.php">Admin-login</a>
    </li>
    </ul>

    
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



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
