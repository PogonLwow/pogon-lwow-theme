<?php global $general_options; ?>
<div class="footer container">
    <div class="footer__ct">
        <div class="copyright">
            <?php echo comicpress_copyright(); ?> <strong>Lwowski Klub Sportowy POGOŃ LWÓW</strong>
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
    <div class="social">
        <a class="link link--social link--vk" href="<?php echo $general_options['vk_link'] ?>">
            <i class="icon-vkontakte "></i>
        </a>
        <a class="link link--social link--tw" href="<?php echo $general_options['twitter_link'] ?>">
            <i class="icon-twitter"></i>
        </a>
        <a class="link link--social link--fb" href="<?php echo $general_options['fb_link']; ?>">
            <i class="icon-facebook "></i>

        </a>
    </div>
    </div>

</div>
<?php wp_footer(); ?>
</body>
</html>
