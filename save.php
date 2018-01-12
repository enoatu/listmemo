<?php
session_start();
include  __DIR__."/cnDBplus.php";
//ここでは送信されたデータをもとにSQLにデータを挿入してきます。
$textboxList=$_POST['textboxList']; //normal array
var_dump($_SESSION['beforeTextBoxList']);
//$_SESSION['beforeTextBoxList'];//associative array ['id']['text']['is_deleted']..
$beforeTextBoxList=array_column($_SESSION['beforeTextBoxListResult'],'text');

//saveを押すごとにinsert

    $sql=null;//initialize
    $countsql=1;

foreach ($textboxList as $textrow){

    if($textrow != current($beforeTextBoxList)) {// text is changed

        // insert new text
        $sql_insert = "INSERT list_memo(text) VALUES(:text" . $countsql . ");";
        echo "bind : " . $countsql . $textrow;
        $stm = getDB()->prepare($sql_insert);
        $stm->bindValue(":text" . $countsql, $textrow);
        $stm->execute();

        // is_deleted flag (of old text) -> on
        $sql_update = "UPDATE list_memo SET is_deleted = 1 WHERE text = :beforetext" .$countsql .");";
        echo "update: ".$sql_update;
        echo "is_deleted flag on: " .$countsql . current($beforeTextBoxList);

        $stm = getDB()->prepare($sql_update);
        $stm ->bindValue(":beforetext" . $countsql, current($beforeTextBoxList));
        $stm->execute();

    }//else{ text is not changed}
        next($beforeTextBoxList);
        $countsql++;

}
      //is_deleted
    echo "sql: ".$sql;

var_dump($stm);


$stm=null;


//header('Location: http://enoatu.com/memo/listmemo/index.php');
exit();