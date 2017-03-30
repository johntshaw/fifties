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
		<?php
					if (login_check($mysqli) == true) {?>
        <li><a href="schedule.php">Make Picks</a></li>
		<li class="dropdown">
                <a href="manage.php" data-toggle="dropdown" class="dropdown-toggle">Manage<b class="caret"></b></a>
                <ul class="dropdown-menu">
					<li><a href="createleague.php">Create a League</a></li>
					<li><a href="joinleague.php">Join a League</a></li>
                    <li><a href="manageleague.php">Manage a League</a></li>
                </ul>
        </li><?php } else {
							}	
					?>
		<li class="dropdown">
                <a href="account.php" data-toggle="dropdown" class="dropdown-toggle">Account<b class="caret"></b></a>
                <ul class="dropdown-menu">
					<li><a href="#"><?php
					if (login_check($mysqli) == true) {
                        echo '<p>Welcome, ' . htmlentities($_SESSION['username']) . '.</p>';
						$user_id = htmlentities($_SESSION['user_id']);
						$sql4="SELECT a.user_id, a.balance FROM ledger a WHERE a.timestamp = 
								(SELECT MAX(b.timestamp) FROM ledger b WHERE b.user_id = '$user_id')";
						$result4 = mysqli_query($mysqli,$sql4);
						while($row4 = mysqli_fetch_array($result4, MYSQL_ASSOC)) {
							echo 'Balance: ';?>
							<span class="glyphicon glyphicon-link"></span>
							<?php
							echo $row4['balance'];
						}
											
						
						
					} else {
									echo "<p><a href='login.php'>Log In</a></p>";
							}	
					?>
					</a></li>
					<?php
					if (login_check($mysqli) == true) {?>
					<li><a href="manage.php">Friends of Fifties</a></li>
					<li class="divider"></li>
                    <li><a href="history.php">View History</a></li>
                    <li><a href="pending.php">Pending Picks</a></li>
                    <li><a href="switchleagues.php">View Another League</a></li>
                    <li class="divider"></li>
                    <li><a href="includes/logout.php">Sign Out</a></li>
					<?php } else {
							}	
					?>
                </ul>
            </li>
      </ul>
    </div>
  </div>
</nav>