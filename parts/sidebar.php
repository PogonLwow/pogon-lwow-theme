<section class="section section--side">
    <?php dynamic_sidebar( 'Right Sidebar' ); ?>

    <?php if (get_theme_mod('purpose') == 'club') { ?>
    <div class="sblockContainer">
        <div class="sblock">
        <h3 class="sblock__title">Pozycja</h3>

            <div class="sblock__pos">
                <?php echo get_theme_mod('position'); ?>
            </div>
            <span class="sblock__posLabel">miejsce</span>
            <div class="sblock__table">
                <a class="link link--nav" href="<?php echo get_permalink(get_theme_mod('table-url')) ?>"><i class="icon-medal medal"></i> Pełna tabela ligowa</a>
            </div>

        </div>

        <a href="<?php echo get_permalink(get_theme_mod('shop-url')); ?>">

            <div class="sblock sblock--shop">
                    <a class="link link--footer link--shop" href="<?php echo get_permalink(get_theme_mod('shop-url')); ?>">
                        SKLEP <br />INTERNETOWY
                    </a>
            </div>
        </a>

    </div>
    <?php } elseif (get_theme_mod('purpose') == 'foundation') {?>
            <section class="section section--white section--red-deco section--side section--margin-bottom-20">
                <h4 class="section__title">Nasi partnerzy</h4>
                <div class="sponsors">
                    <?php show_links('partnerships'); ?>
                </div>
            </section>
                <section class="section section--white section--red-deco section--side section--margin-bottom-20">
                    <h4 class="section__title">Współpraca</h4>
                    <div class="sponsors">
                        <?php show_links('collabs'); ?>
                    </div>
                </section>

                <section class="section section--white section--red-deco section--side section--margin-bottom-20">
                    <h4 class="section__title">Wspierają nas</h4>
                    <div class="sponsors">
                        <?php show_links('sponsors'); ?>
                    </div>
                </section>
    <?php } ?>

</section>
