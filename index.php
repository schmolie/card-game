<?php

// If a sesssion is started don't start session.
if (session_id() === "" ) {
 	session_start();
}

spl_autoload_register(function($classname) {
	include $classname . '.class.php';
});

// if (unserialize("gamedata.dat")) {
// 	$game = new Game;
// 	//saveState($game);
// 	$str = serialize($game);
// 	file_put_contents("gamedata.dat", $str);
// }



// $deck1 = new Deck();
// echo $deck1->shuffleToJason();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
	if (isset($_POST['submit'])) {
		$_session['id'] = $_POST['id'];
		$_session['name'] = $_POST['name'];
		//$name = $_GET['name'];
		//echo 	$_SESSION['name'];
	}
?>
<!--
<form method="post" action="index.php">
	<label>Namn</label>
	<input type="text" name="id" value="id" placeholder="Skriv ditt namn">
	<input type="text" name="name" value="" placeholder="Skriv ditt namn">
	<input type="submit" value="send">
</form>
 -->
<h2>Swedish Rummy Card Game</h2>

<div class="paddButtom">
	<button id="join">Join game</button>
	<button id="deal">Deal cards</button>
	<button id="killswitch">Kill it</button>
</div>
<br />
<br />
<section class="container">
 	<img id="backside" class="card backside" src="cards/backsidecard.png">
 	<img id="topcard" class="card" src="cards/backsidecard.png">
 	<div class="hand"></div>
 	<div class="statusmsgs"></div>
 	<div class="turnMsg"></div>
  <div class="suitsMsg"></div>
 	<div class="points"></div>

</section>

	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
