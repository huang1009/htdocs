<?php
require_once("conn/connSQL.php");
require_once("conn/logInOut.php");

$checkSession = "SELECT * FROM member WHERE m_accounts=?";
$stmt = $sql_link->prepare($checkSession);
$stmt->bind_param("s", $_SESSION["UserAccounts"]);
$stmt->execute();
$stmt->bind_result($id, $accounts, $password, $name, $sex, $date, $number, $email, $address, $level);
$stmt->fetch();
$stmt->close();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Banece蓓妮司</title>
    <meta charset="utf-8">
    <link rel="icon" href="img/Banece.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/myjs.js"></script>

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
        <div style="row margin:3% auto;background-color: #FFF6E3;height:100%;">
            <div id="data" class="row m-0" >
                <div class="col-3" style="text-align: center">
                    <br>
                    <p>會員管理</p>
                    <hr>
                    <p>會員資料</p>
                    <p onclick="HS('data','course')" style="color: #666A6D">已報名課程</a></p>

                </div>
                <div class="col-9" style="text-align: center">
                    <br>
                    <p style="text-align: left;">會員資料</p>
                    <hr>
                    <?php
                    if (isset($_GET['finish']) && $_GET['finish'] == 'true') {
                        ?>
                        <div class="alert alert-success" role="alert">
                            會員資料修改成功！
                        </div>
                    <?php } ?>
                    <form action="" name="modify" method="post">
                        <div class="form-group row">
                            <label for="accounts" class="col-sm-2 col-form-label">帳號：</label>
                            <div class="col-sm-1" style="margin-top: 0.7vh"><?php echo $accounts ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">姓名：</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birthday" class="col-sm-2 col-form-label">生日：</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="date" name="date" value="<?php echo $date ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">電話：</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control " id="number" name="number" value="<?php echo $number ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">電子信箱：</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">地址：</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>">
                            </div>
                        </div>
                        <input name="action" type="hidden" value="update">
                        <button type="submit " class="btn btn-primary " style="margin-left: 20%;">修改資料</button>
                        <p></p>
                    </form>
                </div>

            </div>

            <div id="course" class="row m-0 hid">
                <div class="col-3" style="text-align:center">
                    <br>

                    <p>會員管理</p>


                    <hr>
                    <p onclick="HS('course','data')" style="color: #666A6D">會員資料</p>
                    <p>已報名課程</p>

                </div>

                <div class="col-9" style="text-align:center;">
                    <br>
                    <p style="text-align: left;">已報名課程</p>
                    <hr>
                    <table class="table col-10">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">課程名稱</th>
                                <th scope="col">課程時間</th>
                                <th scope="col">課程地點</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php
                        $connClass = "SELECT class.cs_id,course.c_name,course.c_startdate,course.c_address FROM course,class,member WHERE member.m_accounts = class.cm_accounts AND course.c_id = class.cc_id";
                        $result = mysqli_query($sql_link, $connClass);
                        $row = mysqli_fetch_assoc($result);
                        $i = 1;
                        if ($row != '') {
                            do {
                                ?>
                                <tbody>
                                    <form action="" name="action" method="post">
                                    <input type="hidden" name="action" value="dele">
                                    <input type="hidden" name="deleid" value="<?php echo $row['cs_id'] ?>">
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td><?php echo $row['c_name'] ?></td>
                                        <td><?php echo $row['c_startdate'] ?></td>
                                        <td><?php echo $row['c_address'] ?></td>
                                        <td><button type="submit" class="btn btn-danger">取消</button></td>
                                    </tr>
                                    </form>
                                </tbody>
                        <?php
                        $i++;    
                        } while ($row = mysqli_fetch_assoc($result));
                        } ?>
                    </table>

                </div>
            </div>
        </div>

        <footer style="background-color:#F2E6C2 ">
            <div class="w-75 m-auto pt-5 pb-5 " style="color:#666A6D; ">
                <p>地址：台中市北屯區瀋陽路三段0號</p>
                <p>電話：09123456789</p>
            </div>
        </footer>
    </div>
</body>

</html>