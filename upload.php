<?php
session_start();
include("csv.php");
$csv=new csv();
$email=$_SESSION['try'];
echo $email;
//$a=$_POST['acc'];
//echo $a;

if(isset($_POST['sub']))
{
	//var_dump($_FILES['file']);
	$csv->import($_FILES['file']['tmp_name']);
	//$result=0;
	//echo 'sdffewgrwgewr';
	//sid
	$sql="select sid from shopowner where emailid='$email';";
	$result1=mysqli_query($conn,$sql);
	//echo $result;
	$resultCheck=mysqli_num_rows($result1);
	//echo $resultCheck;
	if($resultCheck>0)
	{
		while($row=mysqli_fetch_assoc($result1))
		{
			echo $row['sid'];
		}

	}


$sql2="select * from temp;";
$result=mysqli_query($conn,$sql2);
echo "<br/>";

$resultCheck=mysqli_num_rows($result);
//echo $resultCheck;
//echo "<br/>";

if($resultCheck>0)
{
while($row=mysqli_fetch_assoc($result))
{
//echo $row['stock'];
echo $row['medname'];
echo "<br/>";
$sql3="select mid from medicine where mname='$row[medname]';";
$result2=mysqli_query($conn,$sql3);
$resultCheck2=mysqli_num_rows($result2);
//echo $resultCheck2;
//echo $result2;

if($resultCheck2>0){
	while($row2=mysqli_fetch_assoc($result2))
	{
	
		echo $row2['mid'];
		echo'<br/>';
			$sql4="update ms_rel set stock=$row[stock] where sid=103 and mid=$row2[mid];";
			$result4=mysqli_query($conn,$sql4);
	}
}
}
}
else
{
echo'error hai';
}

}
/*
if(isset($_POST['sub']))
{
	//var_dump($_FILES['file']);
	$csv->export();
}
*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Phamracare/upload</title>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="sub" value="import into our data">
		
	</form>
<!--
	<form method="post">
		<input type="submit" name="exp" value="export your data">
	</form>
-->

</body>
</html>