<!--?php
	mysql_connect("localhost","root","");
	mysql_select_db("medical");
	
	$shopname=$_POST['shop'];
	$address=$_POST['address'];
	$contact_no=$_POST['contact_no'];
	$email=$_POST['email'];
	$reg_no=$_POST['reg_no'];
	$password=md5($_POST['pass']);

	mysql_query("insert into shop_owner(shopname,address,contact_no,emailid,reg_no,password) values('$shopname','$address','$contact_no','$email','$reg_no','$password')") or die("Failed to Query database ".mysql_error());
	echo "Your data have been entered into database";

?>
<a href="index.php">Go to home page</a-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="registration.css">
</head>
<body>
	<div id="form">
		<form action="success_registered.php" method="POST">
			<p>
				<button onclick="getlocation()">Get My Location</button>
			</p>
			<p>
				<label>Shopname:</label>
				<input type="text" name="shop" id="shop" required>
			</p>
			<p>
				<label>Address:</label>
				<input type="text" name="address" id="address" required>
			</p>
			<p>
				<label>Contact No.:</label>
				<input type="text" name="contact_no" id="contact_no" required>
			</p>
			<p>
				<label>Email ID:</label>
				<input type="text" name="email" id="email" required>
			</p>
			<p>
				<label>Registered No.:</label>
				<input type="text" name="reg_no" id="reg_no" required>
			</p>
			<p>
				<label>Pin Code:</label>
				<input type="text" name="pincode" id="pincode" required>
			</p>
			<p>
				<label>Password:</label>
				<input type="password" name="pass" id="pass" required>
			</p>
			
			<p>
				<button type="submit">Submit</button>
			</p>
		</form>
		<div id='login_link'>
			<p>Already Registered?<a href="login.php">Login</a></p>
		</div>
	</div>

			<script  type="text/javascript">
			function getlocation(){
			//var x=alert("Share your location");
			{
			//document.write("works");
			window.location="getmylocation_reg.html";
			}
			}
			</script>

			<?php
			$lat=(isset($_GET['lat']))?$_GET['lat']:'';
			$long=(isset($_GET['long']))?$_GET['long']:'';
			echo $lat;
			echo $long;
			$_SESSION['lat']=$lat;
			$_SESSION['long']=$long;
			?>
<!--			
<form>
	<input type="hidden" name="lat" value="<?php //echo $lat ;?>">
	<input type="hidden" name="long" value="<?php //echo $long ;?>">
</form>
-->

</body>
</html>

