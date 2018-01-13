<?php
session_start();
include  __DIR__."/cnDBplus.php";
//ここでは送信されたデータをもとにSQLにデータを挿入してきます。
$textboxList=$_POST['textboxList']; //normal array
//$_SESSION['beforeTextBoxList'];//associative array ['id']['text']['is_deleted']..
$beforeTextBoxList=array_column($_SESSION['beforeTextBoxListResult'],'text');

//saveを押すごとにinsert

    $sql=null;//initialize
    $countsql=1;

$now = date("Y-m-d H:i:s");//what time is it now ?

foreach ($textboxList as $textrow){

    if($textrow != current($beforeTextBoxList)) {// text is changed

        // insert new text
        $sql_insert = "INSERT list_memo(text,display_position,saved_datetime) 
        VALUES(:text" . $countsql . ",:dp,:now);";
        echo "<br>bind : " . $countsql . $textrow;
        $stm = getDB()->prepare($sql_insert);
        $stm->bindValue(":text" . $countsql, $textrow);
        $stm ->bindValue(":dp",$countsql);//save the order
        $stm ->bindValue(":now",$now);
        $now = date("Y-m-d H:i:s");

        $stm->execute();

        // is_deleted flag (of old text) -> on
        $sql_update = "UPDATE list_memo SET is_deleted = 1,deleted_datetime = :now 
        WHERE text = :beforetext" .$countsql;
        echo "<br>update: ".$sql_update;
        echo "<br>is_deleted flag on: " .$countsql . current($beforeTextBoxList);

        $stm = getDB()->prepare($sql_update);
        $stm ->bindValue(":now",$now);
        $stm ->bindValue(":beforetext" . $countsql, current($beforeTextBoxList));
        $stm->execute();

    }//else{ text is not changed}
        next($beforeTextBoxList);
        $countsql++;

}
      //is_deleted
    echo "<br>sql: ".$sql;

var_dump($stm);


$stm=null;


//header('Location: http://enoatu.com/memo/listmemo/index.php');
exit();