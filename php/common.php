<?php 
// 現在時刻
$now = new DateTime();

// データベース接続
function getDb(){
  $dsn = 'mysql:host=localhost;dbname=manager;charset=utf8';
  $usr = 'master';
  $password = '0524';

  $db = new PDO($dsn,$usr,$password);
  return $db;
}

?>