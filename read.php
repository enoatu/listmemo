<?php
include __DIR__."/cnDBplus.php";
$sql="SELECT MAX(saved_datetime) FROM list_memo";
$stm = getDB()->prepare($sql);
$stm->execute();
$result = $stm->fetchAll(PDO::FETCH_ASSOC);
$new=null;
foreach ($result as $row){
    $new=$row['MAX(saved_datetime)'];
}
$sql="SELECT* FROM list_memo WHERE saved_datetime = :new ORDER BY display_position";
$stm = getDB()->prepare($sql);
$stm->bindValue(":new",$new);
$stm->execute();
$result = $stm->fetchAll(PDO::FETCH_ASSOC);

$oneWeekAgo=date("Y-m-d H:i:s",strtotime("-1 week"));

$sql="SELECT* FROM list_memo WHERE saved_datetime > :oneWeekAgo";
$stm = getDB()->prepare($sql);
$stm->bindValue(":oneWeekAgo",$oneWeekAgo);
$stm->execute();
$result2 = $stm->fetchAll(PDO::FETCH_ASSOC);

$days=1;
$textar=[];
$is_deleted=[];
$count=0;

//var_dump($result2);
var_dump($result2[0]['saved_datetime']);

foreach ($result2 as $row){//in1week every write time, group by day

   if($row['saved_datetime'] !==next($row['saved_datetime'])){//isnotsame
       prev($row['saved_datetime']);
       $count=0;//child initialize
      $days++;
   }else{//is same datetime->throw
       $count++;
   }
    $saved_datetime[$days][$count]=$row['saved_datetime'];
    $textar[$days][$count]=$row['text'];
    $is_deleted[$days][$count]=$row['is_deleted'];

    next($row['saved_datetime']);
}








$stm=null;

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

