<?php
    session_start();
    $db = mysqli_connect("localhost","root","1234","test");
?>

<?php
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php

    $TagSearch = $_GET["Tag"];
    $select_query_song = mysqli_query($db, "select * from vediotaglist where Tag like '%$TagSearch%'");

    while($vedio_tag = mysqli_fetch_array($select_query_song)){
        ?>
        <iframe width="703" height="395" src="https://www.youtube.com/embed/<?php echo $vedio_tag[1] ;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <?php
    }
    ?>
</body>
</html>