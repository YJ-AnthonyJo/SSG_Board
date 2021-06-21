<?php
	$connect = mysqli_connect('localhost', 'ssg_board','ssg_tony','SSG_Board') or die('fail connection');
	$id = $_GET[id];
	$number = $_GET[number];


$query = "select title, content, date, id from board where number=$number";
                $result = $connect->query($query);
                $rows = mysqli_fetch_assoc($result);

                $title = $rows['title'];
                $content = $rows['content'];
                $usrid = $rows['id'];

                session_start();


                $URL = "./view.php?number=$number";

                if(!isset($_SESSION['userid'])) {
        ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("<?php echo $URL?>");
                        </script>
        <?php   }
                else if($_SESSION['userid']==$usrid) {
			$query = "DELETE FROM board WHERE number='$number';";
			if($connect->query($query)){?>
				<script>alert("삭제되었습니다.");
				location.replace('../index.php');
				</script>
		 <?php }
			else { echo 'Fail'; }
		}
		else{
			?><script>
                                alert("권한이 없습니다.");
                                location.replace("<?php echo $URL?>");
                        </script>
	<?php }?>
		
