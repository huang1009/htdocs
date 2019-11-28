<?php
require_once("conn/connSQL.php");
require_once("conn/logInOut.php");
if (isset($_SESSION["UserAccounts"]) && $_SESSION["UserAccounts"] != '') {
    header("Location:mydata.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Banece蓓妮司</title>
    <link rel="icon" href="img/Banece.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid m-0 p-0">
        <!--導覽列-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light m-auto w-100 h-100 pt-4 pb-4 shadow p-0 mb-5 bg-white rounded" style="background-color:#EDEEEF!important;z-index:99;">
            <div class="m-auto col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 pt-9">
                <div class="row">
                    <!--手機導覽列-->
                    <div class="navbar-toggler col-8" style="border:0px solid transparent;">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <!--LOGO-->
                    <div class="col-4"><a href="index.php"><img src="img/logo.png" class=" img-fluid"></a></div>
                    <!--導覽列內容-->
                    <div class="col-8 m-auto w-auto">
                        <div class="collapse navbar-collapse w-100 float-right m-auto" id="navbarSupportedContent" style=" text-align:center;">
                            <ul class="navbar-nav navbar-light m-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="news.php">最新消息</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">品牌理念</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="member.php" tabindex="-1" aria-disabled="true">會員登入</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="course.php" tabindex="-1" aria-disabled="true">課程介紹</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="recruit.php">加入我們</a>
                                </li>
                            </ul>
                            <div class="loginout"><?php if (@$_SESSION["UserAccounts"] != '') {
                                                        echo $name . ',您好!<a href="?logout=true">登出</a>';
                                                    } else { ?>訪客,您好!<a href="member.php">登入</a><?php } ?></div>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
        <div class="w-100 h-100 p-0 m-auto col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 pt-9" style="background-image:url(img/01.jpg);background-position:center;;background-size:100% 100%;">
            <div class="row" style="padding:10%">
                <div class="col-12">
                    <form name="login" method="POST" action="">
                        <div style="background-color:rgba(0,0,0,0.2);padding: 20%;" class="rounded">
                            <div class="form-group row">
                                <label for="userid" class="col-sm-2 col-form-label">帳號：</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="accounts" name="accounts" value="<?php if (isset($_COOKIE["remUser"]) && ($_COOKIE["remUser"] != "")) {
                                                                                                                        echo $_COOKIE["remUser"];
                                                                                                                    } ?>" placeholder="請輸入帳號">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="psw" class="col-sm-2 col-form-label">密碼：</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($_COOKIE["remPass"]) && ($_COOKIE["remPass"] != "")) {
                                                                                                                            echo $_COOKIE["remPass"];
                                                                                                                        } ?>" placeholder="請輸入密碼">
                                </div>
                            </div>
                            <?php if (@$_GET["error"] == 1) {
                                echo '<div class="alert alert-danger" role="alert">帳號或密碼錯誤！</div>';
                            } ?>
                            <?php if (@$_GET["error"] == 2) {
                                echo '<div class="alert alert-danger" role="alert">請輸入帳號或密碼！</div>';
                            } ?>
                            <input name="action" type="hidden" value="login">
                            <button type="submit" class="btn btn-secondary float-right ml-3">登入</button>
                            <button type="button" class="btn btn-secondary float-right" onclick="location.href='registered.php'">註冊</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
        <footer style="background-color:#F2E6C2">
            <div class="w-75 m-auto pt-5 pb-5" style="color:#666A6D;">
                <p>地址：台中市北屯區瀋陽路三段0號</p>
                <p>電話：09123456789</p>
            </div>
        </footer>
    </div>
</body>

</html>