<?php
header("Content-Type:text/html;charset=UTF-8");

$host = 'localhost';
$user = 'root';
$pw = '1q2w3e4r';
$dbName = 'dku';
$mysqli = new mysqli($host,$user,$pw,$dbName);
$conn = mysqli_connect('localhost','root','1q2w3e4r','dku');
$sql = "SELECT*FROM readingroom6 WHERE seat=4";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$heat = $_GET['heat4'];
$distance = $_GET['distance4'];
$temp = $row['temp'];

echo "<br/>Heat = $heat";
echo ",";
echo "Distance = $distance<br/>";
echo $temp;

	if($heat==1 and $distance<=70)
	{
	$query = "UPDATE readingroom6 SET heat='$heat', distance='$distance', temp=temp+1  WHERE seat=4";
	mysqli_query($mysqli,$query);
	}

	else if($heat==0 or $distance>70)
	{
	$query = "UPDATE readingroom6 SET heat='$heat', distance='$distance', sensor=sensor+1, temp=0  WHERE seat=4";
        mysqli_query($mysqli,$query);
	}

	if($temp>=3)
	{
	$query = "UPDATE readingroom6 SET heat='$heat', distance='$distance', sensor=0, temp=0  WHERE seat=4";
        mysqli_query($mysqli,$query);
	}

mysqli_close($mysqli);
?>



