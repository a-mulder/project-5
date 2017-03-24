$(document).ready(function () {
    var color = "A5B452";

    $(".item0").click(function() {
        emptystars();
        $(this).css("color", "#00ff00");
        for (var e = 0; e < 1; e++) {
            $(".item" + e).css("color", "#"+color);
        }
        $(".stars").val(1);
    });
    $(".item1").click(function() {
        emptystars();
        $(this).css("color", "#00ff00");
        for (var e = 0; e < 2; e++) {
            $(".item" + e).css("color", "#"+color);
        }
        $(".stars").val(2);
    });
    $(".item2").click(function() {
        emptystars();
        $(this).css("color", "#00ff00");
        for (var e = 0; e < 3; e++) {
            $(".item" + e).css("color", "#"+color);
        }
        $(".stars").val(3);
    });
    $(".item3").click(function() {
        emptystars();
        $(this).css("color", "#00ff00");
        for (var e = 0; e < 4; e++) {
            $(".item" + e).css("color", "#"+color);
        }
        $(".stars").val(4);
    });
    $(".item4").click(function() {
        emptystars();
        $(this).css("color", "#00ff00");
        for (var e = 0; e < 5; e++) {
            $(".item" + e).css("color", "#"+color);
        }
        $(".stars").val(5);
    });
});

function emptystars(){
    for(var i = 0; i < 5; i++){
        $(".item" + i).css("color", "white");
    }
}