<?php
require("../db_connect.php");
$bid = $_REQUEST["bid"];
$b_name = $_POST['b_name']; 
$b=$bid.$b_name;

$query3 = $db->query("select * from board_list"); 
$a=0;
 while ($row = $query3->fetch()) {
	  $row["board_name"] = empty($row["board_name"])?1 : $row["board_name"];
	if($row["board_name"]!= $b){
		$a=1;
		
	}else{
		$a=2;
		break;
	}
}
 if($a==1){
$name=$bid.$b_name;
$sql2 = $db->exec("insert into board_list(board_name,date) values ('$name',now())"); 
$mqq = $db->query("
	ALTER TABLE board_list ;
	SET @COUNT = 0;
	UPDATE board_list  SET num = @COUNT:=@COUNT+1 ;
"); 
echo "<script>alert('게시판이 생성되었습니다.'); location.href='../$bid.php?bid=".$b_name."';</script>";
 }else if($a=2){
 echo "<script>alert('이미 있는 게시판입니다.'); history.back();</script>";
 }
?>