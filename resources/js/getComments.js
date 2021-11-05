$(document).ready(function () {
    $('.in').click(function () {
        $('#comments_section').load('http://localhost/all?' + $(this).attr('id'));
        console.log($(this).attr('id'));
    });
});
