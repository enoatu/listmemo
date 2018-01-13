<?php
include __DIR__."/cnDBplus.php";
$sql="SELECT* FROM list_memo WHERE is_deleted=0 ORDER BY display_position";
$stm = getDB()->prepare($sql);
$stm->execute();
$result = $stm->fetchAll(PDO::FETCH_ASSOC);


//foreach ($result as $row){
//    $id=$row['id'];
//   $in_text= $row['text'];
//   $is_deleted=$row['is_deleted'];
//}

//何個のテキストボックスが必要なのか調べて
//　チェックボックスを生成
//　出力
//$memoarray = array("text" => $in_text,
//                    "textgroup"=>$in_textgroup,
//                    "created_at"=>$in_created_at
//                    );

