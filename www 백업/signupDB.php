<?php
    $db = mysqli_connect('localhost','root','1234','test');
    session_start();
?>
<?php
    $SignUpName = $_POST["SignUpName"];
    $SignUpID = $_POST["SignUpID"];
    $SignUpPW = $_POST["SignUpPW"];
    $select_query = mysqli_query($db, "select * from testsignup where id='$SignUpID';");

    $dbID = mysqli_fetch_assoc($select_query);
    if($dbID){
          $_SESSION["SignUpSucceed"] = "FID";
?>
    <meta http-equiv="refresh" content='0; url=signup.php'>
<?php
    }
    else if($_POST["SignUpPW"] != $_POST["PWCheck"]){
        $_SESSION["SignUpSucceed"] = "FPW";
?>
    <meta http-equiv="refresh" content='0; url=signup.php'>
<?php
    }
    else{
        $_SESSION["SignUpSucceed"] = "SignUpSucceed";
        mysqli_query($db, "insert into testsignup values('$SignUpName', '$SignUpID', '$SignUpPW');");
?>
    <meta http-equiv="refresh" content='0; url=index.php'>

    <!--
<meta http-equiv="refresh" content='0; url=CongratulationSignUp.php'>
-->

<?php
    }
?>

<?php
/*
$result = mysqli_query($db, "select * from testsignup where id='A');");
$a = mysqli_fetch_array($result);
$a[0];
$DBColum = mysqli_fetch_assoc($result);
$DBColum["id"];
*/
?>