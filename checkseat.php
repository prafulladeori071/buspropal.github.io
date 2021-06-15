<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
// Output message variable
$msg = '';
    if(isset($_POST["submit"]))
        {

  
    // Validation checks... make sure the POST data is not empty
    if (empty($_POST['fl']) || empty($_POST['ll']) ||  empty($_POST['datee'])) {
        $msg = 'Please complete the form!';
    } else {
        // Insert new record into the tickets table
        $stmt = $pdo->prepare('INSERT INTO tickets(fl, ll, datee) VALUES (?, ?, ?)');
        $stmt->execute( [$_POST['fl'], $_POST['ll'], $_POST['datee']] );
        // Redirect to the view ticket page, the user will see their created ticket on this page
        // header('Location: view.php?id=' . $pdo->lastInsertId());
        header("location: bus.php");
    }
    
 }
?>



<?=template_header('Create Ticket')?>

<div class="content create">
	<h2>Create Ticket  
      <?php
            echo "Today's date is " . date("Y/m/d") . "<br>";
      ?>
  </h2>    
    <form action="" method="post">
        
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
            <label for="date" style="margin-top:10px;">select date</label >   
        <input type="date" name="datee" value="" placeholder="Enter Date"  >
 
        <button name="submit" value="submit" type="submit">Check-Bus</button>
        <!-- <input type="submit" value=""> -->
    </form>

    
    
</div>

<?=template_footer()?>





</body>
</html>