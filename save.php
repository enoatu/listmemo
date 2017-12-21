<?php
/**
 * Created by PhpStorm.
 * User: enoti
 * Date: 2017/09/01
 * Time: 0:25
 */
//$_POST['save']="dfsgs";
include  __DIR__."/cnDBplus.php";
//ここでは送信されたデータをもとにSQLにデータを挿入してきます。

if(isset($_POST['save'])){
    $_POST['everId']=es($_POST['everId']);
    $_POST['id']=es($_POST['id']);
    $_POST['save']=es($_POST['save']);
    $now = date("Y-m-d H:i:s");
    //データベースに書き込み
    //いままでの＋idと
    //textを合わせる
    //
  try {
      $sql="UPDATE list_memo SET text = :text WHERE id = :id";
      $stm = getDB()->prepare($sql);
      $stm->bindValue(':text',$_POST['save']);
      $stm->bindValue('id',$_POST['everId']+$_POST['id']);
      $stm->execute();
      $stm=null;

//      echo 'めっちゃSUCCESS!!!!';
  } catch (Exception $e) {
//      echo 'めっちゃERRRRRRR!!!!';

  }
}

header('Location: https://enoatu.com/memo/list_memo/');
exit();