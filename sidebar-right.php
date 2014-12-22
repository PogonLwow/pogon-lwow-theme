<?php
    global $dm_settings;
 ?>
    <div class="col-md-6 dmbs-right">
        <?php //get the right sidebar
        dynamic_sidebar( 'Right Sidebar' ); ?>
        <div class="half">
            <div class="position">Pozycja w rankingu</div>
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
