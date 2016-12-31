<?php global $general_options; ?>
<body data-ajax-url="<?php echo admin_url('admin-ajax.php'); ?>">

<div class="container head">
    <div class="logoContainer">
        <a itemprop="url" class="logoContainer__logo" title="<?php bloginfo('name'); ?>" href="<?php echo site_url(); ?>" aria-label="Logo Pogoń Lwów" role="presentation"></a>
        <a class="link link--logo" href="<?php echo site_url(); ?>">
            <h1 itemprop="name" class="logoContainer__name"><?php bloginfo('name'); ?></h1>
        </a>
            <span class="logoContainer__desc">Oficjalna strona klubu</span>
    </div>
    <div id="nav-trigger" class="head__trigger">
        <div class="navicon-button x">
            <div class="navicon"></div>
        </div>
    </div>

        <div class="social">
            <span class="social__followUs">Zobacz nas na:</span>
            <a class="link link--social link--vk" href="<?php echo $general_options['vk_link'] ?>">
                <i class="icon-vkontakte"></i>
            </a>
            <a class="link link--social link--tw" href="<?php echo $general_options['twitter_link'] ?>">
                <i class="icon-twitter social__icon social__icon--tw"></i>
            </a>
            <a class="link link--social link--fb" href="<?php echo $general_options['fb_link'] ?>">
                <i class="icon-facebook social__icon social__icon--fb"></i>
            </a>
        </div>
</div>
