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
<input type="date" />
  <a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Go
  </a>

</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">March 22, 2017</h3>
  <p>Choose a game to make a pick</p>
  <table align = 'center'>
	  <tr><th>Time</th><th>Game</th><th>Spread</th></tr>
	  <tr><td>7:05 ET</td><td><a href= "detail.php">Team 1 vs Team 2</a></td><td>Team 1 -3</td></tr>
	  <tr><td>7:05 ET</td><td><a href= "detail.php">Team 3 vs Team 4</a></td><td>Team 4 -3</td></tr>
	  <tr><td>7:05 ET</td><td><a href= "detail.php">Team 5 vs Team 6</a></td><td>Team 5 -3</td></tr>
	  <tr><td>7:05 ET</td><td><a href= "detail.php">Team 7 vs Team 8</a></td><td>Team 7 -3</td></tr>
	  <tr><td>7:05 ET</td><td><a href= "detail.php">Team 9 vs Team 10</a></td><td>Team 10 -3</td></tr>
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

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright John Shaw 2017 <a href="www.linkedin.com/johntshaw">www.linkedin.com/johntshaw</a></p> 
</footer>

</body>
</html>