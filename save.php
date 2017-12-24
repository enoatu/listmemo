<?php
session_start();
include  __DIR__."/cnDBplus.php";
//ここでは送信されたデータをもとにSQLにデータを挿入してきます。
$textboxList=$_POST['textboxList'];
var_dump($textboxList);
//saveを押すごとにinsert
  try {
    $sql=null;
      foreach ($textboxList as $textrow){
          $countsql=1;
          $stm->bindValue(":text".$countsql, $textrow);
          $countsql++;
          $sql.="INSERT list_memo(text,is_deleted) VALUES(:text".$countsql.");";
      }
      //is_deleted
    echo "sql: ".$sql;
      $stm = getDB()->prepare($sql);
      $stm->execute();
      $stm=null;


  } catch (Exception $e) {

  }

//header('Location: http://enoatu.com/memo/listmemo/index.php');
exit();