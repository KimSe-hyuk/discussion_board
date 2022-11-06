<?php
/*하나의 글을 데이터베이스에서 삭제.//*/
	require("db_connect.php");

	$bid = empty($_REQUEST["bid"]) ? "free" : $_REQUEST["bid"];
	$page = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	
	$nums = $_GET['num'];
	$num = $db->query("delete from board where bid='$bid'and num=$nums");
	$num = $db->query("delete from reply where con_num=$nums and board='$bid'");


	$reply = $db->query("update reply set con_num=con_num-1 where con_num > $nums and board='$bid'");
	
	
	$mqq = $db->query("
	ALTER TABLE board;
	SET @COUNT = 0;
	UPDATE board SET num = @COUNT:=@COUNT+1 where bid='$bid';
	
	ALTER TABLE board AUTO_INCREMENT=1;
	SET @COUNT = 0;
	UPDATE board SET keey = @COUNT:=@COUNT+1;
	");   

	
	echo"<script>
	alert('삭제되었습니다');
	location.href='../$bid.php?bid=$bid&page=$page';
	</script>";
	
?>
