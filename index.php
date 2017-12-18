<?php
require_once __DIR__."/sql.php";
require_once __DIR__."/custom.php"
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="style.php">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body style="background-color: <?php echo $background_color;?>">

<h1><?php echo $title;?></h1>

<div id="wrap">

    <button id="plus">+</button>

    <div id="list">
        <input type="checkbox"><input type='text'>
    </div>

    </div>

</div>



</body>
</html>
<script src="js.js"></script>

<!--
フリック操作