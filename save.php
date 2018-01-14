<?php
session_start();
include  __DIR__."/cnDBplus.php";
//ここでは送信されたデータをもとにSQLにデータを挿入してきます。
$textBoxList=$_POST['textBoxList']; //normal array
//$_SESSION['beforeTextBoxList'];//associative array ['id']['text']['is_deleted']..




//saveを押すごとにinsert

    $sql=null;//initialize
    $countsql=0;

$now = date("Y-m-d H:i:s");//what time is it now ?
echo "textBoxList<br>";

echo "<br>";

    foreach ($textBoxList as $textrow) {

        if($textrow==null){continue;}//don't insert blank

                $sql_insert = "INSERT list_memo(text,display_position,saved_datetime) 
            VALUES(:text" . $countsql . ",:dp,:now);";
                echo "<br>bind : " . $countsql . $textrow;
                $stm = getDB()->prepare($sql_insert);
                $stm->bindValue(":text" . $countsql, $textrow);
                $stm->bindValue(":dp", $countsql);//save the order
                $stm->bindValue(":now", $now);
                $stm->execute();
                var_dump($stm);

        $countsql++;

}
$stm=null;


header('Location: http://enoatu.com/memo/listmemo/index.php');
exit();