
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css"href="../css/login.css">
</head>
<body>

<?php
	session_start();
	if(empty($_SESSION["userId"])){//로그인 되지 않은 상태이면
?>
 <div class="wrap">
		<form class="login" action="login.php" method="post">
		   
		<h2>로그인</h2>
			<div class="login_id">
                <h4>아이디</h4>
                <input type="text" name="id"  placeholder="아이디">
            </div>
			<div class="login_pw">
                <h4>비밀번호</h4>
                <input type="password" name="pw"  placeholder="비밀번호">
            </div>
			 <div class="submit">
				<input type="submit" value="로그인">
			</div>
			    
 <script>

 </script>
		<input class="button" type="button" value="회원 가입"
				   onclick="window.open('member_join_form.php','popup','width=500,height=230')">
      <input  class="button" type="button" value="홈으로"
           onclick="location.href='../index.php' "></button>

  </div>
		</form>

<?php
	}else{                 //로그인 된 상태이면
?>
 <div class="wrap">
		<form class="login"  action="logout.php" method="post">
		<h2><?=$_SESSION["userName"]?>님 로그인</h2>
			<div class= "logind">
			 <input type="id" name="id" value="<?=$_SESSION["userId"]?>">
			 </div>
			 <div class= "loginds">
			 <input type="password" name="pw" value="<?=$_SESSION["userPw"]?>">
			 </div>
		<div class = "submits">
			<input type="submit" value="로그아웃">
			<input type="button" value="회원정보 수정"
			 onclick="window.open('member_update_form.php','popup','width=500,height=200')">
			  <input type="button" value="홈으로"
           onclick="location.href='../index.php' "></button>
	</div>

      </div>
	</form>
<?php
	}
?>
 
  
  </body>
</html>
