<?php
session_start();
	if(empty($_SESSION["userId"])){             
	//로그인 되지 않은 상태이면
	echo "<script>alert('로그인 하세요.'); 
        history.back();</script>";
		exit();
		
	}else{}
	$title = "";
	$writer = "";
	$content = "";
	$action = "insert.php";
	$bid = empty($_REQUEST["bid"]) ? "free" : $_REQUEST["bid"];
	$num = empty($_REQUEST["num"]) ? "" : $_REQUEST["num"] ;
	$page = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	$a=$_REQUEST["a"];
	
	if($num){
		require("db_connect.php");
		
		$query = $db->query("select * from board where bid='$bid' and num =$num");
		if ($row = $query->fetch()){
			$title = $row["title"];
			$writer = $row["writer"];
			$content = $row["content"];
			$hits = $row["hits"];

			$action = "update.php?bid=$bid&num=$num&page=$page";			
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css"href="../css/common.css">
		<link rel="stylesheet" type="text/css"href="../css/header.css">
		<link rel="stylesheet" type="text/css"href="../css/write.css">
   
</head>
<div id="all">
      <header>
	  <div id="search_box">
    <form action="../board/search_result.php" method="get">
      <select name="catgo">
	   <option value="titles">제목+내용</option>
        <option value="title">제목</option>
        <option value="writer">글쓴이</option>
        <option value="content">내용</option>

      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
    </div>
        <a href="../index.php"><img id="logo" src="../img/logo.png"></a>
		
        <nav id="top_menu">
		
      <a href="../login/login_name.php">로그인</a>  
	  <a href="../index.php">Home</a>
        </nav>
        <nav id="top_menu2">
          <ul>
            <div class="nor1"  onclick="location.href='../normal.php?bid=normal'"> <li>일반주제</a> </li></div>
            <div class="nor1" onclick="location.href='../yesno.php?bid=yesno';">  <li>찬반주제</a> </li></div>
            <div class="nor1" onclick="location.href='../free.php?bid=free';"> 	  <li>자유게시판</a> </li></div>
            <div class="nor1" onclick="location.href='../yesno.php?bid=yesno';">  <li>토론게시판</a> </li></div>
          </ul>
        </nav>
      </header>
<form name='tmp_name' method="post" action="<?=$action?>" enctype="multipart/form-data">
<input type= "hidden" name="hits" value="<?=$hits?>"  />
<input type= "hidden" name="bid" value="<?=$bid?>"  />
<input type= "hidden" name="a" value="<?=$a?>"/>
<input type= "hidden" name="writer" value="<?=$_SESSION["userName"]?> " />
    <table class="wrtable">
        <tr>
            <th>제목</th>
            <td>  <input  type = text style="height:30px;font-size:15px;" name="title" rows="1" placeholder="제목" maxlength="80"value="<?=$title?>" required>
            </td>
        </tr>
        <tr>
            <th>작성자</th>
            <td style="text-align:left;font-size:15px;color:#071914;font-weight:bold;">
			작성자: <?=$_SESSION["userName"]?>    </td>
        </tr>
        <tr>
            <th>내용</th>
            <td>
			<textarea style="height:500px;resize: none;" name="content" rows="10"  required><?=$content?></textarea>

            </td>
        </tr>
    </table>
 <p>이미지 파일 업로드 </p>
 <input  type="file"  name="imgFile" /><br>
<input type="button" value="목록보기" onclick="location.href='../<?=$a?>.php?bid=<?=$bid?>&page=<?=$page?>'">

 <button type="submit">저장</button>
 </form>
<footer>
    <p>
        <span>작성자 : 김세혁</span><br/>
        <span>이메일 : rlatpgur627@gmail.com</span><br/>
        <span>2021 신구대학교</span>
    </p>
</footer>

</div><!--all-->
<br>

  </body>

</html>
