$(document).on('ready', function() {

    $('form.shorten-url').on('submit', function() {
        var re = new RegExp('~^(?:(?:https?|ftp|telnet)://(?:[a-z0-9_-]{1,32}(?::[a-z0-9_-]{1,32})?@)?)?(?:(?:[a-z0-9-]{1,128}\.)+(?:ru|su|com|net|org|mil|edu|arpa|gov|biz|info|aero|inc|name|[a-z]{2})|(?!0)(?:(?!0[^.]|255)[0-9]{1,3}\.){3}(?!0|255)[0-9]{1,3})(?:/[a-z0-9.,_@%&?+=\~/-]*)?(?:#[^ \'\"&]*)?$~gi');
        if($(this).find('[name=long_url]').val() && re.test($(this).find('[name=long_url]').val())) {

        }
        console.log(re.test($(this).find('[name=long_url]').val()));
        return false;
    });

});