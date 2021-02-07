<?php 
require_once '../php/common.php';
require_once '../php/calender.php';
session_start();

try{
  $db = getDb();
 }catch(PDOException $e){
   print "接続エラー:{$e->getMessage()}";
 }

 if(isset($_SESSION['accunt'])){
  $stt = $db->prepare('insert into schedule(day,name,time) values(:day,:name,:time)');

  $stt->bindValue(':day',$_POST['']);
  $stt->bindValue(':name',$_SESSION['accunt']['ID']);
  $stt->bindValue(':time',nl2br($_POST['minu']));
  
  $stt->execute();
  header('Location:http://localhost/web_project_manager/html/main.php');
}else{
  header('Location:http://localhost/web_project_manager/html/index.php');
}

?>