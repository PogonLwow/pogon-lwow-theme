(function() {
    var ajax_url = $('body').attr('data-ajax-url');
    var post_offset = 0;
    var incNumber = 6; // ilość postów do załadowania

    $('#load_more_posts').on('click', loadMore);
    $('#load_more_searched_posts').on('click', loadMoreSearched);

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



    function loadMoreSearched() {
        console.log('Clicked load_more_searched');
        $(this).html('Ładuję...');
        post_offset = parseInt(post_offset) + 6;
        $.ajax({
            url: ajax_url,
            type: 'POST',
            data: {
                action: 'load_searched_posts',
                post_offset: post_offset,
                s: document.getElementById("searchQuery").getAttribute("data-search-query")
            },
            success: function(data) {
                $('#load_more_searched_posts').html('Więcej wyników');
                $('#feed').append(data);
                console.info('Ajax: OK');
                bLazy.revalidate();
                cardExcerpt();
            }
        });
    }

})();
