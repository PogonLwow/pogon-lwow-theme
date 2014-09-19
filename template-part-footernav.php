
<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
<?php global $dm_settings; ?>
    <nav class="footer-nav" role="navigation">
        <?php wp_nav_menu( array( 'theme_location'=>'footer_menu', 'menu_class' => 'footer-menu',)); ?>
    </nav>
<?php endif; ?>