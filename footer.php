<?php global $general_options; ?>
<div class="footer container">
    <div class="footer__ct">
        <div class="copyright">
            <?php if (get_theme_mod('purpose') == 'club') { ?>
                <?php echo comicpress_copyright(); ?> <strong>Lwowski Klub Sportowy POGOŃ LWÓW</strong>
            <?php } elseif (get_theme_mod('purpose') == 'foundation') { ?>
                <?php echo comicpress_copyright(); ?> <strong><?php bloginfo('name'); ?></strong>
            <?php } ?>
            <br>Wszelkie prawa zastrzeżone.</div>
        <div class="tribute">
            <div class="tribute__design">Grafika: <a class="link link--footer" href="http://wiktorkolodziej.pl">wiktorkolodziej.pl</a>
            </div>
            <div class="tribute__code">Kod: <a class="link link--footer" href="http://github.com/stsdc">Stanisław</a>
            </div>
        </div>
    </div>
    <div class="footer__ns">
        <div class="footernav">
        <nav class="footernav__navbar" role="navigation">
                <?php wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'depth' => 2,
                    'container' => '',
                    'container_class' => '',
                    'menu_class' => 'footernav__menu',
                    'menu' => 'Footer Menu',
                    'container_id' => '',
                    'walker' => new footer_Menu_Walker(),
                )); ?>
        </nav>
    </div>
    <?php get_template_part('parts/social-links'); ?>

    </div>

</div>
<?php wp_footer(); ?>
</body>
</html>
