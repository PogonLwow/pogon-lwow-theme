<?php global $dm_settings; ?>

<div class="container dmbs-container">

    <div class="row dmbs-header">

        <?php if ( get_header_image() !='' || get_header_textcolor() !='blank' ) : ?>

        <?php if ( get_header_image() !='' ) : ?>
        <div class="col-md-11 dmbs-header-img text-center">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></a>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="social col-md-5"><div class="watch-us">Zobacz nas na:</div>
            <a href="<?php echo $dm_settings['gplus'] ?>">
                <i class="icon-gplus social-icons gp"></i>
            </a>
            <a href="<?php echo $dm_settings['twitter'] ?>">
                <i class="icon-twitter social-icons tw"></i>
            </a>
            <a href="<?php echo $dm_settings['facebook'] ?>">
                <i class="icon-facebook social-icons fb"></i>
            </a>
        </div>

    </div>
