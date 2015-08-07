$(document).on('ready', function() {

    $('form.shorten-url').on('submit', function() {
        console.log($(this).serialize());
        return false;
    });

});