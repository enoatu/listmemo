$("#plus").on("click",function () {
    var text="<input type='checkbox'><input type='text'><br>";
    $("#list").append(text);
});
$("#list").find(">input[type=checkbox]").on("click",show);

var sideOpen="hide";
$("#side").on("click",function () {
    if(sideOpen==="hide"){//checkbox show
        $("#list").find(">input[type=checkbox]").show();
        sideOpen="show";
    }else{//checkbox hide
        $("#list").find(">input[type=checkbox]").hide();
        sideOpen="hide";

    }
});

    var flag;
    var obj = document.list.elements['check[]'];
    var len = obj.length;
    function show() {
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

