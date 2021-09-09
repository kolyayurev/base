<div class="buttons-panel__item -green" id="button-up">
    <img src="{{ asset('img/icons/ico-arrow-up.svg') }}" alt="^" class="image">
</div>
@push('scripts')
<script>
$(document).ready(function(){

    if ($(window).scrollTop() > 500) {
        $('#button-up').css("display", "flex").fadeIn(0);
    } else {
        $('#button-up').fadeOut(0);
    }

    $(window).scroll(function () {
        // Если отступ сверху больше 50px то показываем кнопку "Наверх"
        if ($(this).scrollTop() > 500) {
            $('#button-up').css("display", "flex").fadeIn();
        } else {
            $('#button-up').fadeOut();
        }
    });
    

    /** При нажатии на кнопку мы перемещаемся к началу страницы */
    $('#button-up').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
    
});
</script>
@endpush