<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"></script>
    <style>
        .SignUpBox{
            border: 3px solid;
            width: 300px;
            height: 125px;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_SESSION["SignUpSucceed"])){
            if($_SESSION["SignUpSucceed"] === "FPW"){
    ?>
        <div class="SignUpBox">
            <form action="signupDB.php" method="post">
                <span>이름</span>
                <input type="text" name="SignUpName"><br>
                <span>ID</span>
                <input type="text" name="SignUpID"><br>
                <span>비밀번호</span>
                <input type="text" name="SignUpPW"><br>
                <span>비밀번호 확인</span>
                <input type="text" name="PWCheck"><br>
                <span style="color:red">비밀번호가 일치하지 않습니다</span>
                <input type="submit" value="회원저장">
            </form>
        </div>  
    <?php
            }
            else if($_SESSION["SignUpSucceed"] === "FID"){
    ?>
        <div class="SignUpBox">
            <form action="signupDB.php" method="post">
                <span>이름</span>
                <input type="text" name="SignUpName"><br>
                <span>ID</span>
                <input type="text" name="SignUpID"><br>
                <span>비밀번호</span>
                <input type="text" name="SignUpPW"><br>
                <span>비밀번호 확인</span>
                <input type="text" name="PWCheck">
                <span style="color:red">아이디가 중복됩니다</span>
                <input type="submit" value="회원저장">
            </form>
        </div>
    <?php
            }
            else{
    ?>
        <div class="SignUpBox">
            <form action="signupDB.php" method="post">
                <span>이름</span>
                <input type="text" name="SignUpName"><br>
                <span>ID</span>
                <input type="text" name="SignUpID"><br>
                <span>비밀번호</span>
                <input type="text" name="SignUpPW"><br>
                <span>비밀번호 확인</span>
                <input type="text" name="PWCheck">
                <input type="submit" value="회원저장">
            </form>
        </div>
    <?php
            }
        }
        else{
    ?>
        <div class="SignUpBox">
        <form action="signupDB.php" method="post">
            <span>이름</span>
            <input type="text" name="SignUpName"><br>
            <span>ID</span>
            <input type="text" name="SignUpID"><br>
            <span>비밀번호</span>
            <input type="text" name="SignUpPW"><br>
            <span>비밀번호 확인</span>
            <input type="text" name="PWCheck">
            <input type="submit" value="회원저장">
        </form>
        </div>
    <?php
        }
    ?>
</body>
</html>