$(document).ready(function() {

    $("[name=genForm]").on("change", function() {
        if($(this).val()==1) {
            $(".htmlForm").show();
            $(".widgetForm").hide();
        }
        if($(this).val()==2) {
            $(".widgetForm").show();
            $(".htmlForm").hide();
        }
    });

});