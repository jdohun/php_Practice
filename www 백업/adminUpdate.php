<?php
    $db = mysqli_connect('localhost','root','1234','test');
    session_start();
?>
<?php
    $UpdateKeyword = $_POST["UpdateKeyword"];
    $UpdateDescript = $_POST["UpdateDescript"];
    $UpdateImgpath = $_POST["UpdateImgpath"];
    $UpdateTag = $_POST["UpdateTag"];
    $select_query_keyword = mysqli_query($db, "select * from engine where keyword='$UpdateKeyword';");

    $DBKeyword = mysqli_fetch_assoc($select_query_keyword);
    
    if($UpdateKeyword == $DBKeyword["keyword"]){
        mysqli_query($db, "update engine set keyword='$UpdateKeyword', descript='$UpdateDescript', imgpath='$UpdateImgpath', tag='$UpdateTag' where keyword = '$UpdateKeyword' limit 1;");
    }
    else{
?>
    <script type="text/javascript">
        let confirmApend = confirm("검색된 keyword가 없습니다. 새로 추가하려면 확인 아니면 취소를 눌러주세요. ")
        if(confirmApend){
            <?php
                mysqli_query($db, "insert into engine values('$UpdateKeyword', '$UpdateDescript', '$UpdateImgpath', '$UpdateTag');");
            ?>
        }
    </script>
<?php
    }
?>
    <meta http-equiv="refresh" content='0; url=adminsearch.php'>