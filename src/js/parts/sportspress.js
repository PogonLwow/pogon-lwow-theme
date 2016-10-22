(function() {
    $('.sportspress style').remove();
    $('.gallery-item a').addClass('link');

    $('.sp-team-name').each(function() {
        $(this).insertAfter($(this).parent().find('img'));
    });
})();
