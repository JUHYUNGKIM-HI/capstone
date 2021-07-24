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
<div style="text-align:center; font-size:30px; font-famil:Arial;">
<?php
$conn = mysqli_connect('localhost','root','1q2w3e4r','dku');
$sql = "SELECT*FROM readingroom6 WHERE seat=1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$mysqli = new mysqli('localhost','root','1q2w3e4r','dku');
$time = mktime();
$date = date("Y-m-d H:i:s",$time);
$id = $_GET['id'];
$sql1 = "SELECT id FROM readingroom6";
$result1 = mysqli_query($conn,$sql1);
$pw = $_GET['pw'];

for($i=1; $i<=54; $i++){
$row1[$i] = mysqli_fetch_assoc($result1);
if($row1[$i]['id']==$id)
{
$x = -1;
}
}

if($row['r_time']==NULL and !$x)
{
$query = "UPDATE readingroom6 SET id='$id', password='$pw', heat='1', distance='69', r_time='$date', sensor='0' WHERE seat=1";
mysqli_query($mysqli,$query);
echo " 예약되었습니다.</br></br>";
}

else if($x)
{
echo "이미 예약하셨습니다.</br></br>";
}

else if($row['r_time']=!NULL)
{
echo "다른자리를 예약해 주세요.</br></br>";
}
?>
<p><button type="button" class="BUTTON" onclick="location.href='index.php'">다른 자리 예약하기</button></p>
<p><button type="button" class="BUTTON" onclick="location.href='return.php'">반납하러 가기</button></p>
</div>
 </body>
</html>

