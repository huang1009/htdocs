<?php
require_once("conn/connSQL.php");
require_once("conn/logInOut.php");
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Banece蓓妮司</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        <div class="row m-auto p-0 col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 pt-9">
            <div class="col-12" style="text-align:center;">
                <br>
                <p>會員註冊</p>
                <hr>
                <?php if (isset($_GET['error']) && $_GET['error'] == '1') {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            帳號已註冊或已被使用！
                        </div>
                    <?php } ?>
                <form name="registered" method="POST" action="">
                    <div class="w-100 m-auto">
                        <br>
                        <div class="form-group row ">
                            <div class="m-auto w-50">
                                <label for="accounts" class="col-sm-4 col-form-label  float-left">帳號：</label>
                                <div class="col-sm-8 float-left">
                                    <input type="text" class="form-control" name="accounts"  id="accounts" placeholder=" "  required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="m-auto w-50">
                                <label for="password" class="col-sm-4 col-form-label float-left">密碼：</label>
                                <div class="col-sm-8 float-left">
                                    <input type="text" class="form-control" name="password" id="password" placeholder=" " required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="m-auto w-50">
                                <label for="name" class="col-sm-4 col-form-label float-left">姓名：</label>
                                <div class="col-sm-8 float-left">
                                    <input type="text" class="form-control" name="name" id="name" placeholder=" " required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="m-auto w-50">
                                <label for="birthday" class="col-sm-4 col-form-label float-left">生日：</label>
                                <div class="col-sm-8 float-left">
                                    <input type="date" class="form-control" name="birthday" id="birthday" placeholder=" " required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="m-auto w-50">
                                <label for="phone" class="col-sm-4 col-form-label float-left">電話：</label>
                                <div class="col-sm-8 float-left">
                                    <input type="text" class="form-control " name="phone" id="phone " placeholder=" " required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="m-auto w-50">
                                <label for="email" class="col-sm-4 col-form-label float-left">電子信箱：</label>
                                <div class="col-sm-8 float-left">
                                    <input type="email" class="form-control" name="email" id="email" placeholder=" " required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="m-auto w-50">
                                <label for="address" class="col-sm-4 col-form-label float-left">地址：</label>
                                <div class="col-sm-8 float-left">
                                    <input type="text" class="form-control" name="address" id="address" placeholder=" " required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group m-auto">
                        <label for="Terms">會員服務條款</label>
                        <textarea class="form-control " id="Terms" rows="14">
會員條款
    歡迎你加入成為會員， 所有申請使用會員服務之使用者，都應該詳細閱讀本站使用條款，這些使用條款訂立的目的，是為了保護會員服務的提供者以及所有使用者的利益，並構成使用者與 會員服務提供者之間的契約，使用者完成註冊手續、或開始使用會員服務時，即視為已知悉、並完全同意本使用條款的所有約定：

會員保管密碼及通知的義務
    1.會員帳號及密碼，不能重複登錄。
    2.會員應該妥善保管密碼，不可以將密碼洩露或提供給其他人知道或使用；以同一個會員帳號和密碼進入後所進行的所有行為，都將被認為是該會員本人和密碼持有人的行為。
    3.會員註冊時必須填寫確實之個人資料，若發現有不實登錄時，得以暫停或終止其會員資格，若違反中華民國相關法律，亦將依法追究。
    4.會員如果發現或懷疑有第三人使用其會員帳號或密碼，應該立即通知，採取必要的必要的防範措施。
   
會員的隱私權保障
    &#8226;除了以下四點情況：
    1.基於法律之規定。
    2.受司法機關或其他有權機關基於法定程序之要求。
    3.在緊急情況下為維護其他會員或第三人之人身安全。
    4.會員透過與商家購物、兌換贈品，因而產生的金流、物流必要資訊。
    &#8226;對於會員所登錄或留存之個人資料，在未獲得會員同意以前，絕不對外揭露會員之姓名、地址、信用卡卡號、電子郵件地址及其他依法受保護之個人資料。
    &#8226;同時為提供行銷、市場分析、統計或研究、或為提供會員個人化服務或加值服務之目的，會員同意、或策略合作夥伴，得記錄、保存、並利用會員在本網站所留存或產生之資料及記錄，同時在不揭露各該資料之情形下得公開或使用統計資料。

智慧財產權
    網站上之所有著作及資料，其著作權、專利權、商標、營業秘密、其他智慧財產權、所有權或其他權利，均為或其原始著作人所有，除事先經或其權利人之合法授權外，會員不得擅自重製、傳輸、改作、編輯或以其他任何形式、基於任何目的加以使用，否則應負法律責任。

個別條款之效力
    本約定之任何條款之全部或一部份無效時，不影響其他約定之效力。

準據法及管轄法院
    對於會員與本公司的權利義務關係，應依應依網路規範及中華民國法律定之；若產生任何爭議以台灣台中地方法院為第一審管轄法院。的任何聲明、條款如有未盡完善之處，將以最大誠意，依誠實信用、平等互惠原則，共商解決之道。

會員身份終止與通知的義務
    1.具有更改各項服務內容或終止任一會員帳戶服務之權利，同時將以電子郵件通知會員。
    2.以目前一般認為合理之方式及技術維護本網站系統之正常運作；但因天災、事變、或其他不可抗力、其他非可歸責於之事由、或非所得控制之事由而致資訊顯示不正確、或遭偽造、竄改、刪除或擷取、或致系統中斷或不能正常運作時，對於因此所生之損害，不負賠償或補償之責任。
    3.若會員決定終止會員資格，請直接以電子郵件的方式通知我們，我們會儘快註銷您的會員資料，並以電子郵件告知。
    4.會員有通知取消會員資格之義務，並自停止會員身份日起（以電子郵件發出日期為準），喪失所有所提供之優惠及權益。
    5.為避免惡意情事發生致使會員應享權益損失，當會員通知停止會員身份時，本公司將再次以電話確認無誤後，再進行註銷會員資格。

                            </textarea>
                            <label class="mt-3 mb-3" for="Terms">當您點選送出按鈕後，表示您同意以上服務條款。</label>
                    </div>
                    <div class="col-2 m-auto">
                        <input name="action" type="hidden" value="addaccounts">
                        <button type="submit" class="btn btn-outline-primary btn-block">送出</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <footer style="background-color:#F2E6C2 ">
            <div class="w-75 m-auto pt-5 pb-5 " style="color:#666A6D; ">
                <p>地址：台中市北屯區瀋陽路三段0號</p>
                <p>電話：09123456789</p>
            </div>
        </footer>
</body>

</html>