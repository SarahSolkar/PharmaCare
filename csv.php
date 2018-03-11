<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,'hackathon');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
echo "Connected successfully";}


class csv extends mysqli
{
	private $state_csv = false;
	public function __construct()
	{
	   parent::__construct("localhost","root","","hackathon");
	   if($this->connect_error)
	   {
	   	echo "Fail to connect to database: ".$this->connect_error;
		}
	}
	public function import($file)
	{
		$file=fopen($file,'r');
		while ($row =fgetcsv($file)) {
			//var_dump($row);
			//print'<pre>';
			//print_r($row);
			//print'</pre>';
			$value="'".implode("','",$row) ."'";
			//echo $value;

			$sql="insert into temp values (".$value.")";
			//echo $sql;
			//echo $value[0];


			if ($this->query($sql)) {

				$this->state_csv=true;
			}
			else{
				$this->state_csv=false;
				echo $this->error;
			}
		}
		if ($this->state_csv) {
			echo'Successfully imported';

			//require ("import.php");
					}
		else{
			echo'Something went wrong';
		}
	}
/*
	public function export(){
		$this->state_csv=false;
		$sql="t.name,t.stock from shop_data as t ";
		$run=$this->query($sql);
		if($run->num_row>0){
			$file=fopen(,'w');
		}else{

		}
	}

*/

}

?>