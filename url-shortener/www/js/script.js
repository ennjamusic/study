$(document).ready(function() {

    $("form.request-form").submit(function(e) {

        $.ajax({
            type: "POST",
            url: "short.php",
            data: "url="+$("input[name=url]").val(),
            success: function(html){
                        $("#result").append(html);
                    }
        });

        e.preventDefault();
        return false;
    });

});