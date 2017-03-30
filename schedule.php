<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
#echo htmlspecialchars($_SERVER["PHP_SELF"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="includes/style2.css">
  
</head>
<body>

<?php if (login_check($mysqli) == true) : ?>

<!-- Navbar -->
<?php
include_once 'navbar.php';
?>

<!-- First Container -->
<div class="container-fluid-sm bg-1 text-center">
  <h3><span class="glyphicon glyphicon-calendar logo"></span>Schedule</h3>
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
	<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
	<script>
		webshims.setOptions('forms-ext', {types: 'date'});
		webshims.polyfill('forms forms-ext');
		$.webshims.formcfg = {
		en: {
			dFormat: '-',
			dateSigns: '-',
			patterns: {
				d: "yy-mm-dd"
			}
		}
		};
	</script>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
		<input type="date" name="date" value="<?php 
		
		
		if (isset($_POST["date"]) && !empty($_POST["submit"])){
			echo $_POST["date"];
		}else{
			echo date('Y-m-d');
		}
		
		
		#echo date('Y-m-d'); 
		
		
		?>" />
		<input type="submit" name="submit" value="Submit">
	</form>
  <!--<a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Go
  </a>-->

</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin"><?php if (isset($_POST["date"]) && !empty($_POST["submit"])){
		$dateecho=$_POST["date"];
		echo $dateecho;
	}else{
		$dateecho=date("Y-m-d");
		echo $dateecho;
	}
	?></h3>
  <!--<p>Choose a game to make a pick</p>
  <table align = 'center'>
	  <tr><th>Time</th><th>Game</th><th>Spread</th></tr>
	  <tr><td>7:09 PM ET</td><td><a href= "detail.php">Butler vs North Carolina</a></td><td>UNC -7</td></tr>
	  <tr><td>7:29 PM ET</td><td><a href= "detail.php">South Carolina vs Baylor</a></td><td>BAY -3</td></tr>
	  <tr><td>9:39 PM ET</td><td><a href= "detail.php">UCLA vs Kentucky</a></td><td>UCLA -1.5</td></tr>
	  <tr><td>9:59 PM ET</td><td><a href= "detail.php">Wisconsin vs Florida</a></td><td>EVEN</td></tr>
	  <tr><td>7:00 PM ET</td><td><a href= "detail.php">Nets vs Wizards</a></td><td>WSH -10</td></tr>
  </table>-->


  
  
<?php 

if (isset($_POST["date"]) && !empty($_POST["submit"])){
		$date=$_POST["date"];
	}else{
		$date=date("Y-m-d");
	}

$sql="SELECT a.game_id, a.time, a.matchup, a.away_team_spread, a.home_team_spread FROM game a WHERE a.date = '$date'";

$result = mysqli_query($mysqli,$sql);
?><table align="center"><tr><th>Time</th><th>Game</th><th>Spread</th><th></th></tr><?php
while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {

    // If you want to display all results from the query at once:
    #print_r($row);
	?><tr><td><?php
    // If you want to display the results one by one
    echo $row['time'];?></td><td>
    <?php echo $row['matchup'];?></td><td>
    <?php echo $row['away_team_spread'] . "/" . $row['home_team_spread'];?></td><td>
	
	<form name= "<?php echo $row['game_id']?>" action="detail.php" method="post">
		<input type="hidden" name="game_id" value="<?php echo $row['game_id']?>">
		<input type="submit" name="submit" value="Make Pick">
	</form>
	
	</td></tr><?php
	}
?>
</table>

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


        <?php else : 
			header('Location: ../fifties/notauthorized.php'); ?>
         <!--   <div class="container-fluid bg-1 text-center">
			  <h3 class="margin">Oops!</h3>
			  <h3 class="margin">You are not authorized to access this page</h3>
			  <p>
                You are not authorized to access this page.  Please <a href="login.php">login</a>.
            </p>
			</div> -->
        <?php endif; ?>
		

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright John Shaw 2017 <a href="www.linkedin.com/johntshaw">www.linkedin.com/johntshaw</a></p> 
</footer>

</body>
</html>