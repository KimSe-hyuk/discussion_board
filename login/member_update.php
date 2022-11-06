<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
	$id =isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
	$pw =isset($_REQUEST["pw"]) ? $_REQUEST["pw"] : "";
	$name =isset($_REQUEST["name"]) ? $_REQUEST["name"] : "";
	
	require("db_connect.php");

	if(!($id && $pw && $name)) {//하나라도 빈칸 있으면
		
?>
	<script>
		alert('빈칸 없이 입력해야 합니다.');
		history.back();
	</script>
<?php
	}else{
		$db->exec("update member set pw='$pw', name = '$name' where id='$id'");
		session_start();
		$_SEESSION["userName"]=$name;
?>
	<script>
		alert('수정이 완료되었습니다.');
		opener.location.reload();
		window.close();
	</script>	
<?php
	}
?>
</body>
</html>
