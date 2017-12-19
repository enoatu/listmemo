<?php
require_once __DIR__ . "/cnDBplus.php";
require_once "custom.php";
$sql="SELECT* FROM alter_memo WHERE id=:id";
$stm = getDB()->prepare($sql);
$stm->bindParam(":id",$id);
$stm->execute();
$result = $stm->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row){
    $in_text= $row['text'];
    $in_textgroup=$row['textgroup'];
    $in_created_at=$row['created_at'];
}

$memoarray = array("text" => $in_text,
    "textgroup"=>$in_textgroup,
    "created_at"=>$in_created_at
);

