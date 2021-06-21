<?php
 
        $connect = mysqli_connect('localhost', 'ssg_board', 'ssg_tony', 'SSG_Board') or die("fail");
 
 
        $id=$_POST[id];
        $pw=$_POST[pw];
        $email=$_POST[email];
 
        $date = date('Y-m-d H:i:s');
 
        //입력받은 데이터를 DB에 저장
        $query = "insert into member (id, pw, mail, date ) values ('$id', '$pw', '$email', '$date')";
 
 
        $result = $connect->query($query);
 
        //저장이 됬다면 (result = true) 가입 완료
        if($result) {
		session_start();
		$_SESSION['userid']=$id;
		if(isset($_SESSION['userid'])){
        ?>      <script>
                alert('가입 되었습니다.');
                location.replace("../index.php");
                </script>
 
<?php  } }
        else{
?>              <script>
                        
                        alert("fail");
                </script>
<?php   }
 
        mysqli_close($connect);
?>


