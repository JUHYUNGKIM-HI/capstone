<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" charset="utf-8"/>
<style>
  .BUTTON{
   -webkit-border-radius:0px;
   -moz-border-radius: 0px;
   border-radius: 0px;
   color: #FFFFFF;
   width : 270px;
   font-family: Arial;
   font-size: 20px;
   font-weight: 100;
   padding: 10px;
   background-color: #3292F9;
   border: solid #3292F9 0;
   text-decoration: none;
   display: inline-block;
   cursor: pointer;
   text-align: center;
}
</style>
</head>
<body>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<div style="text-align:center; font-size:30px; font-famil:Arial;">
<?php
$id=$_GET['id'];
$pw=$_GET['pw'];

$conn = mysqli_connect('localhost','root','1q2w3e4r','dku');
$sql = "SELECT*FROM readingroom6 WHERE id=$id AND password='$pw'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$r_time = strtotime($row['r_time']);
$x = $r_time+3600;
$n_time = date("Y-m-d H:i:s",$x);

if($row['count']==NULL)
{
	echo "1시간 연장되었습니다!</br>";
	$mysqli = new mysqli('localhost','root','1q2w3e4r','dku');
	$querya1 = "UPDATE readingroom6 SET count='1', r_time='$n_time' WHERE id=$id AND password='$pw'";
	mysqli_query($mysqli,$querya1);
}

else if($row['count']==1)
{
	echo "이미 연장하셨습니다!</br>";
}

?>
<p><button type="button" class="BUTTON" onclick="history.back(-1);">뒤로가기</button></p>
</div>
</body>
</html>
