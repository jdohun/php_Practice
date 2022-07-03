<?php
    session_start();
    $db = mysqli_connect('localhost','root','1234','test');
     $select_query_AdminNameEvent = mysqli_query($db, "select * from engine where keyword = 'AdminNameEvent';");
    $AdminNameEvnet = mysqli_fetch_assoc($select_query_AdminNameEvent);
    $AdminNameEvent_code = $AdminNameEvnet["descript"];
?>
<!DOCTYPE html>
<html>
<head>    
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"></script>
    <style>
        .DBBox{
            border: 3px solid;
            width: 170px;
            height: 140px;
        }
       .MainBox{
            border: 3px solid;
            width: 170px;
            height: 140px;
        }
        .LoginBox{
            border: 3px solid;
            width: 170px;
            height: 140px;
        }
        <?php
            echo "$AdminNameEvent_code";
        ?>
    </style>
</head>
<body>
    
    <a href="search.php?keyword=">일반 검색</a>

    <div class="DBBox">
        <form action="adminApend.php" method="post">
            <input type="text" name="keyword">
            <input type="text" name="descript">
            <input type="text" name="imgpath">
            <input type="text" name="tag">
            <input type="submit">
        </form>
        <a href="adminsearch.php">관리자 검색</a>
    </div>
    <div class="LoginBox">
        <div class="adminNameEvent">Admin님 환영합니다</div>
            <form action="Logout.php" method="post">
                <input type="submit" value="로그아웃">
            </form>
    </div>
</body>
</html>
