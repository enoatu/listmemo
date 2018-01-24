<?php
session_start();
require_once __DIR__."/custom.php";
require_once __DIR__."/read.php";

if(isset($_POST['saved'])){
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
    <div id="menuBar">
        <p id="tm" draggable="true">タイムマシン</p><img src="menu.png" style="border-radius: 20%">
        <p id="delete_btn" class="checkAndDisplay"><span>削除</span></p>
    </div>

    <div id="scroll">

        <?php
        for ($i=0;$i<$days;$i++){

            echo "<div class='scrollBox add'>";
            echo "<div class='addInLine'>";
            echo "<h5>"  .$saved_datetime[$i][0]. "</h5>";
            if (true == false) {//text dont exist
                break;
            } else {
                for($j=0;$j<count($saved_datetime[$i]);$j++){
                    echo "<label class='addL'><input type='checkbox' name='check_en[]' class='addCB'>" .
                        "<div name='textBoxList[]' class='tm_text'>". $textar[$i][$j] ."</div><br></label>";
                }
            }

            echo "</div></div>";
        }

        ?>

        <div id="main" class="scrollBox">

            <form id="list" name="list" method="post" action="save.php">
            <div id="saveBar">
            <button id="save" type="submit">保存</button>
            <button id="plus" type="button">+</button>
            </div>
                <h3><?php echo $new;?></h3>
                <?php
                if($result==null){//text dont exist
                    echo "<label><input type='checkbox' name='check[]' class='mainCB'>
                    <input type='text' name='textBoxList[]' ><br></label>";

                }else{
                    foreach($result as $row){

                    echo "<label><input type='checkbox' name='check[]' class='mainCB'>".
                            "<input type='text' name='textBoxList[]' value=".$row['text']."><br></label>";
                    }
                }

                ?>
            </form>
        </div>

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