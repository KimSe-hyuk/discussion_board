<!--write.jsp에 입력된 글을 데이터베이스에 추가.-->
<?php

require("db_connect.php");




$bid = empty($_REQUEST["bid"]) ? "free" : $_REQUEST["bid"];


$title = $_POST['title'];
$username = $_POST['writer'];
$content = $_POST['content'];
$a = $_POST['a'];

$resFile = null;
if ( ! empty( $_FILES['imgFile']['name']  ) ) {

$tempFile = $_FILES['imgFile']['tmp_name'];


$fileTypeExt = explode("/", $_FILES['imgFile']['type']);


$fileType = $fileTypeExt[0];


$fileExt = $fileTypeExt[1];


$extStatus = false;

	switch($fileExt){
		case 'jpeg':
		case 'jpg':
		case 'gif':
		case 'bmp':
		case 'png':     
			$extStatus = true;
			break;
		
		default:
			echo "<script>
				alert('파일 업로드에 실패하였습니다.');
				history.back();</script>";
			break;
	} 

if($fileType == 'image'){
	if($extStatus){
		$resFile = "img/{$_FILES['imgFile']['name']}";
		$imageUpload = move_uploaded_file($tempFile, $resFile);
		
		if($imageUpload == true){
		}else{			
			echo "<script>
			alert('파일 업로드에 실패하였습니다.');
			history.back();</script>";
		}
	}	
	else {
			echo "<script>
			alert('파일 확장자는 jpg, bmp, gif, png 이어야 합니다.');
			history.back();</script>";
	}	
}else {
	echo "<script>
			alert('이미지 파일이 아닙니다.');
			history.back();</script>";
	}
}




$mqq = $db->query("
ALTER TABLE board ;
SET @COUNT = 0;
UPDATE board  SET num = @COUNT:=@COUNT+1 where bid='$bid';
"); 
$mqq->closeCursor();

$mqq = $db->query("ALTER TABLE `board` AUTO_INCREMENT=1;
SET @COUNT = 0;
UPDATE `board` SET keey = @COUNT:=@COUNT+1;");

if($username && $title && $content){
	
	require("db_connect.php");
	$date =   date("Y-m-d H:i:s");
	
    $db->exec("insert into board (writer,title,content,regtime,hits,bid,num,img) 
	values('$username','$title','$content','$date',0, '$bid',1,'$resFile')"); 
	
	$mqq = $db->query("
	ALTER TABLE board ;
	SET @COUNT = 0;
	UPDATE board  SET num = @COUNT:=@COUNT+1 where bid='$bid';
	"); 
		
		
		


echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='../$a.php?bid=$bid';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>