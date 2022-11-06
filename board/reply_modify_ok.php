

<?php
//댓글 수정
require("db_connect.php");

if(!session_id()){ 
    session_start();
		}
	$num = $_POST['num'];//댓글번호
	$name = $_POST['name'];//댓글쓴 아이디

$userId = empty($_SESSION["userId"]) ? "": $_SESSION["userId"];

if($userId==$name){

$sql =  $db->query("update reply set content='".$_POST['content']."' where num = '".$num."'");//reply테이블의 idx가 rno변수에 저장된 값의 content를 선택해서 값 저장

   echo "<script>alert('댓글 수정되었습니다.'); 
      history.back();</script>";
}else if(empty($_SESSION["userId"])){
	echo "<script>alert('로그인 하세요.'); 
       history.back();</script>";
}else{
	echo "<script>alert('등록한 사람이 아닙니다.'); 
       history.back();</script>";
}
	
	
?> 

