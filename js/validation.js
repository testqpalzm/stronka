$(function() {
	
	
    var num1 = (Math.floor(Math.random() * 9) + 1).toString(),
        num2 = (Math.floor(Math.random() * 9) + 1).toString(),
        sum = num1 + num2;

    $('#contact span.num1').text(num1);
    $('#contact span.num2').text(num2);
    $('#contact input[name="sum"]').val(sum);

    var sending = false;
    $('#contact').on('submit', function(e) {
        var $form = $(this), $submit = $('input[type="submit"]', $form);

        e.preventDefault();

        if (sending) {
            return false;
        }

        $('.form-error', $form).remove();

        $('input, textarea', $form).prop('readonly', true);
        $submit.val('Wysyłam…');
        sending = true;

        $.post($form.attr('action'), $form.serialize(), function(data) {
            if (data === 'ok') {
                $form.slideUp('fast', function() {
                    $form.after('<div class="form-success">Wiadomość została wysłana! <br>Skontaktujemy się z Tobą jak tylko będzie to możliwe.</div>');
                });

                return true;
            }

            $form.prepend('<div class="form-error">Wystąpił błąd podczas wysyłania formularza.<br> Upewnij się, że wypełniłeś wszystkie pola i poprawnie rozwiązałeś działanie.</div>');
            $('input, textarea', $form).prop('readonly', false);
            $submit.val('Wyślij');
            sending = false;

            return false;
        }, 'text');
    });
});