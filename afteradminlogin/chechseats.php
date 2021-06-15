<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
The available seats are
    


<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
// Output message variable
$msg = '';
// Check if POST data exists (user submitted the form)
if (isset($_POST['busname'], $_POST['regno'], $_POST['busseats'])) {
    // Validation checks... make sure the POST data is not empty
    if (empty($_POST['busname']) || empty($_POST['regno']) || empty($_POST['busseats'])) {
        $msg = 'Please complete the form!';
    }  else {
        // Insert new record into the tickets table
        $stmt = $pdo->prepare('INSERT INTO checkseat (busname, regno, busseats) VALUES (?, ?, ?)');
        $stmt->execute([ $_POST['busname'], $_POST['regno'], $_POST['busseats'] ]);
        // Redirect to the view ticket page, the user will see their created ticket on this page
        header('Location: seataddview.php);
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
    <form action="create.php" method="post">
        
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

 
        
        <input type="submit" value="Create">
    </form>

    
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>





</body>
</html>