<body data-ajax-url="<?php echo admin_url('admin-ajax.php'); ?>" class="background--<?php echo get_theme_mod('purpose'); ?>">

<div class="container head">
    <div class="logoContainer">
        <a itemprop="url" class="logoContainer__logo logoContainer__logo--<?php echo get_theme_mod('purpose'); ?>" title="<?php bloginfo('name'); ?>" href="<?php echo site_url(); ?>" aria-label="Logo Pogoń Lwów" role="presentation"></a>
        <a class="link link--logo" href="<?php echo site_url(); ?>">
            <h1 itemprop="name" class="logoContainer__name"><?php bloginfo('name'); ?></h1>
        </a>
            <span class="logoContainer__desc"><?php bloginfo('description'); ?></span>
    </div>
    <div id="nav-trigger" class="head__trigger">
        <div class="navicon-button x">
            <div class="navicon"></div>
        </div>
    </div>

    <?php get_template_part('parts/social-links'); ?>

</div>
