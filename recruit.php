<?php
require_once("conn/connSQL.php");
require_once("conn/logInOut.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Banece蓓妮司</title>
    <link rel="icon" href="img/Banece.ico" type="image/x-icon">
    <meta name="description" content="網頁簡短描述">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
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
        <!--內文-->
        <!--大標題-->
        <div class="col-12 p-0">
            <div class="jumbotron m-0 p-0 pt-5 text-center" style="background-color:unset">
                <h1 class="display-4 animated fadeInUp">加入我們</h1>
                <p class="lead">join-us</p>
                <hr class="my-4">
            </div>
        </div>



        <div class="form-group row m-auto col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 pb-5 text-center">
            <!--內容-->
            <!--LOGO-->
            <img src="img\logo.svg" class="m-auto" width="20%">
            <!--標題-->
            <label class="col-sm-12"style="font-size:4em">蓓妮司</label>
            <label class="col-sm-12"style="font-size:3em">Banece</label>
            <!--1-->
            <label class="col-sm-12"style="font-size:1.2em">台中市北屯區瀋陽路三段0號</label>
            <!--2-->
            <label class="col-sm-12"style="font-size:1.2em">09123456789</label>
            <!--3-->
            <label class="col-sm-12"style="font-size:1.2em">Banece@mail.com</label>
            <!--4-->
            <label class="col-sm-12"style="font-size:1.2em">蓓妮司誠摯邀請您的加入，為生活打造更優良、優質的生活</label>

        </div>
        <!--底部-->
        <footer class="h-100 " style="background-color:#F2E6C2;">
            <div class="w-75 m-auto pt-5 pb-5 ">
                <p>地址：台中市北屯區瀋陽路三段0號</p>
                <p>電話：09123456789</p>
            </div>
        </footer>
    </div>
</body>

</html>