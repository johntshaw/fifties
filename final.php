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

<!-- Navbar -->
<?php
include_once 'navbar.php';
?>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin"><?php if (isset($_POST["date"]) && !empty($_POST["submit"])){
		$dateecho=$_POST["date"];
		echo $dateecho;
	}else{
		$dateecho=date("Y-m-d");
		echo $dateecho;
	}
	?></h3>
  <h3>
  <?php
	$game_id = $_POST["game_id"];
    $sql3="SELECT a.league FROM game a WHERE a.game_id = '$game_id'";
	$result3 = mysqli_query($mysqli,$sql3);
	while($row3 = mysqli_fetch_array($result3, MYSQL_ASSOC)) {
		echo $row3['league'];
	}
  ?>
  
  Game
  
  <?php
  		if (isset($_POST["game_id"]) ){# && !empty($_POST["submit"])){
			echo ' ('.$_POST["game_id"].')';
		}else{
			echo 'No game id was passed';
		}
  ?>
  </h3>
  
  <?php
  $game_id = $_POST["game_id"];
  $picktype = $_POST["picktype"];
  $sql="SELECT a.game_id, a.time, a.matchup, a.away_team_spread, a.home_team_spread FROM game a WHERE a.game_id = '$game_id'";
  $result = mysqli_query($mysqli,$sql);
  ?>
  <table align="center"><?php
	while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		?><tr><td><?php
		echo $row['time'];?></td><td>
		<?php echo $row['matchup'];?></td><td>
		<?php echo $row['away_team_spread'] . "/" . $row['home_team_spread'];?></td><td>
		<?php
	}
?>
	</table> 
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">Choose a Bet Amount</h3>
  
  <?php
	if ($picktype == 'awayspread'){
		$sql2="SELECT a.game_id, a.date, a.time, a.matchup, a.away_team, a.away_team_spread, a.away_team_line, a.away_team_odds, a.home_team, a.home_team_spread, a.home_team_line, a.home_team_odds, a.over_under FROM game a WHERE a.game_id = '$game_id'";
		$result2 = mysqli_query($mysqli,$sql2);
		while($row2 = mysqli_fetch_array($result2, MYSQL_ASSOC)) {
			echo 'Your Pick: Spread';?><br /><?php
			echo $row2['date'];
			echo ' ';
			echo $row2['time'];?><br /><?php
			echo $row2['matchup'];?><br /><?php
			echo $row2['away_team'];
			echo '  ';
			echo $row2['away_team_spread'];
			echo ' ('.$row2['away_team_odds'].')';
		}
	}elseif($picktype == 'awayline'){
		$sql2="SELECT a.game_id, a.date, a.time, a.matchup, a.away_team, a.away_team_spread, a.away_team_line, a.away_team_odds, a.home_team, a.home_team_spread, a.home_team_line, a.home_team_odds, a.over_under FROM game a WHERE a.game_id = '$game_id'";
		$result2 = mysqli_query($mysqli,$sql2);
		while($row2 = mysqli_fetch_array($result2, MYSQL_ASSOC)) {
			echo 'Your Pick: Moneyline';?><br /><?php
			echo $row2['date'];
			echo ' ';
			echo $row2['time'];?><br /><?php
			echo $row2['matchup'];?><br /><?php
			echo $row2['away_team'];
			echo '  ';
			echo $row2['away_team_line'];
		}
	}elseif($picktype == 'totalover'){
		$sql2="SELECT a.game_id, a.date, a.time, a.matchup, a.away_team, a.away_team_spread, a.away_team_line, a.away_team_odds, a.home_team, a.home_team_spread, a.home_team_line, a.home_team_odds, a.over_under, a.over_under_odds FROM game a WHERE a.game_id = '$game_id'";
		$result2 = mysqli_query($mysqli,$sql2);
		while($row2 = mysqli_fetch_array($result2, MYSQL_ASSOC)) {
			echo 'Your Pick: Game Total - Over';?><br /><?php
			echo $row2['date'];
			echo ' ';
			echo $row2['time'];?><br /><?php
			echo $row2['matchup'];?><br /><?php
			echo 'Game Total';
			echo '  ';
			echo 'Over '.$row2['over_under'].'+' .' ('. $row2['over_under_odds'].')';
		}
	}elseif($picktype == 'homespread'){
		$sql2="SELECT a.game_id, a.date, a.time, a.matchup, a.away_team, a.away_team_spread, a.away_team_line, a.away_team_odds, a.home_team, a.home_team_spread, a.home_team_line, a.home_team_odds, a.over_under FROM game a WHERE a.game_id = '$game_id'";
		$result2 = mysqli_query($mysqli,$sql2);
		while($row2 = mysqli_fetch_array($result2, MYSQL_ASSOC)) {
			echo 'Your Pick: Spread';?><br /><?php
			echo $row2['date'];
			echo ' ';
			echo $row2['time'];?><br /><?php
			echo $row2['matchup'];?><br /><?php
			echo $row2['home_team'];
			echo '  ';
			echo $row2['home_team_spread'];
			echo ' ('.$row2['home_team_odds'].')';
		}
	}elseif($picktype == 'homeline'){
		$sql2="SELECT a.game_id, a.date, a.time, a.matchup, a.away_team, a.away_team_spread, a.away_team_line, a.away_team_odds, a.home_team, a.home_team_spread, a.home_team_line, a.home_team_odds, a.over_under FROM game a WHERE a.game_id = '$game_id'";
		$result2 = mysqli_query($mysqli,$sql2);
		while($row2 = mysqli_fetch_array($result2, MYSQL_ASSOC)) {
			echo 'Your Pick: Moneyline';?><br /><?php
			echo $row2['date'];
			echo ' ';
			echo $row2['time'];?><br /><?php
			echo $row2['matchup'];?><br /><?php
			echo $row2['home_team'];
			echo '  ';
			echo $row2['home_team_line'];
		}
	}elseif($picktype == 'totalunder'){
		$sql2="SELECT a.game_id, a.date, a.time, a.matchup, a.away_team, a.away_team_spread, a.away_team_line, a.away_team_odds, a.home_team, a.home_team_spread, a.home_team_line, a.home_team_odds, a.over_under, a.over_under_odds FROM game a WHERE a.game_id = '$game_id'";
		$result2 = mysqli_query($mysqli,$sql2);
		while($row2 = mysqli_fetch_array($result2, MYSQL_ASSOC)) {
			echo 'Your Pick: Game Total - Under';?><br /><?php
			echo $row2['date'];
			echo ' ';
			echo $row2['time'];?><br /><?php
			echo $row2['matchup'];?><br /><?php
			echo 'Game Total';
			echo '  ';
			echo 'Under '.$row2['over_under'].'-' .' ('. $row2['over_under_odds'].')';
		}
	}else{
		echo 'Something went wrong - no pick selected';
	}

  
  
  ?>
  
  <p>
  <!-- DUMMY DATA - PLACEHOLDER NO LONGER NEEDED
	Selected Bet<br />
	7:00 PM ET<br />
	Team 1 vs Team 2<br />
	Team 1 +3.5 (-115)<br />
	-->
	<br />
	Available Balance <span class="glyphicon glyphicon-link"></span> 
	
	<?php
	$user_id = htmlentities($_SESSION['user_id']);
	$sql3="SELECT a.user_id, a.balance FROM ledger a WHERE a.timestamp = 
			(SELECT MAX(b.timestamp) FROM ledger b WHERE b.user_id = '$user_id')";
	$result3 = mysqli_query($mysqli,$sql3);
	while($row3 = mysqli_fetch_array($result3, MYSQL_ASSOC)) {
		echo $row3['balance'];
		$balance = $row3['balance'];
	}
	?>
	
	
	
	<br />
	<br />
	Amount to bet: 
	<br />
	<?php
		#echo $game_id;
		#echo $picktype;
		#echo $balance;
	?>
	<form name="chooseamount" action="confirm.php" method="post">
		<input type="hidden" name="game_id" value="<?php echo $game_id;?>">
		<input type="hidden" name="picktype" value="<?php echo $picktype;?>">
		<input type="number" name="amount" min="1" max="<?php echo $balance;?>">
		<input type="submit" name="submit" value="Place Bet">
	</form>
	
  
  </p>
  <br />
  <br />
  <br />
  <a href="schedule.php">Back to Schedule</a>
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