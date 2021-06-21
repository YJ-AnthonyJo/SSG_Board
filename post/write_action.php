<?php
                $connect = mysqli_connect("localhost", "ssg_board", "ssg_tony", "SSG_Board") or die("fail due to mysql");
                
                $id = $_POST[id];                      //Writer
                $pw = $_POST[pw];                        //Password
                $title = $_POST[title];                  //Title
                $content = $_POST[content];              //Content
                $date = date('Y-m-d H:i:s');            //Date
 
                $URL = '../index.php';                   //return URL
 
                $query = "insert into board (number,title, content, date, hit, id) 
                        values(null,'$title', '$content', '$date',0, '$id');";
echo $query; 
 
                $result = $connect->query($query);
                if($result){
?>                  <script>
                        alert("<?php echo "글이 등록되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
                }
                else{
                        echo "FAIL";
                }
 
                mysqli_close($connect);
?>
