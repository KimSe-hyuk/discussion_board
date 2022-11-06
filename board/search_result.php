       <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
   
	<link rel="stylesheet" type="text/css"href="../css/common.css">
    <link rel="stylesheet" type="text/css"href="../css/header.css">
	<link rel="stylesheet" type="text/css"href="../css/nomer.css">
</head>
<body>
<body>
 <div id="all">
      <header>
	  <div id="search_box">
    <form action="search_result.php" method="get">
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
            <div class="nor1"  onclick="location.href='../normal.php?bid=normal'"> <li>일반주제 </li></div>
            <div class="nor1" onclick="location.href='../yesno.php?bid=yesno';">  <li>찬반주제 </li></div>
            <div class="nor1" onclick="location.href='../free.php?bid=free';"> 	  <li>자유게시판 </li></div>
            <div class="nor1" onclick="location.href='../yesno.php?bid=yesno';">  <li>질문게시판</li></div>
          </ul>
        </nav>
      </header>
 <section id="main">
<div class="border1">
<?php
$catagory = $_GET['catgo'];


if ('titles' == $catagory) {
    $catagory  = 'title';
    $catagory2 = 'content';
} else {
    $catagory2 = $catagory;
}

$search_con = $_GET['search'];
require("db_connect.php");
$sql2 = $db->query("select count(*)  from board where $catagory like '%$search_con%' or $catagory2 like '%$search_con%'")->fetchColumn();

/*
if( $catagory2=='content'){

$sql2 = $db->query("
select(
(select count(*) as cnt from board_free  board_free where $catagory like '%$search_con%' or $catagory2 like '%$search_con%') 
+

(select count(*) as cnt from board_normal  board_free where $catagory like '%$search_con%' or $catagory2 like '%$search_con%') 
)")->fetchColumn();
}else{
	$sql2 = $db->query("select count(*) from board_$bid where $catagory like '%$search_con%'or $catagory2 like '%$search_con%'")->fetchColumn();
}
*/
?>

	
            <table id=border1>
	검색어는 : <?php echo  $_GET['search']?>
    검색결과는 : <?php echo $sql2; ?> 개 이다
                <tr>
                    <th class="num"    >게시판    </th>        
                    <th class="title"  >제목    </th>
                    <th class="writer" >작성자  </th>
                    <th class="regtime">작성일시</th>
                    <th class="hits"   >조회수  </th>
                </tr>
                <?php




//dafind("NUM_LINES",5);//리스트 한 페이지에 나올 행의 수 (글의 수)
$numLines = 5; //한페이지 표시할 줄 갯수
$numLinke = 3; //한페이지에 표시할 페이지 링크 갯수
//검색


$page = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
$stat = ($page - 1) * $numLines;
$sql  = $db->query("select * from board  where $catagory like '%$search_con%' or $catagory2 like '%$search_con%' order by regtime desc limit $stat,$numLines");
/*
if( $catagory2=='content'){
	
$sql  = $db->query("
select * from board  where $catagory like '%$search_con%' or $catagory2 like '%$search_con%' 
");
}else{
	$sql  = $db->query("select * from board_$bid where $catagory like '%$search_con%' or $catagory2 like '%$search_con%' order by num desc limit $stat,$numLines");
}

*/

while ($row = $sql->fetch()) {
    
    $title = $row["title"];
    if (strlen($title) > 10) {
        //title이 20을 넘어서면 ...표시
        $title = str_replace($row["title"], mb_substr($row["title"], 0, 5, "utf-8") . "...", $row["title"]);
    }
    
    //->fetchColumn()
    $data = $db->query("select count(*) from reply where con_num='" . $row['num'] . "'and board='" . $row['bid'] . "'")->fetchColumn(); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택    
    
    $boardtime = $row['regtime']; //$boardtime변수에 board['date']값을 넣음
    
    $timenow = date("Y-m-d H:i:s"); //$timenow변수에 현재 시간 Y-M-D를 넣음
    $timerow = date("Y-m-d H-24:i:s"); //$timenow변수에 현재 시간24시간 전을 를 넣음
   // $bid     = empty($_REQUEST["bid"]) ? "free" : $_REQUEST["bid"];
    
    
    if ($boardtime <= $timenow && $timerow <= $boardtime) {
        $img = "<img src='../img/new.png' alt='new' title='new' />";
    } else {
        $img = "";
    }
   if($row["bid"]=="normal"){
				   $bid="일반주제";
			  }else if($row["bid"]=="free"){
				  $bid="자유주제";
				 }else if($row["bid"]=="yesno"){
				  $bid="찬반주제";
				 }else{
				 $bid=$row['bid'];
				 }
    
?>
               
<tr class="borard_link">
         <td><?php  echo $bid;?></td>
		 <td style="text-align:left;">
			<a href="view.php?bid=<?= $row['bid'] ?>&num=<?php  echo "$row[num]";?>&page=<?= $page ?>">
			<?php   echo "$row[title]";?><?php  echo "[", $data, "]";?><?php  echo $img;?></a></td>
		 <td><?php  echo "$row[writer]"; ?></td>
         <td><?php echo "$row[regtime]"; ?></td>
         <td><?php echo "$row[hits]";    ?></td>
</tr>
     
 <?php
}
?>
           </table>
            <br>
<?php //페이지 네이션
$firstLink = floor(($page - 1) / $numLinke) * $numLines + 1;
$lastLink  = $firstLink + $numLinke - 1;

$numRecords = $sql2;
$numPage    = ceil($numRecords / $numLines);

if ($lastLink > $numPage) {
    $lastLink = $numPage;
} //올림은 ceil
?>
<div style="width:680px; text-align:center;">
<?php
$catagory   = $_GET['catgo'];
$search_con = $_GET['search'];
if ($firstLink > 1) {
?>
    <a href="search_result.php?catgo=<?= $catagory ?>&search=<?= $search_con ?>&page=<?= $firstLink - $numLinke ?>"> 이전 </a>
<?php
}

for ($i = $firstLink; $i <= $lastLink; $i++) {
?>
    <a href="search_result.php?catgo=<?= $catagory ?>&search=<?= $search_con ?>&page=<?= $i ?>"> <?= ($i == $page) ? "<u>$i</u>" : $i ?> </a>
<?php
}

if ($lastLink < $numPage) {
?>
    <a href="search_result.php?catgo=<?= $catagory ?>&search=<?= $search_con ?>&page=<?= $firstLink + $numLinke ?>"> 다음 </a>
<?php
}
?>
</div>

<br><br>
</div>


<br>
  </section>
<footer>
    <p>
        <span>작성자 : 김세혁</span><br/>
        <span>이메일 : rlatpgur627@gmail.com</span><br/>
        <span>2021 신구대학교</span>
    </p>
</footer>
 </div><!-- all-->
</body>
</html>