<?php
    $db = mysqli_connect('localhost','root','1234','test');
    session_start();
?>
<?php
    if(isset($_SESSION["MyID"])){
        $MyID = $_SESSION["MyID"];
        if($MyID != "Admin"){
            $select_query_IdAnimStyle = mysqli_query($db, "select * from idanimstyle where id = '$MyID';");
            if($select_query_IdAnimStyle){
            $IdAnimStyle = mysqli_fetch_assoc($select_query_IdAnimStyle);
            $IdAnimStyle_stylename = $IdAnimStyle["stylename"];
                if($IdAnimStyle_stylename == "NameAnim"){
                $IdNameAnim = $IdAnimStyle["css"];
                }
            }    
        }
        else if($MyID == "Admin"){
            $select_query_AdminNameEvent = mysqli_query($db, "select * from engine where keyword = 'AdminNameEvent';");
    $AdminNameEvnet = mysqli_fetch_assoc($select_query_AdminNameEvent);
    $AdminNameEvent_code = $AdminNameEvnet["descript"];
        }
    }
 ?>
<!DOCTYPE html>
<html>
<head>
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"></script>
    <style>
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
        .DBBox{
            border: 3px solid;
            width: 170px;
            height: 140px;
        }
        <?php
            echo "$IdNameAnim";
            echo "$AdminNameEvent_code";
        ?>
   
    </style>
</head>
<body>
    <!시작페이지>
    <a href="PostList.php">게시글 목록</a>
    <?php
        if(isset($_SESSION["Succeed"])){
            if($_SESSION["Succeed"] == "TRUE"){
                if($MyID == "Admin"){
                    echo "$AdminNameEvent_code";
    //<meta http-equiv="refresh" content="0; url=admin.php">
    ?>
    <!-- 관리자 로그인 -->
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
    
    <?php
                }
                else{
                     echo "$IdNameAnim";
    ?>
        <!-- 일반 로그인 -->
        <div class="MainBox">
            <form action="search.php" method="get">
                <input type="text" name="keyword">
            </form>
        </div>
        <div class="LoginBox">
            <div class="NameAnim"><?php echo "$MyID";?>님 환영합니다</div>
             <form action="Logout.php" method="post">
                <input type="submit" value="로그아웃">
            </form>
        </div>
    <?php
                }
            }
            else if($_SESSION["Succeed"] == "FALSE"){
    ?>
    <!-- 아이디 없거나 비밀번호 틀림 -->
    <div class="MainBox"></div>
    <div class="LoginBox">
    <form action="loginsucceed.php" method="post">
        <input type="text" name="ID">
        <input type="text" name="PW">
        <div style="color:red">가입하지 않은 아이디이거나, 잘못된 비밀번호입니다.</div>
        <input type="submit" value="로그인">
    </form>
    <form action="signup.php" method="post">
        <input type="submit" value="회원가입">
    </form>
    </div>
    
    <?php
            }
            else if($_SESSION["Succeed"] == "IDblank"){
    ?>
   <!아이디 빈칸>
    <div class="MainBox"></div>
    <div class="LoginBox">
    <form action="loginsucceed.php" method="post">
        <input type="text" name="ID">
        <div style="color:red">아이디를 입력해주세요.</div>
        <input type="text" name="PW">
        <input type="submit" value="로그인">
    </form>
    <form action="signup.php" method="post">
        <input type="submit" value="회원가입">
    </form>
        
    </div>
    
    <?php
            }
            else if($_SESSION["Succeed"] == "PWblank"){
    ?>
    <!-- 비밀번호 빈칸 -->
    <div class="MainBox"></div>
    <div class="LoginBox">
    <form action="loginsucceed.php" method="post">
        <input type="text" name="ID">
        <input type="text" name="PW">
        <div style="color:red">비밀번호를 입력해주세요.</div>
        <input type="submit" value="로그인">
    </form>
    <form action="signup.php" method="post">
        <input type="submit" value="회원가입">
    </form>
        
    </div>
    <?php
            }
        }
        else{
    ?>
    <div class="MainBox"></div>
    <div class="LoginBox">
    <form action="loginsucceed.php" method="post">
        <input type="text" name="ID">
        <input type="text" name="PW">
        <input type="submit" value="로그인">
    </form>
    <form action="signup.php" method="get">
        <input type="submit" value="회원가입">
    </form>
    </div>
    <?php
        }
    ?>
    <!로그아웃 함수>

    
    <!-- 페이지 넘기기 -->
    
    <iframe class="PageList" style="border:none" src="PostList.php" width="360px"></iframe>
    <button class="previous" style="position:absolute ,top:300px, left:200px;" onclick="Previous()">이전</button>
    <button class="next" onclick="next()">다음</button>
    
    <script type="text/javascript">
        var srcList = new Array("PostList.php", "PageList/page1.php", "PageList/page2.php", "PageList/page3.php", "PageList/page4.php", "PageList/page5.php", "PageList/page6.php", "PageList/page7.php", "PageList/page8.php","PageList/page9.php");
        var i = 0;
        function Previous(){
            if(0<= i-1){
                --i;
            $(".PageList").detach();
            $("body").append(`<iframe class="PageList" style="border:none" src=${srcList[i]} width="360px"></iframe>`);
            }
            
        }
        function next(){
            if(i+1 < srcList.length){
                ++i;
                $(".PageList").detach();
                $("body").append(`<iframe class="PageList" style="border:none" src=${srcList[i]} width="360px"></iframe>`);   
               }
            
        }
    </script>
    <form action="uploading.php" method="post" enctype="multipart/form-data">
        <input type="file" name="upload_file"/>
        <input type="submit" value="업로드"/>
    </form>

</body>
</html>