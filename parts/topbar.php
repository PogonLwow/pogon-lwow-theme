
    <div class="container topbar">
        <nav class="topbar__navbar" role="navigation">
                <?php wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'depth' => 2,
                    'container' => '',
                    'container_class' => '',
                    'menu_class' => 'topbar__menu',
                    'menu' => 'Main Menu',
                    'container_id' => 'cssmenu',
                    'walker' => new topbar_Menu_Walker(),
)); ?>
        </nav>
    <div class="search">
        <form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
        <input type="text" name="s" id="search" value="szukaj..." class="search__box" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
        <button type="submit" class="search__btn">
            <i class="icon-search"></i>
        </button>
        </form>
    </div>
</div>
