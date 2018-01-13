<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>login_test_Manna</title>
<link rel="stylesheet" type="text/css" href="css/header.css">
<!-- <link rel="stylesheet" type="text/css" href="css/login.css"> -->
<style type="text/css">
body{
    background-color: #222;
}
</style>
</head>
<body>
<!-- 登入燈箱 ==============-->
<div id="lightBox">
    <div id="cancel">
        <div class="leftLine"></div>
        <div class="rightLine"></div>
    </div>
    <form class="singUp" action="loginheadforindex.php" method="post">
        <h2>會員登入</h2>
        <div class="text">
            會員帳號：<input type="text" name="memName" id="memName" value="" required placeholder="輸入帳號">
            <br>
            會員密碼：<input type="password" name="memPsw"  id="memPsw" value="" required placeholder="輸入密碼">
            <br>
        </div>
        <div class="btn">
            <input type="submit" name="" id="submit" value="登入">
            <input type="reset" name="reset" value="取消">
        </div>
    </form>
</div>
</body>
</html>