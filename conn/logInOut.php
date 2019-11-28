<?php 
session_start();
//抓取身份
if (@$_SESSION["UserAccounts"] != '') {
    $checkSession = "SELECT m_accounts,m_name FROM member WHERE m_accounts=?";
    $stmt=$sql_link->prepare($checkSession);
    $stmt->bind_param("s", $_SESSION["UserAccounts"]);
    $stmt->execute();
    $stmt->bind_result($accounts,$name);
    $stmt->fetch();
    $stmt->close();
}
//登入
if (isset($_POST["action"]) && $_POST['action'] == "login") {
    if (isset($_POST["accounts"]) && isset($_POST["password"]) && $_POST["accounts"] != '' && $_POST["password"] != '') {
        $login = "SELECT m_accounts,m_password FROM member WHERE m_accounts=?";
    
        $stmt=$sql_link->prepare($login);
        $stmt->bind_param("s",$_POST["accounts"]);
        $stmt->execute();
    
        $stmt->bind_result($accounts,$password);
        $stmt->fetch();
        $stmt->close();
    
        $ps = password_hash($password,PASSWORD_DEFAULT);
        if(password_verify($_POST["password"],$ps)){
            $_SESSION["UserAccounts"] = $_POST["accounts"];
            header("Location:mydata.php");
            echo "<script>alert('登入成功')</script>";
        }
        else{
            header("Location:member.php?error=1");
        }
    }
    else{
        header("Location:member.php?error=2");
    }}
   
//登出
if(isset($_GET["logout"]) && $_GET["logout"] == "true"){
    $_SESSION["UserAccounts"] = '';
    header("Location:member.php");

}
//註冊會員
if (isset($_POST["action"]) && $_POST['action'] == "addaccounts") {
    $checkaddaccounts = "SELECT m_accounts FROM member WHERE m_accounts='{$_POST["accounts"]}'";
    $check=$sql_link->query($checkaddaccounts);
    if($check->num_rows>0){
        header("location:registered.php?error=1");
    }
    else{
        $query = "INSERT INTO member (m_accounts,m_password,m_name,m_date,m_number,m_email,m_address) VALUES (?,?,?,?,?,?,?)";
        $stmt = $sql_link->prepare($query);
        $stmt->bind_param("sssssss",$_POST["accounts"],$_POST["password"],$_POST["name"],$_POST["birthday"],$_POST["phone"],$_POST["email"],$_POST["address"]);
        $stmt->execute();
        $stmt->close();
        $sql_link->close();
        header("location:member.php");
    }
}
//更新會員資料
if (isset($_POST["action"]) && $_POST['action'] == "update") {
    $query = "UPDATE member SET m_name=?,m_date=?,m_number=?,m_email=?,m_address=? WHERE m_accounts=?";
    $stmt = $sql_link->prepare($query);
    $stmt->bind_param("ssssss", $_POST['name'], $_POST['date'], $_POST['number'], $_POST['email'], $_POST['address'], $_SESSION["UserAccounts"]);
    $stmt->execute();
    $stmt->close();
    $sql_link->close();
    header("location:mydata.php?finish=true");
}
//新增課程
if (isset($_POST["action"]) && $_POST['action'] == "addcourse") {
    $query = "INSERT INTO class (cm_accounts,cc_id) VALUES (?,?)";
    $stmt = $sql_link->prepare($query);
    $stmt->bind_param("ss",$_SESSION["UserAccounts"],$_POST["ccid"]);
    $stmt->execute();
    $stmt->close();
    $sql_link->close();
    header("location:course.php?fin=1");
}
//刪除課程
if (isset($_POST["action"]) && $_POST['action'] == "dele") {
    $query = "DELETE FROM class WHERE cs_id=?";
    $stmt = $sql_link->prepare($query);
    $stmt->bind_param("s",$_POST["deleid"]);
    $stmt->execute();
    $stmt->close();
    $sql_link->close();
    header("location:mydata.php?del=true");
}
?>
