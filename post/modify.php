<?php    $connect = mysqli_connect("localhost", 'ssg_board', 'ssg_tony', 'SSG_Board') or die("connect fail");
                $id = $_GET[id];
                $number = $_GET[number];
                $query = "select title, content, date, id from board where number=$number";
                $result = $connect->query($query);
                $rows = mysqli_fetch_assoc($result);
 
                $title = $rows['title'];
                $content = $rows['content'];
                $usrid = $rows['id'];
		$former_url = $_GET['furl']; 
                session_start();
 
 
                $URL = $former_url; 
 
                if(!isset($_SESSION['userid'])) {
        ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("<?php echo $URL?>");
                        </script>
        <?php   }
                else if($_SESSION['userid']==$usrid) {
        ?>
<head>
<title>글 수정</title>
</head>
<body>
        <form method = "get" action = "modify_action.php">
        <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=#ccc><font color=blue> 글수정</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                <tr>
                        <td>작성자</td>
                        <td><input name=number value="<?php echo $number?>" hidden=true> <?php echo $_SESSION['userid']?></td>
                        </tr>
 
                        <tr>
                        <td>제목</td>
                        <td><input type = text name = title size=60 value="<?=$title?>"></td>
                        </tr>
 
                        <tr>
                        <td>내용</td>
                        <td><textarea name = content cols=85 rows=15><?=$content?></textarea></td>
                        </tr>
 
                        </table>
 
                        <center>
                        <input style="border:none;color:white;padding 15px 32px; font-size:16px; background-color:#4CAF50;" type = "submit" value="작성">
                        </center>
                </td>
                </tr>
        </table>
        <?php   }
                else {
        ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("<?php echo $URL?>");
                        </script>
        <?php   }
        ?>
</body>
