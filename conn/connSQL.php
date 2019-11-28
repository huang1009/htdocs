<?php 
$sql_host ="localhost";
$sql_username = "root";
$sql_password = "";
$sql_name = "banece";
$sql_link =@new mysqli($sql_host,$sql_username,$sql_password,$sql_name);
if ($sql_link -> connect_error != ""){
    echo "資料庫連線失敗";
}
else{
    $sql_link->query("SET NAMES 'UTF8'");
}





?>