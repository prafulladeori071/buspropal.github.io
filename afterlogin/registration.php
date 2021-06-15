<?php
$error = NULL;
include ('include/connection.php');
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $contact_no = $_POST['contact_no'];
  $address = $_POST['address'];
  $pin = $_POST['pin'];
  $password = $_POST['password'];
 
      $name = $mysqli->real_escape_string(strtoupper($name));
      $lname = $mysqli->real_escape_string(strtoupper($lname));
      $email = $mysqli->real_escape_string($email);
      $contact_no = $mysqli->real_escape_string($contact_no);
      $address = $mysqli->real_escape_string(strtoupper($address));
      $password  = $mysqli->real_escape_string($password);
      $pin = $mysqli->real_escape_string($pin);


      $reg_query = $mysqli->query("insert into registration(name, lname, email, contact_no, address, password, pin) values('$name', '$lname', '$email', '$contact_no', '$address', '$password', '$pin')");
      if($reg_query){
        header("location:index.php");
      }else{
        $error = "Somthing went Wrong Please Try Again After Sometime";
      }
  }


?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
</head>
<body>

    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="box">
                <h1>New account</h1>
                <hr>
                <form action=" " method="post">
                  <div class="form-group">
                    <label for="name">First name</label>
                    <input name="name" type="text" class="form-control" required="required">
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
    </div>


</body>
</html>