<?php require("../db_connect.php"); 
$bid = empty($_REQUEST["bid"]) ? "free" : $_REQUEST["bid"];
?>
       <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
   
	<link rel="stylesheet" type="text/css"href="../css/common.css">
	<link rel="stylesheet" type="text/css"href="../css/nomer.css">
	<link rel="stylesheet" type="text/css"href="../css/cre.css">
</head>
<body>
<body >
 <div id="cre_all">

		<h1 class="cre_bord">게시판 생성</a></h1>
		<h2 style="color:#2E2E2E">게시판을 생성합니다.</h2>
		<br>
			<div id="write_area">
				<form action="cre_board_ok.php" method="post">
					<div id="in_title">
	
						<input class="text" type="text" size="30" placeholder="게시판 제목을 입력합니다" name="b_name"/>
						<input type= "hidden" name="bid" value="<?=$bid?>"  />

						<button  class="text"  type="submit">게시판 생성</button>
						
					</div>
				</form>
			</div>
			<?php
$prevPage = $_SERVER['HTTP_REFERER'];

?><br>
			<input type="button" size="30" value="이전으로" onclick="location.href='<?=$prevPage?>'"/>
			<input type="button" size="30" value="홈으로" onclick="location.href='../index.php'"/>
		</div>
	</body>
</html>