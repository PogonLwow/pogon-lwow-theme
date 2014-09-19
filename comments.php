<?php if ( is_single() || is_page() ) : ?>
<a name="comments"></a>
<h1 class="h1-comm col-md-16"><?php echo get_comments_number(); echo odmiana(get_comments_number(),' Komentarz',' Komentarze',' Komentarzy'); ?></h1>
    <?php if ( have_comments() && comments_open() ) : ?>
    <ul class="commentlist col-md-16">
        <?php wp_list_comments(); ?>
        <?php paginate_comments_links(); ?>
        <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
    </ul>
<div class="well col-md-16">
    <?php comment_form(); ?>
</div>
<?php else : if ( comments_open() ) : ?>
<div class="well  col-md-16">
    <?php comment_form(); ?>
</div>
<?php endif; endif; ?>
<?php endif; ?>