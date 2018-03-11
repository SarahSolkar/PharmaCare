<?php

$lat=(isset($_GET['lat']))?$_GET['lat']:'';
$long=(isset($_GET['long']))?$_GET['long']:'';
echo $lat;
echo $long;


?>

<!DOCTYPE html>
<html>
<head>
	<title>Pharmacare</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div id="logotext">
		<img src="">
		<p>Pharmacare</p>
	</div>
	<div id="mainheader">
		<ul>
			<li><a href="index.php">Home</a></li>
		</ul>
	</div>
	<div id="search">
		<li>
			<form id="searchbar" method="POST" action="search.php">
				<input type="text" name="search" id="search" placeholder="Search Here" required>
				<input type="submit" name="searchbutton" id="searchbutton" value="Search">
				<input type="hidden" name="access" value="<?php echo $lat ;?>">
				<input type="hidden" name="access2" value="<?php echo $long ;?>">

			</form>
		</li>
	</div>

	<div id="login">
		<li><a href="login.php">Login</a></li>
	</div>
</body>
</html>