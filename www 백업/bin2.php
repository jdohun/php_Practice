<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
        $remove_tag ="";
        $test = $_POST["test"];
        $remove_li = explode("<script>",$test);
        for($i = 0; $i < count($remove_li); $i++){
            $remove_tag = $remove_tag.$remove_li[$i];
        }
        echo $remove_tag ;
    ?>
</body>
</html>