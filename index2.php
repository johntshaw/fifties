<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="includes/style2.css">
  
</head>
<body>
<?php
if(!empty($_GET['message'])) {
    $message = $_GET['message'];
	if($message == 'success'){
		$fullmessage = 'Your Pick Has Been Saved Successfully';
	}
	?>
	<div class="message">
	<?php
		echo $fullmessage;
	?></div><?php
	}
?>
	
<!-- Navbar -->
<?php
include_once 'navbar.php';
?>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <?php if (login_check($mysqli) == true) {?>
  
	  <h3 class="margin">Welcome Back</h3>
  <p>You may have noticed a few new features! Check out the latest information here</p>
	
	<?php } else { ?>
							
  <h3 class="margin">Welcome</h3>
  <h3 class="margin">So you think you can beat the odds?</h3>
  <p>This site was created so you can prove that you know the most about sports.  Unlike other fantasy sports leagues, you pick the games you want to pick and only risk what you want to risk.
  Using a sports book model, you can create a league, challenge your friends, and use your credits to win more credits.  He who ends with the most credits wins.</p>
  <?php }	
					?>
  
  
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">

  <br />
  <?php
        if (login_check($mysqli) == true) { 
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p><a href="includes/logout.php">Log out</a>.</p>';
        } else {
					?>
			
						  <h3>Ready to get started?</h3>
							<a href="login.php" class="btn btn-default btn-lg">
							<span class="glyphicon glyphicon-log-in"></span> Log In
						  </a><br /><br /><?php
						  
		
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>Haven't joined yet? <a href='registration.php'>Register</a></p>";
                }
?>     
  <br />
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-4">
	  <span class="glyphicon glyphicon-question-sign"></span>
      <p>How To Play</p>
    </div>
    <div class="col-sm-4">
	  <span class="glyphicon glyphicon-phone-alt"></span>
      <p>Contact Us</p>
    </div>
    <div class="col-sm-4"> 
	  <span class="glyphicon glyphicon-star-empty"></span>
      <p>Manage Your Entries</p>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright John Shaw 2017 <a href="www.linkedin.com/johntshaw">www.linkedin.com/johntshaw</a></p> 
</footer>

</body>
</html>
