<?php
session_start();
include  __DIR__."/cnDBplus.php";
//ここでは送信されたデータをもとにSQLにデータを挿入してきます。
$textboxList=$_POST['textboxList'];
var_dump($textboxList);
//saveを押すごとにinsert
  try {
    $sql=null;
      $countsql=1;
      foreach ($textboxList as $textrow){
          $sql.="INSERT list_memo(text) VALUES(:text".++$countsql.");";
      }
      //is_deleted
    echo "sql: ".$sql;
      $stm = getDB()->prepare($sql);
      $countsqlp=1;
      foreach ($textboxList as $textrow) {
          $stm->bindValue(":text" . ++$countsqlp, $textrow);
      }
      $stm->execute();
      $stm=null;

  } catch (Exception $e) {

  }

//header('Location: http://enoatu.com/memo/listmemo/index.php');
exit();