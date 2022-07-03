<?php
    $db = mysqli_connect('localhost','root','1234','test');
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
    $MyID = $_SESSION["MyID"];
    $PostTitle = $_POST["PostTitle"];
    ?>
    <script type="text/javascript">
        let confirmTitle = confirm("<?php echo $PostTitle?> 게시물을 삭제하시겠습니까?")
        if(confirmTitle){
            <?php
                mysqli_query($db, "delete from testpost where Title='$PostTitle'AND writer='$MyID'");
            ?>
        }
    </script>
</body>
</html>
    <meta http-equiv="refresh" content='0; url=PostList.php'>