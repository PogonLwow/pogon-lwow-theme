(function() {
    var ajax_url = $('body').attr('data-ajax-url');
    var post_offset = 0;
    var incNumber = 6; // ilość postów do załadowania

    var projects = (function(setProjects) {
        var loaded;
        var total;
        return {
            incLoaded: function() {
                loaded = loaded + incNumber;
            },
            getLoaded: function() {
                return loaded;
            },
            setLoaded: function(setProjects) {
                loaded = setProjects;
            },
            setTotal: function(setProjects) {
                total = setProjects;
            },
            getTotal: function() {
                return total;
            }
        };
    })();
    var loadingButton = (function(button){
        return {
            showSpinner: function(button) {
                button.html('Ładuję starsze...');
            },
            showCaption: function(button) {
                button.html('Zobacz starsze');
            },
            hide: function(button) {
                button.hide();
            }
        };
    })();

    $('#load_more_posts').on('click', loadMore);

    function loadMore() {
        console.log('Clicked load_more');
        $(this).html('Ładuję...');
        post_offset = parseInt(post_offset) + 6;
        $.ajax({
            url: ajax_url,
            type: 'POST',
            data: {
                action: 'load_posts',
                post_offset: post_offset,
            },
            success: function(data) {
                $('#load_more_posts').html('Zobacz starsze');
                $('#feed').append(data);
                console.info('Ajax: OK');
                bLazy.revalidate();
                cardExcerpt();
            }
        });
    }

})();
