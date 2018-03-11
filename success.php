<?php 
session_start();
	if(isset($_POST['button']))
	{	
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo'hii';
echo "Connected successfully <br>";
mysqli_select_db($conn,'hackathon');

		$email=$_POST["email"];
		$password=md5($_POST["pass"]);
		$_SESSION['try']=$email;
		//mysqli_connect("localhost","root","");
		//mysqli_select_db($conn,"hackathon");

		$sql="select * from shopowner where emailid='$email' and password='$password'" or die("Failed to Query database ".mysqli_error());
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);

		if($row['emailid']!=$email and $row['password']!=$password)
		{
			echo "Shopname or Password doesn't match in our database";
						$flag=0;
		}
		else
		{
			echo "Login Successful. Welcome ".$email;
						$flag=1;
						//include ("upload.php");
		}
		//<a href="index.php">Go to home page</a>
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	
	<form><input type="hidden" name="flag" id="flag" value="<?php echo $flag;?>"></form>


	<script type="text/javascript">	
		//document.write("hugys");
		//var wanted_value = form.flag.value;
		//document.write(wanted_value);
		var flag = document.getElementById('flag').value;
		
		//document.write(flag);
		if(flag==1){
			window.location="upload.php";
		}
//document.write("hey");


	</script>

</body>

</html>
