<?php

// If a sesssion is started don't start session. 
if (session_id() === "" ) {
 	session_start();
}

spl_autoload_register(function($classname) {
	include $classname . '.class.php';
});

$game = new Game;
//saveState($game);
$str = serialize($game);
file_put_contents("gamedata.dat", $str);

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
	}
?>

<?php 	
	//$name = $_GET['name'];
	//echo 	$_SESSION['name'];
 ?> 

 <p><?php echo("{$_SESSION['name']}"."<br />");?></p>

<form method="post" action="index.php">
	<label>Namn</label>
	<!-- <input type="text" name="id" value="id" placeholder="Skriv ditt namn"> -->
	<input type="text" name="name" value="" placeholder="Skriv ditt namn">
	<input type="submit" value="send">
</form>

	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
