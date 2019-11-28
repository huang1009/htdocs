<?php
require_once("conn/connSQL.php");
require_once("conn/logInOut.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Banece蓓妮司</title>
    <link rel="icon" href="img/Banece.ico" type="image/x-icon">
    <meta name="description" content="網頁簡短描述">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!-- <link rel="stylesheet" href="css/animate.css"> -->
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
                <!--輪播-->
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/one.png" class="d-block w-100" >
                </div>
                <div class="carousel-item">
                    <img src="img/two.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="img/three.png" class="d-block w-100">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!--底部-->
        <footer class="h-100 " style="background-color:#F2E6C2 ">
            <div class="w-75 m-auto pt-5 pb-5 ">
                <p>地址：台中市北屯區瀋陽路三段0號</p>
                <p>電話：09123456789</p>
            </div>
        </footer>
    </div>
</body>

</html>