var open="hide";
$("#menuBar").find(">img").on("click",function () {
    // if(open==="hide"){//checkbox show
    //     $("#list").find(">input[type=checkbox]").show();
    //     open="show";
    // }else{//checkbox hide
    //     $("#list").find(">input[type=checkbox]").hide();
    //     open="hide";
    //
    // }
    if(open==="hide"){//checkbox show
        show();
        $("input[type=checkbox],#tm,#dl").css(
            "visibility","visible"
            );
            show();
        open="show";
    }else{//checkbox hide
        show();
        $("input[type=checkbox],#tm,#dl,#delete_btn").css(
        "visibility","hidden");

        open="hide";


    }
});

$("#plus").on("click",function () {
    var text;
if(open==="hide") {
    text = "<label><input type='checkbox' name='check[]' style='visibility:hidden'>" +
        "<input type='text' name='textBoxList[]' ><br></label>";

}else{
    text = "<label><input type='checkbox' name='check[]' style='visibility:visible'>" +
        "<input type='text' name='textBoxList[]' ><br></label>";
　
}
    $("#list").append(text);
});
var is_delete=[];

$("#delete_btn").on("click",function () {

    $("input[type=checkbox]").each(function (i) {

        if ($(this).prop("checked") === false) {
            is_delete.push(0);
            console.log(0);
        } else {
            is_delete.push(1);
            console.log(1);

        }

    });

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
                document.getElementById("delete_btn").style.visibility = "visible";
            } else {
                document.getElementById("delete_btn").style.visibility = "hidden";
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
                document.getElementById("delete_btn").style.visibility = "visible";
            } else {
                document.getElementById("delete_btn").style.visibility = "hidden";
            }

        }
    }

