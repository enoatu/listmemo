<?php
session_start();
include  __DIR__."/cnDBplus.php";
//ここでは送信されたデータをもとにSQLにデータを挿入してきます。
$textboxList=$_POST['textboxList'];
var_dump($textboxList);
//saveを押すごとにinsert

    $sql=null;
      $countsql=1;$countsqlp=1;

foreach ($textboxList as $textrow){
          $sql="INSERT list_memo(text) VALUES(:text".++$countsql.");";
          $stm = getDB()->prepare($sql);
          $stm->bindValue(":text" . ++$countsqlp, $textrow);
          echo "bind: ".$countsqlp.$textrow;
          $stm->execute();
      }
      //is_deleted
    echo "sql: ".$sql;

var_dump($stm);


$stm=null;


//header('Location: http://enoatu.com/memo/listmemo/index.php');
exit();