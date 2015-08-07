$(document).on('ready', function() {

    $('form.shorten-url').on('submit', function() {
        /**
         * Нужна проверка на корректный URL через регулярки
         */

        if($(this).find('[name=long_url]').val()) {
            $( "#url-results" ).load( "/url/short", $(this).serialize());
            $(this).find('[name=long_url]').val("");
        }
        return false;
    });

});