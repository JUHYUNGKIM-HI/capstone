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
$conn = mysqli_connect('localhost','root','1q2w3e4r','dku');
$sql = "SELECT*FROM readingroom6";
$result = mysqli_query($conn,$sql);
$mysqli = new mysqli('localhost','root','1q2w3e4r','dku');
$id = $_GET['id'];
$pw = $_GET['pw'];

for($i=1; $i<=54; $i++)
{
$row[$i] = mysqli_fetch_assoc($result);

if($row[$i]['id']==$id)
{
$x=$i;
}

if($row[$i]['password']==$pw)
{
$y=$i;
}
}

if($x==$y)
{
 echo "반납이 완료되었습니다!</br></br>";
 $query = "UPDATE readingroom6 SET id=NULL, password=NULL, heat='-1', distance='-1', r_time=NULL, count=NULL  WHERE seat=$x";
 mysqli_query($mysqli,$query);
}

else
{
 echo "반납에 실패 했습니다. 학번과 비밀번호를 다시 확인해 주세요!</br></br>";
}
?>
<p><button type="button" class="BUTTON" onclick="location.href='myseat.php'">내 자리로 가기</button></p>
<p><button type="button" class="BUTTON" onclick="location.href='return1.php'">되돌아가기</button></p>
</div>
</body>
</html>
