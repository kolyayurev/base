


$(window).on('load', function () {
    $('.btn-header-burger').click(function(e){
        e.preventDefault();
        if($('.mobile-menu').data('hidden') === true)
            openMenu();
        else
            closeMenu();
    });

});
$(window).on('orientationchange', function () {
    $('.modal-search').hide();
    closeMenu();
});
$(window).on('resize', function () {
    closeMenu();
});
$(document).ready(function () {
    $('#loading_overflow').fadeOut(200);
    $('body').removeClass('overflow-hidden');
    // Share
    var popupSize = {
        width: 780,
        height: 550
    };
    $(document).on('click', '.share__link ', function (e) {
        var verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width=' + popupSize.width + ',height=' + popupSize.height +
            ',left=' + verticalPos + ',top=' + horisontalPos +
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });

    $(document).on('click', '.btn-feedback', function (e) {
        e.preventDefault();
        // if($(this).data('service'))
        //     vueModals.$refs.dialogReview.setService($(this).data('service'));

        vueModals.$refs.dialogFeedback.openDialog();
    });

});

function openMenu(){
    $('.mobile-menu').css("display", "flex").hide().slideDown();
    $('body').addClass('overflow-hidden');
    $('.mobile-menu').data('hidden',false)
}
function closeMenu(){
    $('.mobile-menu').slideUp();
    $('body').removeClass('overflow-hidden');
    $('.mobile-menu').data('hidden',true);
}

