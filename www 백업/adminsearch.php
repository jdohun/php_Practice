<?php
    $db = mysqli_connect('localhost','root','1234','test');
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .DeletBox{
            display: inline-block;
            border: 3px solid;
            width: 170px;
            height: 90px;
        }
        .UpdateBox{
            display: inline-block;
            border: 3px solid;
            width: 170px;
            height: 140px;
        }
    </style>
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"></script>
</head>
<body>
    <a href="index.php">홈</a>
    <br>
    <span class="DeletBox">
        삭제할 keyword를 입력하세요
        <form action="adminDelete.php" method="post">
            <input type="text" name="DeleteKeyword">
            <input type="text" name="Limit">
            <input type="submit" value="삭제">
        </form>
    </span>
    <span class="UpdateBox">
        업데이트 할 내용을 입력하세요
        <form action="adminUpdate.php" method="post">
            <input type="text" name="UpdateKeyword">
            <input type="text" name="UpdateDescript">
            <input type="text" name="UpdateImgpath">
            <input type="text" name="UpdateTag">
            <input type="submit" value="업데이트">
        </form>
    </span>
</body>
</html>