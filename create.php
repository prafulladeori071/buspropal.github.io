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
	
    <li class="nav-item">
			<a class="nav-link" href="about.php">About-us</a>
		</li>
    <li class="nav-item">
			<a class="nav-link" href="map/map.php">Maps</a>
		</li>
    <li class="nav-item">
			<a class="nav-link" href="create.php">Create-ticket</a>
		</li>
    <li class="nav-item">
			<a class="nav-link" href="seatview.php">View-available-Ticket</a>
		</li>
		</ul>
    
<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
// Output message variable
$msg = '';
// Check if POST data exists (user submitted the form)
if (isset($_POST['title'], $_POST['fl'], $_POST['ll'], $_POST['busname'], $_POST['seatno'], $_POST['payment'], $_POST['paymentid'], $_POST['email'], $_POST['msg'], $_POST['datee'])) {
    // Validation checks... make sure the POST data is not empty
    if (empty($_POST['title']) || empty($_POST['fl']) || empty($_POST['ll']) || empty($_POST['busname']) || empty($_POST['seatno']) || empty($_POST['payment']) || empty($_POST['paymentid']) || empty($_POST['email']) || empty($_POST['msg']) || empty($_POST['datee'])) {
        $msg = 'Please complete the form!';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $msg = 'Please provide a valid email address!';
    } else {
        // Insert new record into the tickets table
        $stmt = $pdo->prepare('INSERT INTO tickets (title, fl, ll, busname, seatno, payment, paymentid, email, msg, datee) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([ $_POST['title'], $_POST['fl'], $_POST['ll'], $_POST['busname'], $_POST['seatno'], $_POST['payment'], $_POST['paymentid'], $_POST['email'], $_POST['msg'], $_POST['datee'] ]);
        // Redirect to the view ticket page, the user will see their created ticket on this page
        header('Location: view.php?id=' . $pdo->lastInsertId());
    }
}
?>


<?=template_header('Create Ticket')?>

<div class="content create">
	<h2>Create Ticket</h2>
     <?php
            echo "Today's date is " . date("Y/m/d") . "<br>";
      ?>
      <h3>Kindly check Availabilty of seats before place your bus ticket: </h3>
      <a href="seatview.php" class="btn red">Check Available seats</a>
        
      <div class="content view">


 
    <form action="create.php" method="post">
    
        <label for="title">Name </label>
        <input type="text" name="title" placeholder="Name" id="title" required>

        <!-- <label for="fl">From</label>
        <input type="text" name="fl" placeholder="firstlocation" id="fl" required> 
         -->
        <label for="fl">From</label>
        <select name="fl" class="form-control form-control-lg">
                <option value=""> select</option>
                <option value="Dhemaji"> Dheamji</option>
                <option value="Silapathar">Silapathar</option>
                <option value="Guwahati">Guwahati</option>
            </select> 
<!-- 
        <label for="ll">To</label>
        <input type="text" name="ll" placeholder="lastlocation" id="ll" required> -->
        
        <label for="ll">To</label>
        <select name="ll" class="form-control form-control-lg">
                <option value=""> select</option>
                <option value="Dhemaji"> Dheamji</option>
                <option value="Silapathar">Silapathar</option>
                <option value="Guwahati">Guwahati</option>
            </select> 

            <label for="busname">Busname</label>
        <select name="busname" class="form-control form-control-lg">
                <option value=""> select</option>
                <option value="maina"> Maina</option>
                <option value="volvo">Volvo</option>
                <option value="honda">Honda</option>
            </select> 
            
            <label for="seatno">Choose Seat No</label>
        <select name="seatno" class="form-control form-control-lg">
                <option value=""> select</option>
                <option value="1"> One </option>
                <option value="2"> Two</option>
                <option value="3"> Three </option>
                <option value="4"> Four</option>
                <option value="5"> Five </option>
                <option value="6"> Six </option>
                <option value="7"> Seven </option>
                <option value="8"> Eight </option>
                <option value="9"> Nine </option>
                <option value="10"> Ten</option>
                <option value="11"> Eleven </option>
                <option value="12"> Twelve</option>
                <option value="13"> Thirteen </option>
                <option value="2"> Fourteen</option>
                <option value="14"> Fifteen </option>
                <option value="15"> Sixteen </option>
                
            </select> 


        <label for="payment">Payment</label>
        <select name="payment" class="form-control form-control-lg">
                <option value=""> select</option>
                <option value="300"> Silapathar to Guwahati Rs. 600</option>
                <option value="500">Dhemaji to Guwahati Rs. 500</option>
                
            </select> 
            
            <label for="paymentid">Enter your transaction paymentid</label>
        <input type="text" name="paymentid" placeholder="Enter your transaction paymentid" id="paymentid" required>

         <label for="email">Email</label>
        <input type="email" name="email" placeholder="johndoe@example.com" id="email" required>

        <label for="msg">Message</label>
        <textarea name="msg" placeholder="Enter your message here..." id="msg" required></textarea>

        <label for="date" style="margin-top:10px;">select Journey date</label >   
        <input type="date" name="datee" value="" placeholder="Enter Date"  >
 
        <input type="submit" value="Create">
    </form>

    
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>





                          <!-- Footer -->
                          <footer class="page-footer font-small stylish-color-dark pt-4 bg-dark text-center text-white">

<!-- Footer Links -->
<div class="container text-center text-md-left">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-4 mx-auto">

      <!-- Content -->
      <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Footer Content</h5>
      <p>ProBus System is a Bus Ticketing System Where You can book Your ticket for bus</p>

    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none">

    <!-- Grid column -->
    <div class="col-md-2 mx-auto">

      <!-- Links -->
      <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

      <ul class="list-unstyled">
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a href="about.php">about-us</a>
        </li>
       
      </ul>

    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none">

    <!-- Grid column -->
    <div class="col-md-2 mx-auto">

      <!-- Links -->
      <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

      <ul class="list-unstyled">
        <li>
          <a href="view.php">ticket view</a>
        </li>
        <li>
          <a href="#!">Link 2</a>
        </li>
        <li>
          <a href="#!">Link 3</a>
        </li>
        <li>
          <a href="#!">Link 4</a>
        </li>
      </ul>

    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none">

    <!-- Grid column -->
    <div class="col-md-2 mx-auto">

      <!-- Links -->
      <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

      <ul class="list-unstyled">
        <li>
          <a href="#!">Link 1</a>
        </li>
        <li>
          <a href="#!">Link 2</a>
        </li>
        <li>
          <a href="#!">Link 3</a>
        </li>
        <li>
          <a href="#!">Link 4</a>
        </li>
      </ul>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->

<hr>

<!-- Call to action -->
<ul class="list-unstyled list-inline text-center py-2">
  <li class="list-inline-item">
    <h5 class="mb-1">Register for free</h5>
  </li>
  <li class="list-inline-item">
    <a href="#!" class="btn btn-danger btn-rounded">Sign up!</a>
  </li>
</ul>
<!-- Call to action -->

<hr>

<!-- Social buttons -->
<ul class="list-unstyled list-inline text-center">
  <li class="list-inline-item">
    <a class="btn-floating btn-fb mx-1">
      <i class="fab fa-facebook-f"> </i>
    </a>
  </li>
  <li class="list-inline-item">
    <a class="btn-floating btn-tw mx-1">
      <i class="fab fa-twitter"> </i>
    </a>
  </li>
  <li class="list-inline-item">
    <a class="btn-floating btn-gplus mx-1">
      <i class="fab fa-google-plus-g"> </i>
    </a>
  </li>
  <li class="list-inline-item">
    <a class="btn-floating btn-li mx-1">
      <i class="fab fa-linkedin-in"> </i>
    </a>
  </li>
  <li class="list-inline-item">
    <a class="btn-floating btn-dribbble mx-1">
      <i class="fab fa-dribbble"> </i>
    </a>
  </li>
</ul>
<!-- Social buttons -->



</footer>
<!-- Footer -->



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
