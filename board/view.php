<?php
	require("db_connect.php");
	$bid = empty($_REQUEST["bid"]) ? "free" : $_REQUEST["bid"];

		$num = $_REQUEST["num"];
		 $page = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
		
		 $hits = $db->query("select * from board where bid='$bid' and num =$num");
	
		if ($row = $hits->fetch()){
			
			
			$title   = str_replace(" ", "&nbsp;", $row["title"  ]);
			$content = str_replace(" ", "&nbsp;", $row["content"]);
			$content = str_replace("\n", "<br>", $content);


		}
		if(!empty($num) && empty($_COOKIE['board' . $num])) {
			$sql = $db->exec("update  board  set  hits = hits+1 WHERE num =$num and bid='$bid'");

	if(empty($sql)) {
	echo "<script>alert('오류가 발생했습니다.'); 
      history.back();</script>";	
	} else {
		setcookie('board' . $num, TRUE, time() + (60 * 60 * 24), '/');
	}
}
	$mainbid = empty($_REQUEST["mainbid"]) ? "" : $_REQUEST["mainbid"];

	if($mainbid=='normal'){
		$bid='normal';
	}else if($mainbid=='yesno'){
		$bid='yesno';
	}else if($mainbid=='free'){
		$bid='free';
	}
	if($bid=='normal'){
	$top1="nor";
	$top2="nor1";
	$top3="nor1";
	$top4="nor1";
	}else if($bid=='yesno'){
	$top1="nor1";
	$top2="nor";
	$top3="nor1";
	$top4="nor1";
	}else if($bid=='free'){
	$top1="nor1";
	$top2="nor1";
	$top3="nor";
	$top4="nor1";
	}else if($bid=='board'){
	$top1="nor1";
	$top2="nor1";
	$top3="nor1";
	$top4="nor";
	}
	
	$bid = empty($_REQUEST["bid"]) ? "free" : $_REQUEST["bid"];
		if(!session_id()){ 
			session_start();
		}
		
	?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">


	<link rel="stylesheet" type="text/css"href="../css/common.css">
    <link rel="stylesheet" type="text/css"href="../css/header.css">
	<link rel="stylesheet" type="text/css"href="../css/comment.css">
	<link rel="stylesheet" type="text/css"href="../css/view.css">
	
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="js/common.js"></script>

</head>
<body>
 <div id="all">
      <header>
	  <div id="search_box">
    <form action="../board/search_result.php" method="get">
      <select name="catgo">
	   <option value="titles">제목+내용</option>
        <option value="title">제목</option>
        <option value="writer">글쓴이</option>
        <option value="content">내용</option>

      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
    </div>
        <a href="../index.php"><img id="logo" src="../img/logo.png"></a>
		
        <nav id="top_menu">
		
      <a href="../login/login_name.php">로그인</a>  
	  <a href="../index.php">Home</a>
        </nav>
        <nav id="top_menu2">
          <ul>
            <div class="<?=$top1?>"  onclick="location.href='../normal.php?bid=normal'"> <li>일반주제</a> </li></div>
            <div class="<?=$top2?>" onclick="location.href='../yesno.php?bid=yesno';">  <li>찬반주제</a> </li></div>
            <div class="<?=$top3?>" onclick="location.href='../free.php?bid=free';"> 	  <li>자유게시판</a> </li></div>
            <div class="<?=$top4?>" onclick="location.href='../board.php?bid=board';">  <li>질문게시판</a> </li></div>
          </ul>
        </nav>
      </header>



         <h1><?=$title?></h1>
    <br>
  
     <div id="name">   작성자 :&nbsp;<?="$row[writer]"?>&nbsp; &nbsp;&nbsp; 작성일시 :&nbsp;<?= "$row[regtime]"?> 조회수: <?php echo"$row[hits]"?></div>
	 <br>
	<br>
		<div id = "mai">
		<img style="width:100px;vertical-align:top; "src="<?="$row[img]"?>"onerror="this.style.display='none'" alt="" >
			<tr>
				 <td id="mai"><?=$content?></td>
			</tr>
		</div>
		<br>


<br>
<input class="bu" type="button" value="목록보기" onclick="location.href='../<?=$bid?>.php?bid=<?=$bid?>&page=<?=$page?>'">
<?php
$_SESSION["userName"] = empty($_SESSION["userName"]) ? "" : $_SESSION["userName"];

	if($_SESSION["userName"]==$row['writer']){   
?>
<input class="bu" type="button" value="수정"onclick="location.href='write.php?bid=<?=$bid?>&num=<?=$num?>&page=<?=$page?>'">
<input class="bu" type="button" value="삭제"onclick="location.href='delete.php?bid=<?=$bid?>&num=<?=$num?>&page=<?=$page?>'">

<?php
	}
	?>
<br><br>
	<h3>댓글목록</h3>
<!--- 댓글 불러오기 -->
<?php if($bid=='yesno'){
	?>
<div id="columnchart_values"></div>
 <div id="piechart_3d"> </div>
<?php
}
?>

		<?php
		$numLines= 5;  //한페이지 표시할 줄 갯수
				$numLinke= 3; //한페이지에 표시할 페이지 링크 갯수
				
			   $page = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
			   $stat = ($page -1) * $numLines;
		
		 $query = $db->query("select * from reply where con_num='$num'and board ='".$bid."'order by date desc limit $stat,$numLines");
			while($reply = $query->fetch()){ 
			
			 $yes = $db->query("select count(*) from reply where con_num='$num'and board='$bid' and yesno='yes'")->fetchColumn(); 
			 $no = $db->query("select count(*) from reply where con_num='$num' and board='$bid' and yesno='no'")->fetchColumn();
			 $mid = $db->query("select count(*) from reply where con_num='$num'and board='$bid' and yesno='mid'")->fetchColumn();

		
?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
    var data = google.visualization.arrayToDataTable([
         ['Element', '', { role: 'style' }, { role: 'annotation' } ],
         ['찬성', <?= $yes;?>,'blue', 'Cu' ],
         ['반대', <?= $no;?> ,'red', 'Ag' ],
         ['중간', <?= $mid;?>, 'grey', 'Au' ],
      ]);
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 0,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "찬반",
        width: 300,
        height: 300,
        bar: {groupWidth: "80%"},
        legend: { position: "none" },
      };
	  
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  
  </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['찬성',    <?= $yes;?>],
          ['반대',    <?= $no;?>],
          ['중간',    <?= $mid;?>]
        ]);

        var options = {
          title: '찬반',
		    width:400,
        height: 300,
          is3D: true,
		  colors: ['blue', 'red', 'grey']

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
</script>
</script>
<div class="dat_all"> 

		<div class="re_<?= $reply['yesno']?>">
		<div class="<?= $reply['yesno']?>">
			<div class="dap_lo">
			<div><b>작성자: <?php echo $reply['name'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
			<?php
				if($_SESSION["userName"]=="$row[writer]"){ 
			?>
			<div class="rep_me rep_menu">
				<a class="dat_edit_bt" href="#">수정</a>
				<a class="dat_delete_bt" href="#">삭제</a>
			</div>
			<!--댓글 수정 -->
			<?php
				}else{			
			?>
			<div class="rep_me rep_menu">
				<a class="dat_edit_bt" href="#">크게보기</a>
			</div>
			<?php
				}
			?>
			<div class="dat_edit">
				<form method="post" action="reply_modify_ok.php">
					<input type="hidden" name="num" value="<?php echo $reply['num']; ?>" />
					<input type="hidden" name="name" value="<?php echo $reply['name']; ?>" />
					<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
			<?php
				if($_SESSION["userName"]=="$row[writer]"){ 
			?>
					<input type="submit" value="수정하기" >
			<?php
				}
			?>
				</form>
			</div>
			
			<!-- 댓글 삭제 -->
			<div class='dat_delete'>
				<form action="reply_delete.php" method="post">
				<input type="hidden" name="num" value="<?php echo $reply['num']; ?>" />
				<input type="hidden" name="name" value="<?php echo $reply['name']; ?>" />
					<input type="submit" value="삭제" >
					
			 		 </form>
			</div>
		
		</div>
		</div>
		</div>	
			<?php 
			} ?>
			
<!--댓글 페이지 네이션-->
<?php			


	$firstLink = floor(($page - 1)/$numLinke)*$numLines+1;
	$lastLink = $firstLink + $numLinke -1;
	
	$numRecords = $db->query("select count(*) from  reply  where  con_num='$num' and board='$bid' ")->fetchColumn(); 
	$numPage = ceil($numRecords / $numLines);
	
	if($lastLink  >$numPage){
	   $lastLink = $numPage;
	}//올림은 ceil
?>
<br>
<br>
<div style="width:970px; text-align:center;">
<?php		
		if($firstLink>1){
?>
			<a href="view.php?bid=<?=$bid?>&num=<?=$num?>&page=<?= $page - 1?>"> 이전 </a>
<?php
	 }
		
		for ($i=$firstLink; $i <= $lastLink; $i++){
?>
			<a href="view.php?bid=<?=$bid?>&num=<?=$num?>&page=<?=$i?>"> <?=($i == $page) ? "<u>$i</u>" : $i?> </a>
<?php
		}
		
		if($lastLink<$numPage){
?>
			<a href="view.php?bid=<?=$bid?>&num=<?=$num?>&page=<?=$firstLink +$numLinke?>"> 다음 </a>
<?php
		}
?>
</div>

	<!--- 댓글 입력 폼 -->

	<div class="dap_ins">
	
		
		
		<form action="reply_ok.php?bid=<?=$bid?>&num=<?php echo "$num" ?>" method="post">
		
		<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>				
				<input type="hidden" id="yesno" name="yesno" value="mid">
				<?php 
	$bid = empty($_REQUEST["bid"]) ? "free" : $_REQUEST["bid"];
if($bid=='yesno'){
	?>
				<input class="yes1"  type="button" value="찬성" onclick="document.getElementById('yesno').value='yes'">
				<input class="no1"  type="button" value="반대" onclick="document.getElementById('yesno').value='no'">
				<input class="mid1"  type="button" value="중립" onclick="document.getElementById('yesno').value='mid'">
	<?php
	}
	
	?>
			 <input type = submit  class="re_bt"  value="댓글 작성" />
			</div>
	</form>
	</div>
	<?php

	$bid = empty($_REQUEST["bid"]) ? "free" : $_REQUEST["bid"];
	if($mainbid!="board"){
              $cou = $db->query("select count(*) from  board   where bid='$bid' ")->fetchColumn(); 
			$ran = empty($ran) ? "" : $ran;
			$ran1=$ran;
		?>
			<br>
	<h2 style=" padding:20px;   border-top: 1px solid #c4c4c4;border-bottom: 1px solid #c4c4c4;">추천 글</h2>
	<br>
		<?php

		do {	
			$ran1=$ran;
			$ran=rand(1,$cou);
			while($ran==$ran1){
				$ran=rand(1,$cou);
			}

				
			$query = $db->query("select * from board  where bid='$bid' and num='$ran' order by num desc limit 0,3"); 
			  while ($row = $query->fetch()) {
				
				if(empty("$row[img]")){
					?>
				<div style="width:970px;height:100px ">

	<div >
		<td style="text-align:left;">
					 <td><img  style= "width:100px;height:70px; bottom:-10px;position:relative;"  id ="imgs" ></td>
                    <td> <a href="view.php?bid=<?=$bid?>&num=<?php echo$ran?>&page=<?=$page?>&mainbid=<?=$mainbid?>"><?php  echo"$row[title]"?></a></td>
                    <td>작성자: <?php echo"$row[writer]"?></td>
                    <td>날짜: <?php echo"$row[regtime]"?></td>
                    <td>조회수: <?php echo"$row[hits]"?></td>
	</div>
	</div>
					<?php
				}else{
				  ?>
				  
	<div style="width:970px;height:100px ">

	<div >
		<td style="text-align:left;">
					 <td><img  style= "width:100px;height:70px; bottom:-10px;position:relative;"  id ="imgs" src=<?php echo"$row[img]" ?>></td>
                    <td> <a href="view.php?bid=<?=$bid?>&num=<?php echo $ran?>&page=<?=$page?>&mainbid=<?=$mainbid?>"><?php  echo"$row[title]"?></a></td>
                    <td>작성자: <?php echo"$row[writer]"?></td>
                    <td>날짜: <?php echo"$row[regtime]"?></td>
                    <td>조회수: <?php echo"$row[hits]"?></td>
	</div>
	</div>
	<?php
				}
			$i++;
			}

		}while($i==2);
	}
	
	?>
	<footer>
    <p>
        <span>작성자 : 김세혁</span><br/>
        <span>이메일 : rlatpgur627@gmail.com</span><br/>
        <span>2021 신구대학교</span>
    </p>
</footer>
</div><!--dat_all-->

</div><!--all-->



</body>
</html>


