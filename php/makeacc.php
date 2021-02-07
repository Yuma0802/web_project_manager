<?php 
require_once '../php/common.php';
$db = getDb();

//アカウント作成処理
session_start();

$file='../js/bord.json';
 
if (!empty($_POST)) {
   
  // 入力情報の不備を検知
    if ($_POST['newID'] === "") {
        $error['newID'] = "blank";
    }
    if ($_POST['newPassword_A'] === "") {
        $error['newPassword_A'] = "blank";
    }
    if ($_POST['newPassword_B'] === "") {
        $error['newPassword_B'] = "blank";
    }
    
   // IDの重複を検知 
    if (!isset($error)) {
        $member = $db->prepare('SELECT COUNT(*) as cnt FROM accunt WHERE ID=?');
        $member->execute(array(
            $_POST['newID']
        ));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['newID'] = 'duplicate';
        }
      } else {
        $miss = 1;
        file_put_contents($file,json_encode($miss));
        header('Location:http://localhost/web_project_manager/html/index.php');
        exit;
      }

  //passwordの一致を確認  
    if(!isset($error)){
      if($_POST['newPassword_A'] !== $_POST['newPassword_B']){
        $error['newPassword_A'] = 'defferent';
      }
    }  else {
      $miss = 2;
      file_put_contents($file,json_encode($miss));
      header('Location:http://localhost/web_project_manager/html/index.php');
      exit;
    }

  //アカウントをデータベースに追加
    if(!isset($error)){
      $sql = $db->prepare('insert into accunt values(null,?,?)');
      $sql -> execute([htmlspecialchars($_POST['newID']),htmlspecialchars($_POST['newPassword_A'])]);

      $miss = 4;
      file_put_contents($file,json_encode($miss));
      header('Location:http://localhost/web_project_manager/html/index.php');
      exit;
    }else{
    $miss = 3;
    file_put_contents($file,json_encode($miss));
    header('Location:http://localhost/web_project_manager/html/index.php');
    exit;
      }


    }
  
?>