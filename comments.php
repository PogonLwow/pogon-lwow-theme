<?php if ( is_single() || is_page() ) :
////////////////////////////////////////
//ZMODYFIKOWANA FORMA DLA KOMENTARZY////
////////////////////////////////////////

$comment_args = array( 'title_reply'=>'Napisz komentarz',

'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Imię*' ) . '</label> '.'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',

    'email'  => '<p class="comment-form-email">' . '<label for="email">' . __( 'Email*' ) . '</label> ' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.'</p>',

    'url'    => '' ) ),

    'comment_field' => '<p>' . '<label for="comment">' . __( 'Przemawiaj*' ) . '</label>' . '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' . '</p>',

    'comment_notes_after' => '',

);
?>
<a name="comments"></a>
<h1 class="h1-comm col-md-16"><?php echo get_comments_number(); echo odmiana(get_comments_number(),' Komentarz',' Komentarze',' Komentarzy'); ?></h1>
    <?php if ( have_comments() && comments_open() ) : ?>
    <ul class="commentlist col-md-16">
        <?php wp_list_comments(); ?>
        <?php paginate_comments_links(); ?>
        <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
    </ul>
<div class="well col-md-16">
    <?php comment_form($comment_args); ?>
</div>
<?php else : if ( comments_open() ) : ?>
<div class="well  col-md-16">
    <?php comment_form($comment_args); ?>
</div>
<?php endif; endif; ?>
<?php endif; ?>
