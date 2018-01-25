var open="hide";
var s=$(window).width();
$("#list").css("width",0.95*s);
$("#menuBar").find(">img").on("click",function () {

    if(open==="hide"){//checkbox hide->show
        show();
        $(".mainCB,#tm,#dl").css(
            "visibility","visible");
        open="show";

    }else{//checkbox  show->hide
        show();
        $(".mainCB,#tm,#dl,.checkAndDisplay").css(
        "visibility","hidden");

        open="hide";
    }



});



$("#plus").on("click",function () {
    if(tm_on===false){
    var text;
        if(open==="hide") {
            text = "<label><input type='checkbox' name='check[]' style='visibility:hidden'>" +
                "<input type='text' name='textBoxList[]' ><br></label>";

        }else{
            text = "<label><input type='checkbox' name='check[]' style='visibility:visible'>" +
                "<input type='text' name='textBoxList[]' ><br></label>";
        　
        }
            $("#list").append(text);
    }else{//time machine append

        var area = $('.addCB:checked').map(function() {
            return $(this).parent('label').text();
        }).get();
       for(var i=0;i<area.length;i++){
           var  text = "<label><input type='checkbox' name='check[]' style='visibility:hidden'>" +
               "<input type='text' name='textBoxList[]' value='"+ area[i]+"' ><br></label>";

           $("#list").append(text);
       }
        $(".addCB").prop("checked",false);

    }
});


var tm_on=false;
$("#tm").on("click", function () {//time machine click
    iftm();
});

function iftm() {
    if(tm_on===false) {//off->on
        tmmode("on");
        tm_on=true;
    }else{//time machine on ->off
        tmmode("off");
        tm_on =false;
    }
}

function tmmode(onoff){
    if(onoff==="on"){//off->on
        $(".add").css("display", "block");
        $("#scroll").scrollLeft(99999999999);
        $(".mainCB").prop("checked",false).css("visibility","hidden");
        $(".addCB").css("visibility","visible");
        $("#menuBar").find(">img").css("visibility","hidden");
        if(s<1024) {
            $("#tm").text("タイムマシンを終了").css("fontSize", "1.1em");
            $("#plus").text("選択して追加").css("fontSize", "1.3em");
        }else{
            $("#tm").text("タイムマシンを終了").css("fontSize", "1.4em");
            $("#plus").text("選択して追加").css("fontSize", "1.3em");
        }
        show();
    }else{//time machine on ->off
        $(".add").css("display", "none");
        $(".mainCB").css("visibility","hidden");
        $("#menuBar").find(">img").css("visibility","visible");
        if(s<1024) {
            $("#tm").text("タイムマシン").css("fontSize", "1.0em");
            $("#plus").text("+");
        }else{
            $("#tm").text("タイムマシン").css("fontSize", "1.5em");
            $("#plus").text("+").css("fontSize", "2.5em");

        }
        $(".addCB").prop("checked",false);



    }
}







$("#delete_btn").on("click",function () {

    $("input[type=checkbox]:checked").parent().remove();

});



$("#main").on("click","input[type=checkbox]",show);
var obj;

    function show() {//jquery のshow()とは無関係
        console.log("show");
        var flag;
         obj= document.list.elements['check[]'];
        var len = obj.length;
        if (!len) {
            // checkboxが一つしかないときはこちらの処理
            // 有効なcheckboxだけチェックする
            if(obj.checked === true){
                flag = true;
            }else{flag=false;}

            if (flag === true) {
                $(".checkAndDisplay").css(
                    "visibility","visible");
            } else {
                $(".checkAndDisplay").css(
                    "visibility","hidden");
            }
        }
        else {
            // checkboxが複数あるときはこちらの処理
            for (i = 0; i < len; i++) {
                if (obj[i].checked === true) {
                    flag = true;
                    break;

                }else{flag=false;}
            }
            if (flag === true) {
                $(".checkAndDisplay").css(
                    "visibility","visible");
            } else {
                $(".checkAndDisplay").css(
                    "visibility","hidden");
            }

        }
    }
    console.log(s);
    if(s<1024) {
        $(".addInLine").css("width", 0.8 * s);
    }else{
        $(".addInLine").css("width", 0.4 * s);

    }



