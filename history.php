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
  <h3 class="margin">History</h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <div class="row">
	<div class="col-sm-2">
	</div>
    <div class="col-sm-8"> 
      <h3></h3>
	  
	  	  <?php
	  $user_id = htmlentities($_SESSION['user_id']);
	  $sql="SELECT a.game_id, b.matchup, b.away_team, b.home_team, a.amount, a.payout, a.odds, a.picktype, b.away_score, b.away_result_spread, b.away_result_line, b.home_score, b.home_result_spread, b.home_result_line, b.total, b.over_under_result FROM picks a 
	  INNER JOIN game b
	  ON a.game_id = b.game_id
	  WHERE a.user_id = '$user_id'
	  AND b.away_result_spread != ''";
	  
		$result = mysqli_query($mysqli,$sql);
		?><table align = "center">
		<tr><th>Game ID</th><th>Matchup</th><th>Pick</th><th>Bet Amount</th><th>Potential Payout</th><th>Odds</th><th>Result</th>Actual Payout<th></th><th></th></tr>
		<?php
		while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			?>
			<tr><td>
			<?php echo $row['game_id']; ?>
			</td><td>
			<?php echo $row['matchup']; ?>
			</td><td>
			<?php 
			if ($row['picktype'] == 'awayspread'){
				echo $row['away_team'];
			}elseif ($row['picktype'] == 'awayline'){
				echo $row['away_team'];
			}elseif ($row['picktype'] == 'homespread'){
				echo $row['home_team'];
			}elseif ($row['picktype'] == 'homeline'){
				echo $row['home_team'];
			}elseif ($row['picktype'] == 'totalover'){
				echo 'Game Total - Over';
			}elseif ($row['picktype'] == 'totalunder'){
				echo 'Game Total - Under';
			}else{
				echo 'Something went wrong';
			}
			?>
			</td><td>
			<span class="glyphicon glyphicon-link"></span><?php echo $row['amount']; ?>
			
			</td><td>
			<span class="glyphicon glyphicon-link"></span><?php echo $row['payout']; ?>
			</td><td>
			<?php echo $row['odds']; 
			?>
			</td><td>
				<?php 
					if ($row['picktype'] == 'awayspread'){
						echo $row['away_result_spread'];
					}elseif ($row['picktype'] == 'awayline'){
						echo $row['away_result_line'];
					}elseif ($row['picktype'] == 'homespread'){
						echo $row['home_result_spread'];
					}elseif ($row['picktype'] == 'homeline'){
						echo $row['home_result_line'];
					}elseif ($row['picktype'] == 'totalover'){
						echo $row['over_under_result'];
					}elseif ($row['picktype'] == 'totalunder'){
						echo $row['over_under_result'];
					}else{
						echo 'Something went wrong';
					}
			?>
				
				
				
			</td><td>
				
			<?php 
					if ($row['picktype'] == 'awayspread'){
						if ($row['away_result_spread'] == 'W'){
							?><span class="glyphicon glyphicon-link"></span><?php echo $row['payout'];
						}else{
							?><span class="glyphicon glyphicon-link"></span><?php echo '0';
						}
					}elseif ($row['picktype'] == 'awayline'){
						if ($row['away_result_line'] == 'W'){
							?><span class="glyphicon glyphicon-link"></span><?php echo $row['payout'];
						}else{
							?><span class="glyphicon glyphicon-link"></span><?php echo '0';
						}
					}elseif ($row['picktype'] == 'homespread'){
						if ($row['home_result_spread'] == 'W'){
							?><span class="glyphicon glyphicon-link"></span><?php echo $row['payout'];
						}else{
							?><span class="glyphicon glyphicon-link"></span><?php echo '0';
						}
					}elseif ($row['picktype'] == 'homeline'){
						if ($row['home_result_line'] == 'W'){
							?><span class="glyphicon glyphicon-link"></span><?php echo $row['payout'];
						}else{
							?><span class="glyphicon glyphicon-link"></span><?php echo '0';
						}
					}elseif ($row['picktype'] == 'totalover'){
						if ($row['over_under_result'] == 'Over'){
							?><span class="glyphicon glyphicon-link"></span><?php echo $row['payout'];
						}else{
							?><span class="glyphicon glyphicon-link"></span><?php echo '0';
						}
					}elseif ($row['picktype'] == 'totalunder'){
						if ($row['over_under_result'] == 'Under'){
							?><span class="glyphicon glyphicon-link"></span><?php echo $row['payout'];
						}else{
							?><span class="glyphicon glyphicon-link"></span><?php echo '0';
						}
					}else{
						echo 'Something went wrong';
					}
			?>
				
			</td></tr>
			<?php
		}
	  ?>
	  </table>
	  
<!--
	  <table align = "center">
	  <tr><th>Game</th><th>Pick</th><th>Amount</th><th>Potential Payout</th><th>Result</th><th>Actual Payout</th></tr>
	  <tr><td>
	  	Team 11 vs Team 12</td><td>
		Team 11 +3.5 (-115)</td><td>
		<span class="glyphicon glyphicon-link"></span> 115</td><td>
		<span class="glyphicon glyphicon-link"></span>215</td><td>
		Loss</td><td>
		<span class="glyphicon glyphicon-link"></span>0</td><td>
	  </tr><tr><td>
	  	Team 11 vs Team 12</td><td>
		Team 11 +3.5 (-115)</td><td>
		<span class="glyphicon glyphicon-link"></span> 115</td><td>
		<span class="glyphicon glyphicon-link"></span>215</td><td>
		Loss</td><td>
		<span class="glyphicon glyphicon-link"></span>0</td><td>
	  </tr><tr><td>
	  	Team 11 vs Team 12</td><td>
		Team 11 +3.5 (-115)</td><td>
		<span class="glyphicon glyphicon-link"></span> 115</td><td>
		<span class="glyphicon glyphicon-link"></span>215</td><td>
		Loss</td><td>
		<span class="glyphicon glyphicon-link"></span>0</td><td>
	  </tr><tr><td>
	  	Team 11 vs Team 12</td><td>
		Team 11 +3.5 (-115)</td><td>
		<span class="glyphicon glyphicon-link"></span> 115</td><td>
		<span class="glyphicon glyphicon-link"></span>215</td><td>
		Loss</td><td>
		<span class="glyphicon glyphicon-link"></span>0</td><td>
	  </tr><tr><td>
	  	Team 11 vs Team 12</td><td>
		Team 11 +3.5 (-115)</td><td>
		<span class="glyphicon glyphicon-link"></span> 115</td><td>
		<span class="glyphicon glyphicon-link"></span>215</td><td>
		Loss</td><td>
		<span class="glyphicon glyphicon-link"></span>0</td><td>
	  </tr><tr><td>
	  	Team 11 vs Team 12</td><td>
		Team 11 +3.5 (-115)</td><td>
		<span class="glyphicon glyphicon-link"></span> 115</td><td>
		<span class="glyphicon glyphicon-link"></span>215</td><td>
		Loss</td><td>
		<span class="glyphicon glyphicon-link"></span>0</td><td>
	  </tr><tr><td>
	  	Team 11 vs Team 12</td><td>
		Team 11 +3.5 (-115)</td><td>
		<span class="glyphicon glyphicon-link"></span> 115</td><td>
		<span class="glyphicon glyphicon-link"></span>215</td><td>
		Loss</td><td>
		<span class="glyphicon glyphicon-link"></span>0</td><td>
	  </tr><tr><td>
	  	Team 11 vs Team 12</td><td>
		Team 11 +3.5 (-115)</td><td>
		<span class="glyphicon glyphicon-link"></span> 115</td><td>
		<span class="glyphicon glyphicon-link"></span>215</td><td>
		Loss</td><td>
		<span class="glyphicon glyphicon-link"></span>0</td><td>
	  </tr><tr><td>
	  	Team 11 vs Team 12</td><td>
		Team 11 +3.5 (-115)</td><td>
		<span class="glyphicon glyphicon-link"></span> 115</td><td>
		<span class="glyphicon glyphicon-link"></span>215</td><td>
		Loss</td><td>
		<span class="glyphicon glyphicon-link"></span>0</td><td>
	  </tr><tr><td>
	  	Team 11 vs Team 12</td><td>
		Team 11 +3.5 (-115)</td><td>
		<span class="glyphicon glyphicon-link"></span> 115</td><td>
		<span class="glyphicon glyphicon-link"></span>215</td><td>
		Loss</td><td>
		<span class="glyphicon glyphicon-link"></span>0</td><td>
	  </tr>
	  </table>
	  <br />
	  <br />
	  <p>Page <u>1</u> 2 3 4 5 ></p>
-->

    </div>
	<div class="col-sm-2">
	</div>
  </div>
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