<?php
    $db = mysqli_connect('localhost','root','1234','test');
    $select_query = mysqli_query($db, "select * from testpost order by writer");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <a href="index.php">홈</a>
    <ul>
        <li>
            <span style="display:inline-block;width:80px;height:30px;">제목</span>
            <span style="display:inline-block;width:80px;height:30px;">작성자</span>
            <span style="display:inline-block;width:80px;height:30px;">문서번호</span>
        </li>
<?php
    while($PostList = mysqli_fetch_assoc($select_query)){
        $PostTitle =  $PostList["Title"];
        $Postwriter = $PostList["writer"];
        $Postnum = $PostList["num"];
?>
    <li>
        <span style="display:inline-block;width:80px;height:30px;"><?php echo $PostTitle ; ?></span>
        <span style="display:inline-block;width:80px;height:30px;"><?php echo $Postwriter ; ?></span>
        <span style="display:inline-block;width:80px;height:30px;"><?php echo $Postnum ; ?></span>
<?php
    if(isset($_SESSION["MyID"])){
        $MyID = $_SESSION["MyID"];
        $select_query_writer = mysqli_query($db, "select * from testpost where writer='$MyID'");
        $IdCheck = mysqli_fetch_assoc($select_query_writer);

        if($MyID == $Postwriter || $MyID == "Admin"){
?>    
        <form action="PostDelete.php" method="post">
            <input type="hidden" value="<?php echo $PostTitle;?>" name="PostTitle">
            <input type="submit" value="삭제">
        </form>
<?php
        }
    }
?>
    </li>
<?php
    }
?>
        </ul>
</body>
</html>