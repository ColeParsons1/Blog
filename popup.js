$(function() {
    //cancel upload button click, show popup box
    $('#cancel-upload').click(function () {
        $('.dv_popup').fadeIn("slow");
    });

    //cancel/reset popup box controls
    $('.close').click(function () {
        $('.dv_popup').fadeOut("slow");
    });

    $('#cancel-upload-confirm').click(function() {
        $('.dv_popup').fadeOut("slow");
    });

    $('#do-not-cancel-upload-confirm').click(function() {
        $('.dv_popup').fadeOut("slow");
    });

});