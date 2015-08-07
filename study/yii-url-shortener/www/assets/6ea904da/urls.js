$(document).on('ready', function() {

    $('form.shorten-url').on('submit', function() {
        /**
         * Нужна проверка на корректный URL через регулярки
         */
        if($(this).find('[name=long_url]').val()) {
            $( "#url-results" ).load( "/index.php?r=url/short&", $(this).serialize(), function() {
                console.log(msg);
            });
        }
        return false;
    });

});