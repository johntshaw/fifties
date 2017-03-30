<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

$user_id = htmlentities($_SESSION['user_id']);
$game_id = $_POST['game_id'];
$picktype = $_POST['picktype'];
$amount = $_POST['amount'];
$winnings = $_POST['winnings'];
$payout = $_POST['payout'];
$odds = $_POST['odds'];
 
 echo $user_id;
 echo $game_id;
 echo $picktype;
 echo $amount;
 echo $winnings;
 echo $payout;
 echo $odds;
 
 
$sql="INSERT INTO `picks`(`user_id`, `game_id`, `picktype`, `amount`, `winnings`, `payout`, `odds`) VALUES('$user_id', '$game_id', '$picktype', '$amount', '$winnings', '$payout', '$odds')";
#$insert = mysqli_query($mysqli,$sql);

if ($mysqli->query($sql) === TRUE) {
    echo "Pick Saved";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
 
#redirect to home page after saving 
header('Location: index2.php?message=success');
?>