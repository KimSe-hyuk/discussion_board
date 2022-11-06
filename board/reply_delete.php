<?php

//댓글 삭제
require("db_connect.php");

if(!session_id()){ 
    session_start();
		}
	$num = $_POST['num'];//댓글번호
	$name = $_POST['name'];//댓글쓴 아이디

$userId = empty($_SESSION["userId"]) ? "": $_SESSION["userId"];

if($userId==$name){
	
		$sql =  $db->query("delete from reply where num='".$num."'");

	   echo "<script>alert('댓글 삭제되었습니다.'); 
       history.back();</script>";
		
}else if(empty($_SESSION["userId"])){
	echo "<script>alert('로그인 하세요.'); 
       history.back();</script>";
}else{
	echo "<script>alert('등록한 사람이 아닙니다.'); 
       history.back();</script>";
}
		
		
		
		?>
 