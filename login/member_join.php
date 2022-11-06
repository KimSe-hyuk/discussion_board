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

	if(!($id && $pw && $name)) {
		
?>
	<script>
		alert('빈칸 없이 입력해야 합니다.');
		history.back();
	</script>
<?php
	}else if($db->query("select count(*) from member where id='$id'")->fetchColumn() > 0){
?>		
	<script>
		alert('이미 등록된 아이디입니다');
		history.back();
	</script>	
<?php
	}else if($db->query("select count(*) from member where name='$name'")->fetchColumn() > 0){
?>		
	<script>
		alert('이미 등록된 닉네임입니다');
		history.back();
	</script>	
<?php
	}else{
		$db->exec("insert into member values('$id', '$pw', '$name')");
?>
	<script>
		alert('가입이 완료되었습니다.');
		window.close();
	</script>	
<?php
	}
?>
</body>
</html>
