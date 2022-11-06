
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
  
    <meta charset="utf-8">

    <title>토론 사이트</title>
    <link rel="stylesheet" type="text/css"href="css/common.css">
    <link rel="stylesheet" type="text/css"href="css/header.css">
	<link rel="stylesheet" type="text/css"href="css/nomer.css">
	<link rel="stylesheet" type="text/css"href="css/side.css">
  </head>
  <body>
<div id="all">
    
	
      <header>
	   <div id="search_box">
    <form action="board/search_result.php" method="get">
      <select name="catgo">
	   <option value="titles">제목+내용</option>
        <option value="title">제목</option>
        <option value="writer">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
    </div>
        <a href="index.php"><img id="logo" src="img/logo.png"></a>
        <nav id="top_menu">
      <a href="login/login_name.php">로그인</a>  <a href="index.php">Home</a>
        </nav>
        <nav id="top_menu2">
          <ul>
            <div class="nor"  onclick="location.href='normal.php?bid=normal'"> <li>일반주제</li></div>
            <div class="nor1" onclick="location.href='yesno.php?bid=yesno';">  <li>찬반주제 </li></div>
            <div class="nor1" onclick="location.href='free.php?bid=free';">    <li>자유게시판</li></div>
            <div class="nor1" onclick="location.href='board.php?bid=board';">  <li>질문게시판</li></div>
          </ul>
        </nav>
      </header>
	 <body>


      <section id="main">

<div id="side">
	  <?php
	$bid = empty($_REQUEST["bid"]) ? "normal" : $_REQUEST["bid"];
	$bid='normal';
	session_start();
	$_SESSION["userId"] = empty($_SESSION["userId"]) ? "" : $_SESSION["userId"];
	if($_SESSION["userId"]=="admin"){   
	?>
<input type="button" value="게시판 생성" onclick="location.href='cre_board/cre.php?bid=<?=$bid?>'"/>
<input type="button" value="게시판 삭제" onclick="location.href='cre_board/del_bor.php?bid=<?=$bid?>&name=<?= $_REQUEST["bid"]?>'"/>

	
<?php
	}
	require("db_connect.php");
	
	$numL= 5;  //한페이지 표시할 줄 갯수
	$numLinkes= 3; //한페이지에 표시할 페이지 링크 갯수
				
	$pages = empty($_REQUEST["pages"]) ? 1 : $_REQUEST["pages"];
	$stats = ($pages -1) * $numL;
			   
			   
	$name=strlen($bid);
	$query3 = $db->query("select *  from board_list where board_name like '$bid%' order by num desc limit $stats,$numL"); 
	while ($row = $query3->fetch()) {
	$str = substr($row['board_name'], $name); 
	if($str==$_REQUEST["bid"]){ 
		$side_bord="side_bord";
	}else{
		$side_bord="side_bord1";
	}

?>          

<div class="str">    
 <td style="text-align:left;"> 
   <div class=<?=$side_bord?> onclick="location.href='normal.php?bid=<?=$str?>&pages=<?=$pages?>&mainbid=normal'"><?php echo"$str"?></div>
 </td>

 
	</div>
	 <?php	

$firstLinks = floor(($pages - 1)/$numLinkes)*$numLinkes+1;
	$lastLinks = $firstLinks + $numLinkes -1;
	$mainbid="normal";
	$numRecords = $db->query("select count(*) from  board_list  where board_name like '$mainbid%' ")->fetchColumn(); 
	$numPages = ceil($numRecords / $numL);
	if($lastLinks  >$numPages){
	   $lastLinks = $numPages;
	}//올림은 ceil

}
?>

<div class="pa">
<?php		
		if($firstLinks>1){
?>
			<a href="<?=$bid?>.php?bid=<?=$bid?>&pages=<?= $firstLinks -1 ?>"> 이전 </a>
<?php
	 }
		
		for ($i2=$firstLinks; $i2 <= $lastLinks; $i2++){
			
?>
			<a href="<?=$bid?>.php?bid=<?=$bid?>&pages=<?=$i2?>"> <?=($i2 == $pages) ? "<u>$i2</u>" : $i2?> </a>
<?php
		}
		
		if($lastLinks<$numPages){
?>
			<a href="<?=$bid?>.php?bid=<?=$bid?>&pages=<?=$lastLinks +1?>"> 다음 </a>
<?php
		}
		
?>
</div>
 </div>



        <div id="">
          <img id ="img"src="img/normal.png" alt="">
        </div>
		
		 <div class="border1">
            <table id=border1>

                <tr>
                    <th class="num"    >번호    </th>
                    <th class="title"  >제목    </th>
                    <th class="writer" >작성자  </th>
                    <th class="regtime">작성일시</th>
                    <th class="hits"   >조회수  </th>
                </tr>
          </div>  	
			<div class="border1">

            
            	<?php
				
				
				//dafind("NUM_LINES",5);//리스트 한 페이지에 나올 행의 수 (글의 수)
				$numLines= 7;  //한페이지 표시할 줄 갯수
				$numLinke= 3; //한페이지에 표시할 페이지 링크 갯수
				
			   $page = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
			   $stat = ($page -1) * $numLines;
			   
            	
			  $bid = empty($_REQUEST["bid"]) ? "free" : $_REQUEST["bid"];
              $query = $db->query("select * from board  where bid='$bid' order by num desc limit $stat,$numLines"); 

			  while ($row = $query->fetch()) {
			  $title=$row["title"]; 
              if(strlen($title)>10)
              { 
                //title이 20을 넘어서면 ...표시
                $title=str_replace($row["title"],mb_substr($row["title"],0,10,"utf-8")."...",$row["title"]);
              }

				//->fetchColumn()
			  $data = $db->query ("select count(*) from reply where con_num='".$row['num']."'and board='".$bid."'")->fetchColumn(); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택	
            	
			$boardtime = $row['regtime']; 
          $timenow = date("Y-m-d H:i:s");
			$beforeDay = date("Y-m-d H:i:s", strtotime($timenow." -24 hours"));


          if($timenow>=$boardtime&&$beforeDay<=$boardtime){
            $img = "<img src='img/new.png' alt='new' title='new' />";
          }else{
            $img ="";
        }  	
			 $yes = $db->query("select count(*) from reply where con_num='$row[num]'and board='$bid' and yesno='yes'")->fetchColumn(); 
			 $no = $db->query("select count(*) from reply where con_num='$row[num]' and board='$bid' and yesno='no'")->fetchColumn();
			 $mid = $db->query("select count(*) from reply where con_num='$row[num]'and board='$bid' and yesno='mid'")->fetchColumn();
				$imgs ="board/".$row['img'];
				?>

		
				
                <tr class="borard_link">
				
                    <td id="a" ><?php echo"$row[num] "?><img id ="imgs" src="<?=$imgs?>"onerror="this.style.display='none'" alt="" ></td>
					
                    <td style="text-align:left;">
                     <a href="board/view.php?bid=<?=$bid?>&num=<?php echo"$row[num]"?>&page=<?=$page?>&mainbid=<?=$mainbid?>"><?php  echo"$row[title]"?><?php  echo"[",$data,"]"?><?php echo $img; ?></a></td>
                    <td><?php echo"$row[writer]"?></td>
                    <td><?php echo"$row[regtime]"?></td>
					
                    <td><?php echo"$row[hits]"?></td>
					
                </tr>
				
             <?php
            	}
			?>
			</table>
			<br>
<?php			
	$firstLink = floor(($page - 1)/$numLinke)*$numLinke+1;
	$lastLink = $firstLink + $numLinke -1;
	
	$numRecords = $db->query("select count(*) from  board  where bid='$bid' ")->fetchColumn(); 
	$numPage = ceil($numRecords / $numLines);
	$mainbid="normal";
	if($lastLink  >$numPage){
	   $lastLink = $numPage;
	}//올림은 ceil

?>
<div style="width:680px; text-align:center;">
<?php		
		if($firstLink>1){
?>
			<a class="nones" href="normal.php?bid=<?=$bid?>&page=<?= $firstLink -1 ?>"> 이전 </a>
<?php
	 }
		
		for ($i=$firstLink; $i <= $lastLink; $i++){		
?>
			<a class="nones" href="normal.php?bid=<?=$bid?>&page=<?=$i?>"> <?=($i == $page) ? "<u>$i</u>" : $i?> </a>
<?php
		}
		
		if($lastLink<$numPage){
?>
			<a class="nones" style= 'margin:0;' href="normal.php?bid=<?=$bid?>&page=<?=$lastLink +1?>"> 다음 </a>
<?php
		}
		
?>
</div>

<br><br>

<input type="button" value="글쓰기"
       onclick="location.href='board/write.php?bid=<?=$bid?>&a=<?=$mainbid?>'">
	   
</div>

  </section>
<footer>
    <p>
        <span>작성자 : 김세혁</span><br/>
        <span>이메일 : rlatpgur627@gmail.com</span><br/>
        <span>2021 신구대학교</span>
    </p>
</footer>

</div><!--all-->
<br>

  </body>

</html>
