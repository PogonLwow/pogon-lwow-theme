<?php global $dm_settings; ?>
<body <?php body_class(); ?>>

<div class="container head">
    <div class="logoContainer">
        <a itemprop="url" class="logoContainer__logo" title="<?php bloginfo('name'); ?>" href="<?php echo site_url(); ?>" aria-label="Logo Pogoń Lwów" role="presentation"></a>
        <a class="link link--logo" href="<?php echo site_url(); ?>">
            <h1 itemprop="name" class="logoContainer__name"><?php bloginfo('name'); ?></h1>
        </a>
            <span class="logoContainer__desc">Oficjalna strona klubu</span>
    </div>

        <div class="social col-md-5"><div class="watch-us">Zobacz nas na:</div>
            <a href="<?php echo $dm_settings['vk'] ?>">
                <i class="icon-vkontakte social-icons vk"></i>
            </a>
            <a href="<?php echo $dm_settings['twitter'] ?>">
                <i class="icon-twitter social-icons tw"></i>
            </a>
            <a href="<?php echo $dm_settings['facebook'] ?>">
                <i class="icon-facebook social-icons fb"></i>
            </a>
        </div>
</div>
