(function() {
    'use strict';

    $(document).ready(function() {
        // $("#nav-mobile").html($("#nav-main").html());
        $("#nav-trigger .navicon-button").click(function() {
            console.info('Burger clicked');
            if ($(".topbar").hasClass("topbar--expanded")) {
                $(".topbar").removeClass("topbar--expanded").slideUp(250);
                $(this).removeClass("open");
            } else {
                $(".topbar").addClass("topbar--expanded").slideDown(250);
                $(this).addClass("open");
            }
        });
    });
})();
