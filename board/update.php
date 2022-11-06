<!--update.php에 입력된 글을 데이터베이스에 추가.-->
<?php
require("db_connect.php");

$bid = empty($_REQUEST["bid"]) ? "free" : $_REQUEST["bid"];
$nums = $_REQUEST['num'];

$page = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];

$title = $_REQUEST['title'];
$username = $_REQUEST['writer'];
$content = $_REQUEST['content'];
$hits = $_REQUEST['hits'];
if($username && $title && $content){

	
	
	$date =   date("Y-m-d H:i:s");
 	$num = $db->query("select * from board  where bid='$bid' and num =$nums");



  $sql =  $db->exec("update  board set  
								writer = '".$username."'	,
								title = '".$title."'	,
								content = '".$content."'	,
								regtime = '".$date."'	,
								hits = '".$hits."'								
						where num='".$nums."'");

	echo "<script>
    alert('글쓰기 수정이 되었습니다.');
    location.href='view.php?bid=$bid&num=$nums&page=$page';
	</script>";
}else{
    echo "<script>
    alert('글쓰기 수정에 실패했습니다.');
    history.back();</script>";
}
	

?>

