<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table width="600" border="1" cellpadding="1" cellspcaing="1">
		<tr>
			<th>name</th>
			<!--<th>Latitude</th>
			<th>Longitude</th>-->
		</tr>
</body>
</html>

<?php
$lat=$_POST['access'];
$long=$_POST['access2'];
//$lat=(isset($_GET['lat']))?$_GET['lat']:'';
//$long=(isset($_GET['long']))?$_GET['long']:'';
echo $lat;
echo $long;
//echo 'hii';
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";
mysqli_select_db($conn,'hackathon');

 
function getDistance($latitude1,$longitude1,$latitude2,$longitude2)
{
	$earthRadius=6371;
	$latFrom= deg2rad($latitude1);
	$lonFrom= deg2rad($longitude1);
	$latTo= deg2rad($latitude2);
	$lonTo= deg2rad($longitude2);

	$latDelta=$latTo -$latFrom;
	$lonDelta=$lonTo -$lonFrom;

	$angle=2*asin(sqrt(pow(sin($latDelta/2),2)+ cos($latFrom)*cos($latTo)*pow(sin($lonDelta/2),2)));
	return $angle*$earthRadius;
}

//searching brand medicines

//$php='crocin';//dummy
$p=$_POST['search'];
echo $p;
$sql="select * from shop_location where sid in(select sid from  ms_rel where stock>0 and mid in(select mid from medicine where mname like('%$p%')));";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
if($resultCheck>0)
{
while($row=mysqli_fetch_assoc($result))
{
$i=0;
$distance[$i]=getDistance($row['latitude'],$row['longitude'],$lat,$long);
echo $row['sid']."<br/>";
$try=$distance[$i];
echo $try."<br/>";
$sql2="Insert into dist(sid,distance) values($row[sid],$try);";
//$result2=mysqli_query($conn,$sql2);

if (mysqli_query($conn, $sql2)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
$i++;


//$sql4="select (name,address,contact_no,emailid,reg_no,pincode) from shopowner where"

//echo $row['sid'].'and'.$try;
//echo'<br/>';
//echo '$row[latitude]';

//working
//echo'<tr>';
//echo'<td>'.$row['sid'].'</td>';
//echo'<td>'.$row['latitude'].'</td>';
//echo'<td>'.$row['longitude'].'</td>';
//echo'</tr>';
//$sqll="Insert into sorted_shops values($row[sid],$row[latitude],$row[longitude]);";
//$res=mysqli_query($conn,$sqll);
/*if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/
}
}
else
{
echo'error';
}

//after haversine

$k=5.0000;
$flag=0;
do{
$sql3="select name from shopowner where sid in(select sid from dist where distance<=$k);";
$result3=mysqli_query($conn,$sql3);
if(mysqli_num_rows($result3)>0){
	//echo "Da";
while($row2=mysqli_fetch_assoc($result3))
{
	//echo "er";
	//print_r($row2);
//$i=0;
echo'<td>'.$row2['name'].'</td>';
echo '<br/>';

//$sql2="Insert into sorted_shops values($row['sid']),$row['dist'];";
//$result2=mysqli_query($conn,$sql2);
//echo $flag;
//echo'<br/>';
//$i++;
$flag=1;
//echo $flag;
}
break;//
}
else
{
	$k++;
}
echo $k;
}while($k<=10.000 );

if($flag==0){
	echo "NOT FOUND";
}
//without incrementing radius

//delete

$sql="delete from dist;";
mysqli_query($conn,$sql);
echo'deleted successfully';//since dist was a temp table



//generic

//$p=$_POST['search'];
//echo $p;
$sql="select * from shop_location where sid in(select sid from  gs_rel where stock>0 and gid in (select gid from mg_rel where mid in(select mid from medicine where mname like('%$p%'))));";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
if($resultCheck>0)
{
while($row=mysqli_fetch_assoc($result))
{
$i=0;
$distance[$i]=getDistance($row['latitude'],$row['longitude'],$lat,$long);
echo $row['sid']."<br/>";
$try=$distance[$i];
echo $try."<br/>";
$sql2="Insert into dist(sid,distance) values($row[sid],$try);";
//$result2=mysqli_query($conn,$sql2);

if (mysqli_query($conn, $sql2)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}//
$i++;
}
}
else
{
echo'error';
}


//$sql4="select (name,address,contact_no,emailid,reg_no,pincode) from shopowner where"

//echo $row['sid'].'and'.$try;
//echo'<br/>';
//echo '$row[latitude]';

//working
//echo'<tr>';
//echo'<td>'.$row['sid'].'</td>';
//echo'<td>'.$row['latitude'].'</td>';
//echo'<td>'.$row['longitude'].'</td>';
//echo'</tr>';
//$sqll="Insert into sorted_shops values($row[sid],$row[latitude],$row[longitude]);";
//$res=mysqli_query($conn,$sqll);
/*if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
else
{
echo'error';
}*/

$k=600.0000;
$flag=0;
do{
$sql3="select name from shopowner where sid in(select sid from dist where distance<=$k);";
$result3=mysqli_query($conn,$sql3);
if(mysqli_num_rows($result3)>0){
	//echo "Da";
while($row2=mysqli_fetch_assoc($result3))
{
	//echo "er";
	//print_r($row2);
//$i=0;
echo'<td>'.$row2['name'].'</td>';
echo '<br/>';

//$sql2="Insert into sorted_shops values($row['sid']),$row['dist'];";
//$result2=mysqli_query($conn,$sql2);
//echo $flag;
//echo'<br/>';
//$i++;
$flag=1;
//echo $flag;
}
break;
}
else
{
	$k++;
}
echo $k;
}while($k<=615.000 );

if($flag==0){
	echo "NOT FOUND";
}

$sql="delete from dist;";
mysqli_query($conn,$sql);
echo'deleted successfully';//since dist was a temp table


//////alternative
$sql="select * from shop_location where sid in(select sid from  ms_rel where stock>0 and mid in (select aid from ma_rel where mid in(select mid from medicine where mname like('%$p%'))));";

$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
if($resultCheck>0)
{
while($row=mysqli_fetch_assoc($result))
{
$i=0;
$distance[$i]=getDistance($row['latitude'],$row['longitude'],$lat,$long);
echo $row['sid']."<br/>";
$try=$distance[$i];
echo $try."<br/>";
$sql2="Insert into dist(sid,distance) values($row[sid],$try);";
//$result2=mysqli_query($conn,$sql2);

if (mysqli_query($conn, $sql2)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}//
$i++;
}
}
else
{
echo'error';
}


//$sql4="select (name,address,contact_no,emailid,reg_no,pincode) from shopowner where"

//echo $row['sid'].'and'.$try;
//echo'<br/>';
//echo '$row[latitude]';

//working
//echo'<tr>';
//echo'<td>'.$row['sid'].'</td>';
//echo'<td>'.$row['latitude'].'</td>';
//echo'<td>'.$row['longitude'].'</td>';
//echo'</tr>';
//$sqll="Insert into sorted_shops values($row[sid],$row[latitude],$row[longitude]);";
//$res=mysqli_query($conn,$sqll);
/*if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
else
{
echo'error';
}*/

$k=600.0000;
$flag=0;
do{
$sql3="select name from shopowner where sid in(select sid from dist where distance<=$k);";
$result3=mysqli_query($conn,$sql3);
if(mysqli_num_rows($result3)>0){
	//echo "Da";
while($row2=mysqli_fetch_assoc($result3))
{
	//echo "er";
	//print_r($row2);
//$i=0;
echo'<td>'.$row2['name'].'</td>';
echo '<br/>';

//$sql2="Insert into sorted_shops values($row['sid']),$row['dist'];";
//$result2=mysqli_query($conn,$sql2);
//echo $flag;
//echo'<br/>';
//$i++;
$flag=1;
//echo $flag;
}
break;
}
else
{
	$k++;
}
echo $k;
}while($k<=615.000 );

if($flag==0){
	echo "NOT FOUND";
}

$sql="delete from dist;";
mysqli_query($conn,$sql);
echo'deleted successfully';//since dist was a temp table

















?>
