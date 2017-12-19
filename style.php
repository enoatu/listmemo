<?php
header('Content-Type: text/css; charset=utf-8');
require_once __DIR__."/custom.php";
?>

@media screen and (min-width:0px) {
    /*基本　スマホ用*/
    html{
        width:100%;
        height: 100%;
    }

    body{
        width:100%;
        height: 100%;
        text-align: center;
    }

    h1{

    }

    #wrap{
        vertical-align: middle;
        text-align: center;
    }

    #list{
        text-align: center;
    }
    #plus_minus_flex{
        display: flex;
        text-align: center;

    }

    input[type=checkbox]{
        background-color:<?php echo $checkbox_color; ?>;
         }


}

@media screen and (min-width:1024px) {
    /*パソコン修正用*/
}