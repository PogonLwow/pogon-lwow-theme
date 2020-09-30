
<?php global $general_options; ?>

<?php


// Następnie wywołujemy tę funkcję w HTMLu
?>
    <div class="container">
        <section class="section section--white section--red-deco section--main">
            <h4 class="section__title">Wspierają nas</h4>
            <div class="sponsors">
                <?php show_links('sponsors'); ?>
            </div>
        </section>
        <?php if (get_theme_mod('purpose') == 'club') { ?>

        <section class="section section--white section--red-deco section--side">
            <h4 class="section__title">Mecenasi</h4>
            <div class="patrons">
                <?php show_patrons('patrons'); ?>
                <div class="patrons--become">
                    <a class="btn btn--golden" href="http://<?php echo $general_options['patrons_pdf']; ?>">Zostań mecenasem</a>
                </div>
            </div>
        </section>
        <?php } ?>

    </div>



    <div class="container">
        <section class="section section--white section--red-deco section--main">
            <h4 class="section__title">Kluby partnerskie</h4>
            <div class="sponsors">
                <?php show_links('partnerships'); ?>
            </div>
        </section>
            <section class="section section--white section--red-deco section--side">
                <h4 class="section__title">Współpraca</h4>
                <div class="sponsors">
                    <?php show_links('collabs'); ?>
                </div>
            </section>
    </div>
