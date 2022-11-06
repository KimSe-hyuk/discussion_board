<?php
require("../db_connect.php");

$bid = $_REQUEST["bid"];
$name = $_REQUEST["name"];

$sql2 = $db->query("delete from board_list where board_name='".$bid.$name."'");

$mqq = $db->query("
	ALTER TABLE board_list ;
	SET @COUNT = 0;
	UPDATE board_list  SET num = @COUNT:=@COUNT+1 ;
	"); 
	echo "<script>alert('게시판 삭제완료'); location.href='../$bid.php?bid=$bid';</script>";


?>