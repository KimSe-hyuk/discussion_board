<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>토론 사이트</title>
    <link rel="stylesheet" type="text/css"href="css/common.css">
    <link rel="stylesheet" type="text/css"href="css/header.css">
    <link rel="stylesheet" type="text/css"href="css/main.css">
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
		
      <a href="login/login_name.php">로그인</a>  
	  <a href="index.php">Home</a>
        </nav>
        <nav id="top_menu2">
          <ul>
       <div class="nor1" onclick="location.href='normal.php?bid=normal'"> <li>일반주제</a> </li></div>
       <div class="nor1" onclick="location.href='yesno.php?bid=yesno';">  <li>찬반주제</a> </li></div>
       <div class="nor1" onclick="location.href='free.php?bid=free';"> 	  <li>자유게시판</a> </li></div>
       <div class="nor1" onclick="location.href='board.php?bid=board';">  <li>질문게시판</a> </li></div>
          </ul>
        </nav><!--top_menu2 -->
      </header>
      <section id="main">
          <img id="img" src="img/main_img.png" alt="">
		<div id="bo1">
		찬반 게시판
		</div>
          <!--자유 게시판1-->
           <div class="border1">
             <?php
               require("db_connect.php");

                $query = $db->query("select * from board where bid='yesno' order by num desc limit 0,10"); 
             ?>
            <table id=border1>

                <tr>
                    <th class="num"    >번호    </th>		
                    <th class="title"  >제목    </th>
                    <th class="writer" >작성자  </th>
                    <th class="regtime">작성일시</th>
                    <th class="hits"   >조회수  </th>
                </tr>
            	<?php
				$bid = "yesno";
            	while ($row = $query->fetch()) {
					$boardtime = $row['regtime']; 
			
             $timenow = date("Y-m-d H:i:s"); //$timenow변수에 현재 시간 Y-M-D를 넣음
			$beforeDay = date("Y-m-d H:i:s", strtotime($timenow." -24 hours"));

          if($timenow>=$boardtime&&$beforeDay<=$boardtime){
            $img = "<img src='img/new.png' alt='new' title='new' />";
          }else{
            $img ="";
        }  
				$title=$row["title"]; 
              if(strlen($title)>10)
              { 
                //title이 20을 넘어서면 ...표시
                $title=str_replace($row["title"],mb_substr($row["title"],0,5,"utf-8")."...",$row["title"]);
              }
			   $data = $db->query ("select count(*) from reply where con_num='".$row['num']."'and board='free'")->fetchColumn(); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택	
            
            	?>
                <tr class="borard_link">
                    <td><?php echo"$row[num]"?></td>
                    <td style="text-align:left;">
                        <a href="board/view.php?bid=<?=$bid?>&num=<?php echo"$row[num]"?>"><?php echo $title;?><?php  echo"[",$data,"]"?><?php echo $img; ?></a></td>
                    <td><?php echo"$row[writer]"?></td>
                    <td><?php echo"$row[regtime]"?></td>
                    <td><?php echo"$row[hits]"?></td>
                </tr>
             <?php
            	}
             ?>
            </table>
            <br>
            <!--    <input type="button" value="글쓰기" onclick="location.href='board/write.php'">-->
            </div>
     
	   <!--인반주제게시판2-->
		  
           <div class="border2">
		   <div id="bo2">
		일반 주제 게시판
		</div>
              <?php
               require("db_connect.php");

                $query = $db->query("select * from board where bid='normal' order by num desc limit 0,10"); 
              ?>
            <table id=border2>

                <tr>
                    <th class="num"    >번호    </th>
                    <th class="title"  >제목    </th>
                    <th class="writer" >작성자  </th>
                    <th class="regtime">작성일시</th>
                    <th class="hits"   >조회수  </th>
                </tr>
              <?php
              $bid = "normal";
			  while ($row = $query->fetch()) {
				  $boardtime = $row['regtime']; 
  
             $timenow = date("Y-m-d H:i:s"); //$timenow변수에 현재 시간 Y-M-D를 넣음
			$beforeDay = date("Y-m-d H:i:s", strtotime($timenow." -24 hours"));


         if($timenow>=$boardtime&&$beforeDay<=$boardtime){
            $img = "<img src='img/new.png' alt='new' title='new' />";
          }else{
            $img ="";
        }  
				$title=$row["title"]; 
              if(strlen($title)>10)
              { 
                //title이 20을 넘어서면 ...표시
                $title=str_replace($row["title"],mb_substr($row["title"],0,10,"utf-8")."...",$row["title"]);
              }
			  
			  $data = $db->query ("select count(*) from reply where con_num='".$row['num']."'and board='normal'")->fetchColumn(); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택	
             
			  ?>
                <tr class="borard_link">
                    <td><?php echo"$row[num]"?></td>
                    <td style="text-align:left;">
				          <a href="board/view.php?bid=<?=$bid?>&num=<?php echo"$row[num]"?>"><?php echo $title;?><?php  echo"[",$data,"]"?><?php echo $img; ?></a></td>
					<td><?php echo"$row[writer]"?></td>
                    <td><?php echo"$row[regtime]"?></td>
                    <td><?php echo"$row[hits]"?></td>
                </tr>
              <?php
                }
              ?>
            </table>
            <br>
        <!--    <input type="button" value="글쓰기" onclick="location.href='board/write.php'">-->
           </div>

		<!--조회수게시판3-->
		
		
           <div class="border3">
		   <div id="bo3">
		조회수
		</div>
              <?php
               require("db_connect.php");

                $query = $db->query("select * from board   order by hits desc limit 0,5"); 
	
              ?>
            <table id=border3>

                <tr>
                    <th class="num"    >게시판    </th>
                    <th class="title"  >제목    </th>
                    <th class="writer" >작성자  </th>
                    <th class="regtime">작성일시</th>
                    <th class="hits"   >조회수  </th>
                </tr>
              <?php
              
			  while ($row = $query->fetch()) {
				  $boardtime = $row['regtime']; 
  
             $timenow = date("Y-m-d H:i:s"); //$timenow변수에 현재 시간 Y-M-D를 넣음
			$beforeDay = date("Y-m-d H:i:s", strtotime($timenow." -24 hours"));


         if($timenow>=$boardtime&&$beforeDay<=$boardtime){
            $img = "<img src='img/new.png' alt='new' title='new' />";
          }else{
            $img ="";
        }  
				$title=$row["title"]; 
              if(strlen($title)>10)
              { 
                //title이 20을 넘어서면 ...표시
                $title=str_replace($row["title"],mb_substr($row["title"],0,10,"utf-8")."...",$row["title"]);
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
			$data = $db->query ("select count(*) from reply where con_num='".$row['num']."' group by board")->fetchColumn(); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택	
             if($data==''){
			$data=0;
			}
			  
			  ?>
                <tr class="borard_link">
				
                    <td><?php echo $bid?></td>
                    <td style="text-align:left;">
				          <a href="board/view.php?bid=<?="$row[bid]"?>&num=<?php echo"$row[num]"?>"><?php echo $title;?><?php  echo"[",$data,"]"?><?php echo $img; ?></a></td>
                   <td><?php echo"$row[writer]"?></td>
                    <td><?php echo"$row[regtime]"?></td>
                    <td><?php echo"$row[hits]"?></td>
                </tr>
              <?php
                }
              ?>
            </table>
            <br>
        <!--    <input type="button" value="글쓰기" onclick="location.href='board/write.php'">-->
           </div>


		<!--최신순게시판3-->
		
		
           <div class="border4">
		   <div id="bo4">
		최신순
		</div>
              <?php
               require("db_connect.php");

                $query = $db->query("select * from board   order by regtime desc limit 0,5"); 
	
              ?>
            <table id=border4>

                <tr>
                    <th class="num"    >게시판    </th>
                    <th class="title"  >제목    </th>
                    <th class="writer" >작성자  </th>
                    <th class="regtime">작성일시</th>
                    <th class="hits"   >조회수  </th>
                </tr>
              <?php
              
			  while ($row = $query->fetch()) {
				  $boardtime = $row['regtime']; 
  
             $timenow = date("Y-m-d H:i:s"); //$timenow변수에 현재 시간 Y-M-D를 넣음
			$beforeDay = date("Y-m-d H:i:s", strtotime($timenow." -24 hours"));


				 if($timenow>=$boardtime&&$beforeDay<=$boardtime){
					$img = "<img src='img/new.png' alt='new' title='new' />";
				  }else{
					$img ="";
				}  
				$title=$row["title"]; 
              if(strlen($title)>10)
              { 
                //title이 20을 넘어서면 ...표시
                $title=str_replace($row["title"],mb_substr($row["title"],0,10,"utf-8")."...",$row["title"]);
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
			$data = $db->query ("select count(*) from reply where con_num='".$row['num']."' group by board")->fetchColumn(); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택	
            if($data==''){
			$data=0;
			}
			  ?>
                <tr class="borard_link">
                     <td><?php echo $bid?></td>
                    <td style="text-align:left;">
				          <a href="board/view.php?bid=<?="$row[bid]"?>&num=<?php echo"$row[num]"?>"><?php echo $title;?><?php  echo"[",$data,"]"?><?php echo $img; ?></a></td>
                     <td><?php echo"$row[writer]"?></td>
                    <td><?php echo"$row[regtime]"?></td>
                    <td><?php echo"$row[hits]"?></td>
                </tr>
              <?php
                }
              ?>
            </table>
            <br>
        <!--    <input type="button" value="글쓰기" onclick="location.href='board/write.php'">-->
           </div>
<footer>
    <p>
        <span>작성자 : 김세혁</span><br/>
        <span>이메일 : rlatpgur627@gmail.com</span><br/>
        <span>2021 신구대학교</span>
    </p>
</footer>
      </section><!-- main-->
     </div><!-- all-->
  </body>
</html>

