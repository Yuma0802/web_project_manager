<?php 
require_once '../php/common.php';
session_start();
try{
 $db = getDb();
}catch(PDOException $e){
  print "接続エラー:{$e->getMessage()}";
}


if(is_uploaded_file($_FILES['fname']['tmp_name'])){
  if(!file_exists('../file')){
    echo 'fileがねーぞ';
  }
  $file='../file/'.basename($_FILES['fname']['name']);
  if(move_uploaded_file($_FILES['fname']['tmp_name'],$file)){
    echo $file,'のアップロード成功';
  }else{
    echo 'ばかたれ';
  }
}else{
  echo 'failを選択してください。';
}

if(isset($_SESSION['accunt'])){
  $stt = $db->prepare('insert into doc1(day,name,file,coment) values(:day,:name,:file,:coment)');

  $stt->bindValue(':day',$now->format('y-m-d'));
  $stt->bindValue(':name',$_SESSION['accunt']['ID']);
  $stt->bindValue(':file',$file);
  $stt->bindValue(':coment',nl2br($_POST['coment']));

  if($stt->execute()){
    header('Location:http://localhost/web_project_manager/html/main.php');
  }else{
    echo 'no';
  }

}else{
  header('Location:http://localhost/web_project_manager/html/index.php');
}



?>