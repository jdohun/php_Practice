<script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous">
</script>
<?php
    $db = mysqli_connect('localhost','root','1234','test');
    session_start();
    
    $keyword = $_POST["keyword"];
    $descript = $_POST["descript"];
    $imgpath = $_POST["imgpath"];
    $tag = $_POST["tag"];
    if($keyword != ""){
        mysqli_query($db, "insert into engine values('$keyword','$descript','$imgpath','$tag');");
    }
    else{   
?>
<script type="text/javascript">
    alert("입력된 Keyword가 없습니다");
</script>
<?php
    }
?>
    <meta http-equiv="refresh" content='0; url=admin.php'>