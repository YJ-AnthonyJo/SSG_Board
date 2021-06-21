<?php
                $connect = mysqli_connect('localhost', 'ssg_board', 'ssg_tony', 'SSG_Board');
                $number = $_GET['number'];
                session_start();
		$query = "update board set hit = hit+1 where number=$number;";
		$connect->query($query);

                $query = "select title, content, date, hit, id from board where number =$number";
                $result = $connect->query($query);
                $rows = mysqli_fetch_assoc($result);
        ?>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
<table align=center> 
  <caption style='font-size:20;'><?php echo $rows['title']?></caption>
  <tr>
    <td>작성자</td>
    <td><?php echo $rows['id']?></td>
<td>조회수</td>
<td><?php echo $rows['hit']?></td>
  </tr>
<tr>
<td colspan='4'><?php echo $rows['content']?></td>
</tr>
</table> 
        <!-- MODIFY & DELETE -->
        <div class="view_btn" align=center>
                <button class="view_btn1" onclick="location.href='../index.php'">목록으로</button>
                <button class="view_btn1" onclick="location.href='./modify.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>&furl=view.php?number=<?=$number?>'">수정</button>
 
                <button class="view_btn1" onclick="location.href='./delete.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">삭제</button>
        </div>
