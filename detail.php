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
  <h3>NCAA Basketball Game</h3>
  
  <?php
  		if (isset($_POST["game_id"]) ){# && !empty($_POST["submit"])){
			echo $_POST["game_id"];
		}else{
			echo 'No game id was passed';
		}
  ?>
  
  <?php
  $game_id = $_POST["game_id"];
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
    <h3 class="margin">Make Your Selection</h3>
  

<!-- DEPRICATED CODE FOR PICKING TYPE OF BET FROM DROPDOWN AND SEEING OPTIONS BELOW	
  
	<form action="<?php /* echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  <input type="hidden" name="game_id" value="<?php echo $game_id?>">
	  <select name="picktype" onchange="this.form.submit()">
		  <option value="spread" 		<?php
						if (isset($_POST["picktype"])){ 
							if ($_POST['picktype'] == 'spread'){
								echo 'selected="selected"';
							}else{
							}
						}else{
							echo 'selected';
						}
						?>>Spread</option>
		  <option value="line" 		<?php
						if (isset($_POST["picktype"])){ 
							if ($_POST['picktype'] == 'line'){
								echo 'selected="selected"';
							}else{
							}
						}else{
						}
						?>>Money Line</option>
		  <option value="game" 		<?php
						if (isset($_POST["picktype"])){ 
							if ($_POST['picktype'] == 'game'){
								echo 'selected="selected"';
							}else{
							}
						}else{
						}
				*/		?>>Game Totals</option>
		</select>
	</form>
--> 
	<!--- sample data no longer being used
<p>
 
	7:00 PM ET<br />
	Team 1 vs Team 2<br />
	<a href="final.php">Team 1 +3.5 (-115)</a><br />
	<a href="final.php">Team 2 -3.5 (-105)</a><br />
	<br />
	<a href="schedule.php">Back to Schedule</a>
  </p>
  -->
  
<?php  

		  $sql3="SELECT a.game_id, a.time, a.matchup, a.away_team, a.away_team_spread, a.away_team_line, a.away_team_odds, a.home_team, a.home_team_spread, a.home_team_line, a.home_team_odds, a.over_under, a.over_under_odds FROM game a WHERE a.game_id = '$game_id'";
		  $result3 = mysqli_query($mysqli,$sql3);
			while($row = mysqli_fetch_array($result3, MYSQL_ASSOC)) {
			?><table align = "center">
				<tr><th>Team</th><th>Spread</th><th>Line</th><th>Total</th></tr>
				<tr><td><?php
				echo $row['away_team'];?></td><td>
					<form name= "<?php echo $row['game_id']?>" action="final.php" method="post">
						<input type="hidden" name="game_id" value="<?php echo $row['game_id']?>">
						<input type="hidden" name="picktype" value="awayspread">
						<input type="submit" name="submit" value="<?php echo $row['away_team_spread'] .' ('. $row['away_team_odds'].')';?>">
					</form>
				</td><td>
					<form name= "<?php echo $row['game_id']?>" action="final.php" method="post">
						<input type="hidden" name="game_id" value="<?php echo $row['game_id']?>">
						<input type="hidden" name="picktype" value="awayline">
						<input type="submit" name="submit" value="<?php echo $row['away_team_line'];?>">
					</form>
				</td><td>
					<form name= "<?php echo $row['game_id']?>" action="final.php" method="post">
						<input type="hidden" name="game_id" value="<?php echo $row['game_id']?>">
						<input type="hidden" name="picktype" value="totalover">
						<input type="submit" name="submit" value="<?php echo 'Over '.$row['over_under'].'+' .' ('. $row['over_under_odds'].')';?>">
					</form>
				</td></tr><tr><td><?php
				echo $row['home_team'];?></td><td>
					<form name= "<?php echo $row['game_id']?>" action="final.php" method="post">
						<input type="hidden" name="game_id" value="<?php echo $row['game_id']?>">
						<input type="hidden" name="picktype" value="homespread">
						<input type="submit" name="submit" value="<?php echo $row['home_team_spread'] .' ('. $row['home_team_odds'].')';?>">
					</form>
				</td><td>
					<form name= "<?php echo $row['game_id']?>" action="final.php" method="post">
						<input type="hidden" name="game_id" value="<?php echo $row['game_id']?>">
						<input type="hidden" name="picktype" value="homeline">
						<input type="submit" name="submit" value="<?php echo $row['home_team_line'];?>">
					</form>
				</td><td>
					<form name= "<?php echo $row['game_id']?>" action="final.php" method="post">
						<input type="hidden" name="game_id" value="<?php echo $row['game_id']?>">
						<input type="hidden" name="picktype" value="totalunder">
						<input type="submit" name="submit" value="<?php echo 'Under '.$row['over_under'].'-' .' ('. $row['over_under_odds'].')';?>">
					</form>
				</td></tr>
			</table>
			<?php
			}







/* DEPRICATED CODE FOR PICKING TYPE OF BET FROM DROPDOWN AND SEEING OPTIONS BELOW
  if (isset($_POST["picktype"])){ 
		$picktype = $_POST["picktype"];
	}else{
		$picktype = 'spread';
	}

  if ($picktype == 'spread'){
		  $sql2="SELECT a.game_id, a.time, a.matchup, a.away_team, a.away_team_spread, a.away_team_line, a.away_team_odds, a.home_team, a.home_team_spread, a.home_team_line, a.home_team_odds FROM game a WHERE a.game_id = '$game_id'";
		  $result2 = mysqli_query($mysqli,$sql2);
			while($row = mysqli_fetch_array($result2, MYSQL_ASSOC)) {
			?><table align = "center">
				<tr><th>Team</th><th>Odds</th></tr>
				<tr><td><?php
				echo $row['away_team'];?></td><td><?php
				echo $row['away_team_odds'];?></td></tr><tr><td><?php
				echo $row['home_team'];?></td><td><?php
				echo $row['home_team_odds'];?>
				</td></tr>
			</table>
			<?php
			}
  }elseif($picktype == 'line'){
		  $sql2="SELECT a.game_id, a.time, a.matchup, a.away_team, a.away_team_spread, a.away_team_line, a.away_team_odds, a.home_team, a.home_team_spread, a.home_team_line, a.home_team_odds FROM game a WHERE a.game_id = '$game_id'";
		  $result2 = mysqli_query($mysqli,$sql2);
			while($row = mysqli_fetch_array($result2, MYSQL_ASSOC)) {
			?><table align = "center">
				<tr><th>Team</th><th>Line</th></tr>
				<tr><td><?php
				echo $row['away_team'];?></td><td><?php
				echo $row['away_team_line'];?></td></tr><tr><td><?php
				echo $row['home_team'];?></td><td><?php
				echo $row['home_team_line'];?>
				</td></tr>
			</table>
			<?php
			}
  }elseif($picktype == 'game'){
		  $sql2="SELECT a.game_id, a.time, a.matchup, a.away_team, a.away_team_spread, a.away_team_line, a.away_team_odds, a.home_team, a.home_team_spread, a.home_team_line, a.home_team_odds, a.over_under FROM game a WHERE a.game_id = '$game_id'";
		  $result2 = mysqli_query($mysqli,$sql2);
			while($row = mysqli_fetch_array($result2, MYSQL_ASSOC)) {
			?><table align = "center">
				<tr><th>Over/Under</th><th>Total</th></tr>
				<tr><td><?php
				echo 'Over';?></td><td><?php
				echo $row['over_under'].'+';?></td></tr><tr><td><?php
				echo 'Under';?></td><td><?php
				echo '-'.$row['over_under'];?>
				</td></tr>
			</table>
			<?php
			}
  }else{
		echo "Oops! Something went wrong (no pick type selected)";
  }
  
 */
 ?> 
  
  
  
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