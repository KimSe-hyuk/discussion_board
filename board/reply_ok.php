<?php
	require("db_connect.php");

	$bid = empty($_REQUEST["bid"]) ? "free" : $_REQUEST["bid"];
	
	$yesno=$_REQUEST["yesno"];
	
	session_start();
	if(empty($_SESSION["userId"])){             
	//로그인 되지 않은 상태이면
	echo "<script>alert('로그인 하세요.'); 
        history.back();</script>";
	}else{
	 $con = $_GET['num'];
   $name=$_SESSION["userId"];

	
    if($con && $_POST['content']){
    $sql =  $db->query("insert into reply(con_num,name,content,board,yesno) values('".$con."','".$name."','".$_POST['content']."','".$bid."','".$yesno."')");
       
	   echo "<script>alert('댓글이 작성되었습니다.'); 
       location.href='view.php?bid=$bid&num=$con';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
	
	}
?>
