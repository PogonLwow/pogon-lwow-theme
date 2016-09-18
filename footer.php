<?php global $dm_settings; ?>
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
        <a class="link" href="<?php echo $dm_settings['vk'] ?>">
            <i class="icon-vkontakte social__icon social__icon--vk"></i>
        </a>
        <a class="link tw" href="<?php echo $dm_settings['twitter'] ?>">
            <i class="icon-twitter social__icon social__icon--tw"></i>
        </a>
        <a class="link fb" href="<?php echo $dm_settings['facebook'] ?>">
            <i class="icon-facebook social__icon social__icon--fb"></i>
        </a>
    </div>
    </div>

</div>
<?php wp_footer(); ?>
</body>

</html>
