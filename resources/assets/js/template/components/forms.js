if (callbackForm) {

    var modal = $('#modalCenter');
    modal.on('shown.bs.modal', function () {
        $('#callbackForm')
            .removeClass('d-none');
        $('#callbackFormResult')
            .empty()
            .addClass('d-none');

    });
    var inProgress = false;

    var validator = $(callbackForm).validate({
        rules: {
            name: {
                required: true
            },
            phone: {
                required: true,
                minlength: 16
            }
        },
        messages: {
            name: 'Укажите ваше имя',
            phone: {
                required: 'Укажите ваш телефон',
                minlength: 'Телефон должен состоять из 16-ти символов',
            }
        },
        submitHandler: function (form) {
            let token = document.head.querySelector('meta[name="csrf-token"]');

            if (!inProgress) {
                inProgress = true;
                $('#callbackFormResult')
                    .empty()
                    .addClass('d-none');

                $.ajax({
                    url: '/callback.html',
                    type: 'POST',
                    data: {name: callbackForm.name.value, phone: callbackForm.phone.value},
                    headers: {
                        'X-CSRF-TOKEN': (token) ? token.content : ''
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.success != 'OK') {
                            var message = '';
                            Object.keys(data.errors).map(function (k) {
                                var colName = '';
                                switch (k) {
                                    case 'phone':
                                        colName = 'Телефон';
                                        break;
                                    case 'name':
                                        colName = 'Имя';
                                        break;
                                    case 'mail':
                                        colName = 'Отправка письма';
                                        break;
                                }
                                message += '<p>' + colName + ': ' + data.errors[k][0] + '</p>';
                            });
                            $('#callbackFormResult')
                                .empty()
                                .removeClass('d-none')
                                .removeClass('text-success')
                                .addClass('text-danger')
                                .append(message);
                        } else {
                            $('#callbackForm').addClass('d-none');
                            $('#callbackFormResult')
                                .empty()
                                .removeClass('d-none')
                                .removeClass('text-danger')
                                .addClass('text-success')
                                .append("<p>Данные успешно отправлены</p>");

                            setTimeout(function () {
                                modal.modal('hide');
                                $(callbackForm).find('#phone').val('');
                                $(callbackForm).find('#name').val('');
                            }, 5000);
                        }
                    }
                })
                    .fail(function () {
                        inProgress = false;
                        $('#callbackFormResult')
                            .empty()
                            .removeClass('d-none')
                            .removeClass('text-success')
                            .addClass('text-danger')
                            .append("<p>Не удалось отправить сообщение</p>");
                    })
                    .always(function () {
                        inProgress = false;
                    });
            }
        }
    });

    $(callbackForm)
        .find('#phone')
        .mask('+7(000)000-0-000');
}