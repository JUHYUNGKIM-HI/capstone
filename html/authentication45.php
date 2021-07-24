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
	<div style="text-align:center;">
	 <form action = "reservation45.php" method="get">
         <p class="TEXT"> 학번과 비밀번호를 입력해 주세요!</p>
 	 <p>&nbsp&nbsp&nbsp학번&nbsp&nbsp&nbsp&nbsp:&nbsp<input type="text" class="INPUT" name="id"></p>
	 <p>비밀번호&nbsp:&nbsp<input type="password" class="INPUT" name="pw"></p>
	 <button type="submit" class="BUTTON">&nbsp&nbsp&nbsp확인&nbsp&nbsp&nbsp</button>
	 <button type="button" class="BUTTON" onclick="history.back(-1);">뒤로가기</button>
	 </form>
	</div>
	</body>
</html>


