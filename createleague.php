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
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index2.php">Home</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="schedule.php">Make Picks</a></li>
		<li class="dropdown">
                <a href="manage.php" data-toggle="dropdown" class="dropdown-toggle">Manage<b class="caret"></b></a>
                <ul class="dropdown-menu">
					<li><a href="createleague.php">Create a League</a></li>
					<li><a href="joinleague.php">Join a League</a></li>
                    <li><a href="manageleague.php">Manage a League</a></li>
                </ul>
        </li>
		<li class="dropdown">
                <a href="account.php" data-toggle="dropdown" class="dropdown-toggle">Account<b class="caret"></b></a>
                <ul class="dropdown-menu">
					<li><a href="#">Welcome, John</a></li>
					<li><a href="manage.php">League Name Here</a></li>
					<li class="divider"></li>
                    <li><a href="history.php">View History</a></li>
                    <li><a href="pending.php">Pending Picks</a></li>
                    <li><a href="switchleagues.php">View Another League</a></li>
                    <li class="divider"></li>
                    <li><a href="signout.php">Sign Out</a></li>
                </ul>
            </li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Create New League</h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <div class="row">
	<div class="col-sm-3">
	</div>
    <div class="col-sm-6"> 
      <h3>League Setup Information</h3>
		<form>
			  League Name:<br />
			  <input type="text" name="leaguename"><br />
			  League Passphrase:<br />
			  <input type="text" name="passphrase"><br />
			  Sports:<br />
				<input type="checkbox" name="NFL" value="NFL"> NFL
				<input type="checkbox" name="NBA" value="NBA"> NBA
				<input type="checkbox" name="MLB" value="MLB"> MLB
				<input type="checkbox" name="NCAAF" value="NCAAF"> NCAAF
				<input type="checkbox" name="NCAAM" value="NCAAM"> NCAAM <br />
			  Length:<br />
				<input type="checkbox" name="Season" value="Season"> Season
				<input type="checkbox" name="Custom" value="Custom"> Custom <br />
			  Start Date:<br />
			  <input type="text" name="startdate"><br />
			  End Date:<br />
			  <input type="text" name="enddate"><br />
			  Starting Amount:<br />
			  <input type="text" name="startdate"><br />
			  Max Bet:<br />
			  <input type="text" name="enddate"><br />
			  Buy Back In?:<br />
				<input type="checkbox" name="buybackin" value="buybackin">  <br />
			  Re-Up Amount:<br />
			  <input type="text" name="reup"><br />
			  Interval:<br />
			  <input type="text" name="interval"><br /><br />
			  <a href="inviteusers.php" class="btn btn-default btn-lg">
			<span class="glyphicon glyphicon-arrow-right"></span> Submit </a>
		</form>
    </div>
	<div class="col-sm-3">
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