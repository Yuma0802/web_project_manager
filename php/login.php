<?php 
require_once '../php/common.php';
//ログイン処理
  session_start(); 
  unset($_SESSION['accunt']);

$db = getDb();
$sql=$db->prepare('select * from accunt where ID=? and password=?');
$sql->execute([$_POST['id'], $_POST['password']]);

foreach ($sql as $row) {
  $_SESSION['accunt']=[
  'user' => $row['user'],
  'ID' => $row['ID'],
  'password' => $row['password']];
}

if(isset($_SESSION['accunt'])) {
  header('Location:http://localhost/web_project_manager/html/main.php');
}else{
  header('Location:http://localhost/web_project_manager/html/index.php');
}


 
?>