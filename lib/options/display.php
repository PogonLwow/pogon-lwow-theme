<?php
function pgn_options_display() {
  global $version, $codename, $logo;
?>
    <div class="wrap options_wrap">
        <div id="icon-themes" class="icon32"></div>
        <header>
          <img src="<?php echo $logo;?>"/>
          <span><?php echo $version.' "'.$codename.'"'; ?></span>
        </header>
        <?php settings_errors(); ?>

        <?php
                $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'pgn_general_page';
        ?>

        <h2 class="nav-tab-wrapper">
            <a href="?page=pogonoptions&tab=pgn_general_page" class="nav-tab <?php echo $active_tab == 'pgn_general_page' ? 'nav-tab-active' : ''; ?>">Ogólne</a>
            <a href="?page=pogonoptions&tab=pgn_kontakt_page" class="nav-tab <?php echo $active_tab == 'pgn_kontakt_page' ? 'nav-tab-active' : ''; ?>">Kontakt</a>
        </h2>

            <?php
            if( $active_tab == 'pgn_general_page' ) {
                echo '<form method="post" action="options.php">';
                settings_fields( 'pgn_general_page_option' );
                do_settings_sections( 'pgn_general_page_option' );
                submit_button();
                echo '</form>';

            } elseif ($active_tab == 'pgn_kontakt_page') {
              echo '<form method="post" action="options.php">';
              settings_fields( 'pgn_kontakt_page_option' );
              do_settings_sections( 'pgn_kontakt_page_option' );
              submit_button();
              echo '</form>';
          }
            ?>

    </div>
<?php
}
