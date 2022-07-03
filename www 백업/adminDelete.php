<?php
    $db = mysqli_connect('localhost','root','1234','test');
    session_start();
?>
<?php
    $DeleteKeyword = $_POST["DeleteKeyword"];
    $Limit = $_POST["Limit"];
    $select_query = mysqli_query($db, "select * from testsignup where keyword='$DeleteKeyword';");
    
    if($DeleteKeyword){
        mysqli_query($db, "delete from engine where keyword='$DeleteKeyword' limit $Limit;");
    }
    else{
?>
<script type="text/javascript">
    alert("입력된 Keyword가 없습니다");
</script>
<?php
    }
?>
    <meta http-equiv="refresh" content='0; url=adminsearch.php'>