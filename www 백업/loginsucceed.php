<?php
    $db = mysqli_connect('localhost','root','1234','test');
    session_start();
?>

<! ID가 DB에 있는지 확인하기>
<?php
    $MyID = $_POST["ID"];
    $MyPW = $_POST["PW"];
    $select_query_ID = mysqli_query($db, "select * from testsignup where id='$MyID';");

    $dbTestSignUp = mysqli_fetch_assoc($select_query_ID);
    
    if($_POST["ID"] == ""){
        $_SESSION["Succeed"] = "IDblank";
?>        
    <meta http-equiv="refresh" content='0; url=index.php'>
<?php
    }
    else if($_POST["PW"] == ""){
        $_SESSION["Succeed"] = "PWblank";
?>        
    <meta http-equiv="refresh" content='0; url=index.php'>
<?php
    }
    else if($_POST["ID"] == $dbTestSignUp["id"] && $_POST["PW"] == $dbTestSignUp["pw"]){
        $_SESSION["Succeed"] = "TRUE";
        $_SESSION["MyID"] = $_POST["ID"];
?>
    <meta http-equiv="refresh" content='0; url=index.php'>
<?php
    }
    else{
        $_SESSION["Succeed"] = "FALSE";
?>        
    <meta http-equiv="refresh" content='0; url=index.php'>
<?php
    }
?>