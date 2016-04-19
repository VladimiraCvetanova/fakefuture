$(document).ready(function () {
    $(".img_from_galery").hover(function () {
        $('.hover_div').css("visibility", "visible");
    },

    function () {
        $('.hover_div').css('visibility', 'hidden');
    });
});


