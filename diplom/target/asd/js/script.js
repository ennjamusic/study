$(document).on('ready', function(){


    function renderResponsePopup(xml) {
        $('.list-requests').hide();
         var xmlDoc = $.parseXML(xml);
         var $xml = $(xmlDoc);
//         console.log();
         var html = "";
         html +="<table class='table-bordered table'><tr><td>ФИО</td><td>"+
         $xml.find("FirstName").text()+" "+$xml.find("FathersName").text()+" "+$xml.find("SecName").text()+
         "</td></tr><tr><td>Дата рождения</td><td>"+$xml.find("DateOfBirth").text()+"</td></tr>"+
         "<tr><td>СНИЛС</td><td>"+$xml.find("SNILS").text()+"</td></tr>"+
         "<tr><td>Место рождения</td><td>"+$xml.find("PlaceOfBirth").text()+"</td></tr>"+
         "<tr><td>Звание</td><td>"+$xml.find("PoliceInfo").attr('dismissalRank')+"</td></tr>"+
         "<tr><td>Последнее место службы</td><td>"+$xml.find("PoliceInfo").attr('dismissalSubdivision')+"</td></tr>"+
         "<tr><td>Должность лица на момент увольнения</td><td>"+$xml.find("Dismissal").attr('Position')+"</td></tr>"+
         "<tr><td>Причина увольнения</td><td>"+$xml.find("Dismissal").attr('Reason')+"</td></tr>"+
         "<tr><td>Дата увольнения</td><td>"+$xml.find("dissmissalDate").text()+"</td></tr>"+
         "<tr><td>ОВД, выдавший пенсионное удостоверение и/или издавший приказ об увольнении</td><td>"+$xml.find("Subdivision").attr('name')+"</td></tr>"+
        "</table>";
        $('.response .response-data').html(html);
        $('.response').show();
    }

    $.ajax({
       type: "POST",
       url: "/asd/main",
       success: function(data) {
            $('.list-requests .requests').html(data);
       }
     });

     $(document).on('click', '.requests a', function(e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "/asd/RequestPL",
            data: "requestId="+$(this).attr('requestId'),
            success: function(data) {
                 $.ajax({
                     type: 'POST',
                     url: "http://diplom.ru",
                     data: data,
//                     dataType: 'xml',
                     success: renderResponsePopup
                 });
            },
        });
        return false;
     });


    $('form.request-form').on('submit', function() {
        $(this).find('textarea, input').focusout();
        $.ajax({
           type: "GET",
           url: "/asd/RequestID",
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
            url: "http://diplom.ru",
            data: data,
            success: function(msg) {
                    var xmlDoc = $.parseXML(msg), $xml = $(xmlDoc);
                $.ajax({
                    type: 'POST',
                    url: "/asd/RequestID",
                    data: "msg="+msg,
                    success: function(msg1) {
                        $('.popover-title').text('Запрос принят на обработку');
                        errorPopupMessage("Заявка сохранена с id = " +msg1 + " <br /> Она будет обработана в течении 3 дней");
                    },
                 });
            },
            error: function(jqXHR,error, errorThrown) {
                var xmlDoc = $.parseXML(jqXHR.responseText), $xml = $(xmlDoc);
                errorPopupMessage($xml.text());
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
        $('.popover-title').text('Что-то пошло не так')
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

    $('.list-requests-close').on('click', function() {
        $('.list-requests').hide();
    });

    $('.list-requests-show').on('click', function() {
        $('.list-requests').show();
    });

    $('.response-close').on('click', function() {
        $('.response').hide();
    });
});