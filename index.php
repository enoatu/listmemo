<?php
session_start();
require_once __DIR__."/custom.php";
require_once __DIR__."/read.php";

if($_POST['a0']){
    echo "saveされました";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body style="background-color: <?php echo $background_color;?>">

<h1><?php echo $title;?></h1>

<div id="wrap">
    <div id="side">
        <button></button>
    </div>

    <div id="main">
        <form id="list" name="list" method="post" action="save.php">
        <div>
        <button id="save" type="submit">保存</button>
        <button id="plus">+</button><button id="delete_btn">-</button>
        </div>

            <?php
            var_dump("sql ".$_SESSION['sql']);
            foreach($result as $row){
            if($row['text']==""){ //blank branch
                $startId =$row['id'];
                break;
            }
                $cnI=1;
            echo "<input type='checkbox' name='check[]'>
            <input type='text' name='textboxList[]' value=".$row['text']."><br>";
                $cnI++;
            }

            $_SESSION['beforeTextBoxListResult']=$result;// to save.php
            ?>
        </form>
    </div>

</div>



</body>
</html>
<script src="js.js"></script>

<style>
    input[type=checkbox]{
        background-color:<?php echo $checkbox_color; ?>;
    }
</style>
<!--
フリック操作