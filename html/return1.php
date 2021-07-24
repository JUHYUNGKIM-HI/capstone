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

 .TEXT{
 font-size:30px;
 font-family:Arial;
}

 .INPUT{
 width : 270px;
 font-size : 20px;
} 
</style>
      </head>
        <body>
	<p>&nbsp</p>
	<p>&nbsp</p>
	<p>&nbsp</p>
	<p>&nbsp</p>
	<div style="text-align:center;">
	 <form action = "restoration1.php" method="get">
         <p class="TEXT"> 반납하기</p>
 	 <p><input type="text" class="INPUT" name="id" value="학번"></p>
	 <p><input type="password" class="INPUT" name="pw" value="비밀번호"></p>
	 <p><button type="submit" class="BUTTON">&nbsp&nbsp&nbsp반납하기&nbsp&nbsp&nbsp</button></p>
	 </form>
	<button type="submit" class="BUTTON"  onclick="location.href='myseat.php'">&nbsp&nbsp&nbsp내 자리로 가기&nbsp&nbsp&nbsp</button>
	</div>
	</body>
</html>



