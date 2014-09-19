<?php
/**
 * The template for displaying Content
 */
?>
            <?php // theloop

if (have_posts()):
    while (have_posts()):
        the_post();
        
        // single post
        
        if (is_single()):
?>
    <div class="is-single">
        <div <?php post_class(); ?>>
            <h2 class="post-header"><?php the_title(); ?></h2>
            <div class="before-text">
                <div class="special-row">
                    <div class="col-md-3">
                        <div class="single-date">
                            <div class="day"><?php echo get_the_date('d'); ?></div>
                            <?php echo get_the_date('F Y'); ?>
                        </div>
                    </div>
                    <!--Obrazek główny wpisu-->
                    <div class="col-md-10 post-image"> 
                        <?php if (has_post_thumbnail()) { 
                        the_post_thumbnail('large');
                        } else { ?>
                        <img height="460" width="750" src="<?php bloginfo('template_directory'); ?>/img/def-post-icon.jpg"/>
                        <?php  } ?>
                    </div>
                    <!--Autor, licznik komentarze i inne -->
                    <div class="col-md-3">
                        <div class="single-author"><?php the_author(); ?></div>
                        <div class="comm-number"> 
                            <div class="number"><?php echo get_comments_number(); ?></div>
                            <?php echo odmiana(get_comments_number(), 'komentarz', 'komentarze', 'komentarzy'); ?>
                        </div>
                        <div class="share">
                            <?php //kostyl 
                            
                            if ('sp_event' != get_post_type()) { ?>
                            
                            
                            
                            <a href="http://www.facebook.com/share.php?u=<?php echo urlencode( the_permalink() ); ?>&p[title]=<?php echo the_title(); ?>" onclick="window.open(this.href, this.title, 'toolbar=0, status=0, width=548, height=325'); return false" title="Podziel się na Facebooku" target="_parent">
                                <i class="icon-facebook social-icons"></i>
                            </a>
                            <a title="Tweetnij o Pogoni" onclick="window.open(this.href, this.title, 'toolbar=0, status=0, width=548, height=325'); return false" target="_parent" href="http://twitter.com/share?text=<?php echo the_title(); ?>&via=pogonlwow&related=pogonlwoiw&url=<?php echo urlencode( the_permalink() ) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false" >                            
                                <i class="icon-twitter social-icons"></i>
                            </a>
                            <?php } ?>
                            <a href="https://plus.google.com/share?url=<?php echo urlencode( the_permalink() ) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false">
                            <i class="icon-gplus social-icons"></i>
                            </a>
                        </div>
                    </div><!--Koniec licznika komentarzy i innych-->
                </div>
            </div><!--Koniec before-text -->
            <div class="text col-md-16"><?php the_content(); ?></div>
            <?php  wp_link_pages(); ?>
        </div><!--KONIEC klasy postów-->

        <?php comments_template(); ?>
        <?php // list of posts
              // if have thumb
        else: // spis aktualności ?>

        <a class="tease" href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Czytaj %s', 'pogonlwow'), the_title_attribute('echo=0'))); ?>" rel="bookmark">
            <?php if (has_post_thumbnail()) {
                    $thumb_id  = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src($thumb_id, 'medium', true); ?>
            <div class="post-teaser" style="background-image: url(<?php echo $thumb_url[0]; ?>);">
            <?php } else { //jeśli obrazku nie ma, to wykorzystujemy defaultowy?>
            <div class="post-teaser" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/def-thumb.jpg);">
            <?php } ?>
                <div class="teaser">
                    <div class="read-more">&rsaquo;</div>
                    <h2 class="post-header"> <?php the_title(); ?></h2>
                    <?php the_excerpt(); ?> 
                </div><!--KONIEC teasera-->
                <?php wp_link_pages();                             
                      get_template_part('template-part', 'postmeta'); 
                ?>
            </div><!--KONIEC .post-teaser-->
        </a><!--KONIEC a.tease-->
        <?php endif;
            endwhile;
            numbered_pagination();
            else:
            get_404_template();
            endif;
        ?>
