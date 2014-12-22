<?php
    global $dm_settings;
 ?>
    <div class="col-md-6 dmbs-right">
        <?php //get the right sidebar
        dynamic_sidebar( 'Right Sidebar' ); ?>
        <div class="half">
            <div class="position">
                <h3>Pozycja</h3>

                <div class="pos-number"><?php echo $dm_settings['position'] ?></div>
                <div>miejsce</div>
                <div class="table-link">
                    <a href="<?php echo $dm_settings['tabela'] ?>"><i class="icon-medal medal"></i> Pełna tabela ligowa</a>
                </div>

        </div>
            </div>


        <div class="half">
        <div class="sklep">
            <a href="<?php echo $dm_settings['store'] ?>">
                <img src="<?php bloginfo('template_directory'); ?>/img/sklep.jpg"/>
            </a>
        </div>
            </div>
                    <div style="clear:both;"></div>

    </div>
