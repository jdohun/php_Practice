<!DOCTYPE html>
<html>
<head>
    <style>
        img{
            height: 100px;
            width: 100px;
            background-size: cover;
        }
        .MainBox{
            border: 3px solid;
            width: 170px;
            height: 140px;
        }
        .imgzone{
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
    <?php
        session_start();
        $db = mysqli_connect('localhost','root','1234','test');
    ?>
    <a href="index.php">홈</a>
    <div class="MainBox">
        <form action="search.php" method="get">
            <input type="text" name="keyword">
        </form>
    </div>
    <?php
        $KeyWord = $_GET["keyword"];
        $select_query = mysqli_query($db, "select * from engine where keyword='$KeyWord';");
        
        $dbKeyword = mysqli_fetch_assoc($select_query);
        $dbDescript = $dbKeyword["descript"];
        $dbImage = $dbKeyword["imgpath"];
        $tagList = explode(",", $dbKeyword["tag"]);
        if($dbKeyword){
    ?>
    
    <div><h2><?php echo $dbDescript ?></h2></div>
    <span calss="img" style="display:inline-block; background-image:url(<?php echo $dbImage;?>); background-size:cover; height:100px; width:100px;"></span>
    <br>
    <?php
        for($i = 0; $i < count($tagList); $i++){
    ?>
    <a href="search.php?keyword=<?php echo $tagList[$i]; ?>">#<?php echo $tagList[$i];?></a>
    <?php
        if($i+1 != count($tagList)){
            echo ",";
        }   }   }
    ?>
</body>
</html>