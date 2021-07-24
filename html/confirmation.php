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
<div style="text-align:center; font-size:30px; font-famil:Arial;">
<p>&nbsp</p>
<p>&nbsp</p>
<?php
$id=$_GET['id'];
$pw=$_GET['pw'];

$conn = mysqli_connect('localhost','root','1q2w3e4r','dku');
$sql = "SELECT*FROM readingroom6 WHERE id=$id AND password='$pw'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$now = mktime();
$r_time = strtotime($row['r_time']);
$time = 14400-($now-$r_time);
$hour = floor($time/3600);
$x = $time-($hour*3600);
$min = floor($x/60);
$sec = $x-($min*60);

echo "내 자리 : ";
echo $row['seat'];
echo "</br>";
echo "예약시간 : ";
echo $row['r_time'];
echo "</br>";
echo "남은시간 : $hour:$min:$sec</br></br>";
?>
<p><button type="button" class="BUTTON" onclick="history.back(-1);">뒤로가기</button></p>
<p><button type="button" class="BUTTON" onclick="location.href='return1.php'">반납하러가기</button><p>
</div>
</body>
</html>

