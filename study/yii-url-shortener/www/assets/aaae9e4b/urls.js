$(document).on('ready', function() {

    $('form.shorten-url').on('submit', function() {
        /**
         * ����� �������� �� ���������� URL ����� ���������
         */
        if($(this).find('[name=long_url]').val()) {
            $( "#url-results" ).load( "/index.php?r=url", { limit: 25 }, function() {
                alert( "The last 25 entries in the feed have been loaded" );
            });
        }
        return false;
    });

});