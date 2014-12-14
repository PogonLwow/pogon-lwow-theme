<?php global $dm_settings; ?>
<div class="footer row">
    <div class="copyright-and-tribute col-md-4 no-padding">
        <div class="copyright">
            <?php echo comicpress_copyright(); ?> <strong>Lwowski Klub Sportowy POGOŃ LWÓW</strong>
            <br>Wszelkie prawa zastrzeżone.</div>
        <div class="tribute">
            <div class="graf">Grafika: <a href="http://wiktorkolodziej.pl">wiktorkolodziej.pl</a>
            </div>
            <div class="real">Realizacja: <a href="http://twitter.com/stsdc">stsdc</a>
            </div>
        </div>
    </div>
    <div class="col-md-12 no-padding">
        <a href="<?php echo $dm_settings['vk'] ?>">
            <i class="icon-vkontakte social-icons vk"></i>
        </a>
        <a href="<?php echo $dm_settings['twitter'] ?>">
            <i class="icon-twitter social-icons tw"></i>
        </a>
        <a href="<?php echo $dm_settings['facebook'] ?>">
            <i class="icon-facebook social-icons fb"></i>
        </a>
            <?php get_template_part( 'template-part', 'footernav'); ?>
    </div>
</div>

</div>
<!-- end main container -->

<?php wp_footer(); ?>
</body>

</html>
