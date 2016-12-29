<?php global $general_options; ?>

<section class="section section--side">
    <?php dynamic_sidebar( 'Right Sidebar' ); ?>
    <div class="sblockContainer">
        <div class="sblock">
        <h3 class="sblock__title">Pozycja</h3>

            <div class="sblock__pos">
                <?php echo $general_options['position']; ?>
            </div>
            <span class="sblock__posLabel">miejsce</span>
            <div class="sblock__table">
                <a class="link link--nav" href="<?php echo $dm_settings['tabela'] ?>"><i class="icon-medal medal"></i> Pełna tabela ligowa</a>
            </div>

    </div>

    <a href="<?php echo $general_options['store_link']; ?>">

    <div class="sblock sblock--shop">
            <a class="link link--footer link--shop" href="<?php echo $general_options['store_link']; ?>">
                SKLEP <br />INTERNETOWY
            </a>
    </div>
</a>

    </div>

</section>
