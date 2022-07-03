<?php
    $filename= basename($_FILES["upload_file"]["name"]); 
    $extension = explode(".",$filename);
    if($extension[1] == "PNG"){
        $tmp_name = $_FILES["upload_file"]["tmp_name"];
        $path = './'.$filename;
        move_uploaded_file($tmp_name, $path);
    }
    else{
?>
    <script type="text/javascript">
        alert("PNG 파일이 아닙니다.");
    </script>
<?php
    }
?>
    <meta http-equiv="refresh" content="0 url=index.php">