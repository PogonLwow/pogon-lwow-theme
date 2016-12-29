    // $("#nav-mobile").html($("#nav-main").html());
    $("#nav-trigger .navicon-button").click(function() {
        console.info('Burger clicked');
        if ($(".topbar").hasClass("topbar--expanded")) {
            $(".topbar").removeClass("topbar--expanded");
            $(this).removeClass("open");
        } else {
            $(".topbar").addClass("topbar--expanded");
            $(this).addClass("open");
        }
    });
