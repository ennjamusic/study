$(document).on('ready', function(){

    $('form.request-form').on('submit', function() {
        $(this).find('textarea, input').focusout();
        $.ajax({
           type: "GET",
           url: "/asd/myservlet",
           data: $(this).serialize(),
           success: function(data) {
                sendSoapRequest(data);
           },
           error: function(jqXHR,error, errorThrown) {
               console.log(jqXHR.responseText);
               console.log(error);
           }
         });

        return false;
    });


    function sendSoapRequest(data) {
        $.ajax({
            type: 'POST',
            url: "http://smev-mvf.test.gosuslugi.ru:7777/gateway/services/SID0003223",
            data: data,
            contentType: 'application/xml',
            success: function(msg) {
                console.log(msg);
            },
            error: function(jqXHR,error, errorThrown) {
                var xmlDoc = $.parseXML(jqXHR.responseText), $xml = $(xmlDoc);
                errorPopupMessage($xml.find('faultstring').text());
            }
         });

    }

//  Кнопки назад и вперед
    $('button.next-step').on('click', function() {
        var step = $(document).find('.active').attr('step');
        var $this = $(document).find('.active');
        step++;
        if(step>3) {
            step=3;
        }
        if(step>1) {
            $('.prev-step').show();
        }
        $($this).removeClass('active');
        $('.step').each(function() {
            if($(this).attr('step') == step) {
                $(this).addClass('active');
            }
        });
        if(step == 3) {
           $('.next-step').hide();
           $('.hidden-submit').show();
        }
        return false;
    });
//  Кнопки назад и вперед
    $('button.prev-step').on('click', function() {
        var step = $(document).find('.active').attr('step');
        var $this = $(document).find('.active');
        step--;
        if(step<1) {
            step=1;
        }
        if(step<3) {
            $('.next-step').show();
            $('.hidden-submit').hide();
        }
        $this.removeClass('active');
        $('.step').each(function() {
            if($(this).attr('step') == step) {
                $(this).addClass('active');
            }
        });
        if(step == 1) {
           $('.prev-step').hide();
        }
        return false;
    });

//  Обработчик для валидации

    $('.request-form textarea, .request-form input').on('focusout',function() {
        var messages;
        switch($(this).attr('name')) {
            case "snils": messages = snilsValidation($(this).val()); break;
            case "fio-init":
            case "name":
            case "second-name":
            case "last-name":
            case "girl-name":
            case "place-of-birth":
            case "last-ovd":
            case "rang":  messages = notEmpty($(this)); break;
            default: break;
        }
        if(messages) {
            errorPopupMessage(messages);
            return false;
        }
        return true;

    });

    function errorPopupMessage(messages) {
        $('.validation-message .messages').html('<p class="text-error">'+messages+"</p>");
        $('.validation-message').show();
    }

//  Функции валидации:
//  Не пустое
    function notEmpty(jqObj) {
        if(jqObj.val()=="") {
            return 'Поле "'+jqObj.parents('tr').find('td:first-child').text()+'" не должно быть пустым!';
        }
    }

//  Валидация СНИЛС

function snilsValidation(snils) {
    if (!snils) {
        return "Введите СНИЛС";
    }
    if (!/^\d{3}-\d{3}-\d{3} \d{2}$/.test(snils)) {
        return 'Формат: XXX-XXX-XXX YY, где XXX-XXX-XXX — собственно номер, а YY — контрольное число.';
    }
}

//  Обработчик закрытия окна с сообщениями о валидации

    $('.validation-message-close').on('click', function() {
        $('.validation-message').hide();
    });

});