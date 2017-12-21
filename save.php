<?php
session_start();
$_SESSION['idcount'];
/**
 * Created by PhpStorm.
 * User: enoti
 * Date: 2017/09/01
 * Time: 0:25
 */
//$_POST['save']="dfsgs";
include  __DIR__."/cnDBplus.php";
//ここでは送信されたデータをもとにSQLにデータを挿入してきます。
$textboxIdList=es($_POST['textboxIdList']);
$textboxList=es($_POST['textboxList']);
if(isset($_POST['save'])){
    $_POST['everId']=es($_POST['everId']);
    $_POST['id']=es($_POST['id']);
    $now = date("Y-m-d H:i:s");
    //データベースに書き込み
    //いままでの＋idと
    //textを合わせる
    //
  try {
      $sql="UPDATE list_memo SET text = :text WHERE id = :id";
      $stm = getDB()->prepare($sql);
      $stm->bindValue(':text',$textboxList);
      foreach($textboxList as $textrow) {
          $stm->bindValue(':id', $_SESSION['idcount'] + $textrow);
      }
      $stm->execute();
      $stm=null;


  } catch (Exception $e) {

  }
}

header('Location: https://enoatu.com/memo/list_memo/');
exit();