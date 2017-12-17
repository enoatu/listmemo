<?php
/**
 * Created by PhpStorm.
 * User: enoti
 * Date: 2017/09/01
 * Time: 0:14
 */
//下記includeを消去してDB情報をPDO

function getDB(){
    try{
    $host = null;
    $user = null;
    $password = null;
    $dbName = null;
    include "cnDB.php";//change file
    if(!$host==""||!$user=="") {//何か入ってるときは
        $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
        $pdo = new PDO($dsn, $user, $password);
//プリペアドステートメントのエミュレーションを無効化
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//例外がスローされる設定にする
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }else{
        include __DIR__."/../../atsushi/gtd2.php";
}
    }catch(Exception $e){

    }
    return $pdo;
}


function es($data){
    if(is_array($data)){
        return array_map(__METHOD__,$data);

    }else{
        return htmlspecialchars($data, ENT_QUOTES,"UTF-8");

    }}

function json_safe_encode($data){
    return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}