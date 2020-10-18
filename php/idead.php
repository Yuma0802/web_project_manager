<?php 
require_once '../php/common.php';
session_start();
try{
 $db = getDb();
}catch(PDOException $e){
  print "接続エラー:{$e->getMessage()}";
}


if(isset($_SESSION['accunt'])){
  $stt = $db->prepare('insert into idead(day,name,idea) values(:day,:name,:idea)');

  $stt->bindValue(':day',$now->format('y-m-d'));
  $stt->bindValue(':name',$_SESSION['accunt']['ID']);
  $stt->bindValue(':idea',$_POST['idea']);
  
  $stt->execute();
  header('Location:http://localhost/web_project_manager/html/main.php');
}else{
  header('Location:http://localhost/web_project_manager/html/index.php');
}



?>