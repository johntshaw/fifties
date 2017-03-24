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
  <h3 class="margin">Welcome to Team Management</h3>
  <h3>Need to view information for another league?   
  <a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-arrow-right"></span> Click Here
  </a></h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <div class="row">
    <div class="col-sm-4">
      <h3>Standings</h3>
	 <p> Player 7 --- <span class="glyphicon glyphicon-link"><b>1045</b></span><br />
	  Player 4 --- <span class="glyphicon glyphicon-link"><b>1023</b></span><br />
	  Player 1 --- <span class="glyphicon glyphicon-link"><b>1022</b></span><br />
	  Player 2 --- <span class="glyphicon glyphicon-link"><b>998</b></span><br />
	  Player 5 --- <span class="glyphicon glyphicon-link"><b>745</b></span><br />
	  Player 3 --- <span class="glyphicon glyphicon-link"><b>598</b></span><br />
	  Player 8 --- <span class="glyphicon glyphicon-link"><b>200</b></span><br />
	  Player 6 --- <span class="glyphicon glyphicon-link"><b>115</b></span><br /> </p>
    </div>
    <div class="col-sm-4"> 
      <h3>Recent Results</h3>
	  <p>
	  	Team 11 vs Team 12<br />
		Team 11 +3.5 (-115)<br />
		Amount: <span class="glyphicon glyphicon-link"></span> 115<br />
		Potential Payout: <span class="glyphicon glyphicon-link"></span>215<br />
		Result:Loss<br />
		Actual Payout: <span class="glyphicon glyphicon-link"></span>0<br />
		<br />
		Team 13 vs Team 14<br />
		Team 1 +3.5 (-115)<br />
		Amount: <span class="glyphicon glyphicon-link"></span> 115<br />
		Potential Payout: <span class="glyphicon glyphicon-link"></span>215<br />
		Result:Win<br />
		Actual Payout: <span class="glyphicon glyphicon-link"></span>215<br />
		<br />
		<a href="allresults.php">See All</a>
	  </p>
    </div>
    <div class="col-sm-4"> 
      <h3>Pending Bets</h3>
	  <p>
	  	March 22 7:00 PM ET<br />
		Team 1 vs Team 2<br />
		Team 1 +3.5 (-115)<br />
		Amount: <span class="glyphicon glyphicon-link"></span> 115<br />
		Payout: <span class="glyphicon glyphicon-link"></span> 215<br />
		Edit <span class="glyphicon glyphicon-edit"></span><br /><br />
		<a href="allpending.php">See All</a>
	  </p>
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