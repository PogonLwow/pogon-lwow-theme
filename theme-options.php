<?php

load_theme_textdomain( 'pogonlwow', get_template_directory() . '/languages' );

/////////////////////////////////////////////////////////////////////
// Add DevDm Theme Options to the Appearance Menu and Admin Bar
////////////////////////////////////////////////////////////////////

    function theme_options_menu() {
        add_theme_page( 'Opcje ' . __('Pogoni','pogonlwow'), 'Opcje ' . __('Pogoni','pogonlwow'), 'manage_options', 'devdm-theme-options', 'devdm_theme_options' );
    }
    add_action( 'admin_menu', 'theme_options_menu' );

    add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );

    function toolbar_link_to_mypage( $wp_admin_bar ) {
        $args = array(
            'id'    => 'devdm_theme_options',
            'title' => __('Opcje Pogoni','pogonlwow'),
            'href'  => home_url() . '/wp-admin/themes.php?page=devdm-theme-options',
            'meta'  => array( 'class' => 'devdm-theme-options' ),
            'parent' => 'site-name'
        );
        $wp_admin_bar->add_node( $args );
    }

////////////////////////////////////////////////////////////////////
// Add admin.css enqueue
////////////////////////////////////////////////////////////////////

    function devdm_theme_style() {
        wp_enqueue_style('devdm-theme', get_template_directory_uri() . '/css/admin.css');
    }
    add_action('admin_enqueue_scripts', 'devdm_theme_style');

////////////////////////////////////////////////////////////////////
// Custom background theme support
////////////////////////////////////////////////////////////////////

    $defaults = array(
        'default-color'          => '',
        'default-image'          => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $defaults );

////////////////////////////////////////////////////////////////////
// Custom header theme support
////////////////////////////////////////////////////////////////////

    register_default_headers( array(
        'wheel' => array(
            'url' => '%s/img/def-logo.png',
            'thumbnail_url' => '%s/img/def-logo.png',
            'description' => __( 'Your Business Name', 'pogonlwow' )
        ))

    );

    $defaults = array(
        'default-image'          => get_template_directory_uri() . '/img/def-logo.png',
        'width'                  => 504,
        'height'                 => 140,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '000',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => 'devdm_admin_header_image',
    );
    add_theme_support( 'custom-header', $defaults );

    function devdm_admin_header_image() { ?>

        <div id="headimg">
            <?php
            $color = get_header_textcolor();
            $image = get_header_image();

            if ( $color && $color != 'blank' ) :
                $style = ' style="color:#' . $color . '"';
            else :
                $style = ' style="display:none"';
            endif;
            ?>


            <?php if ( $image ) : ?>
                <img src="<?php echo esc_url( $image ); ?>" alt="" />
            <?php endif; ?>
            <div class="dm_header_name_desc">
            <h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>

            </div>
        </div>

    <?php }

    function custom_header_text_color () {
        if ( get_header_textcolor() != 'blank' ) { ?>
            <style>
               .custom-header-text-color { color: #<?php echo get_header_textcolor(); ?> }
            </style>
    <?php }
    }

    add_action ('wp_head', 'custom_header_text_color');

////////////////////////////////////////////////////////////////////
// Register our settings options (the options we want to use)
////////////////////////////////////////////////////////////////////

    $dm_options = array(
        'show_postmeta' => true,
        'twitter' => '',
        'facebook' => '',
        'gplus' => '',
        'sspl' => '',
        'store' => '',
        'join' => ''
    );


    function dm_register_settings() {
        register_setting( 'dm_theme_options', 'dm_options', 'dm_validate_options' );
    }

    add_action ('admin_init', 'dm_register_settings');
    $dm_settings = get_option( 'dm_options', $dm_options );


////////////////////////////////////////////////////////////////////
// Validate Options
////////////////////////////////////////////////////////////////////

    function dm_validate_options( $input ) {

        global $dm_options;

        $settings = get_option( 'dm_options', $dm_options );
        
	    $input['twitter'] = wp_filter_nohtml_kses( $input['twitter'] );
	    $input['facebook'] = wp_filter_nohtml_kses( $input['facebook'] );
        $input['gplus'] = wp_filter_nohtml_kses( $input['vk'] );
        $input['sspl'] = wp_filter_nohtml_kses( $input['sspl'] );
        $input['store'] = wp_filter_nohtml_kses( $input['store'] );
        $input['join'] = wp_filter_nohtml_kses( $input['join'] );



        if ( ! isset( $input['show_postmeta'] ) ) {
            $input['show_postmeta'] = null;
        } else {
            $input['show_postmeta'] = ( $input['show_postmeta'] == 1 ? 1 : 0 );
        }

        return $input;
    }

////////////////////////////////////////////////////////////////////
// Display Options Page
////////////////////////////////////////////////////////////////////

    function devdm_theme_options() {

    if ( !current_user_can( 'manage_options' ) )  {
        wp_die('You do not have sufficient permissions to access this page.');
    }

        //get our global options
        global $dm_options, $developer_uri;

        //get our logo
        $logo = get_template_directory_uri() . '/img/logo.png'; ?>
           <div class="wrap">

            <div class="icon32" id="icon-options-general"></div>

            <h2>Motyw Pogoni Lwów</h2>
               <?php
               if ( ! isset( $_REQUEST['settings-updated'] ) )
               $_REQUEST['settings-updated'] = false; ?>
                <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
            <div class='saved'><p><strong><?php _e('Ustawienia zapisałem! Hej Pogoń!','pogonlwow') ;?></strong></p></div>
        <?php endif; ?>

        <form action="options.php" method="post">
            <?php
                $settings = get_option( 'dm_options', $dm_options );
                settings_fields( 'dm_theme_options' );
            ?>
            <table cellpadding='10'>

                <tr valign="top"><th scope="row"><?php _e('Pokaż datę','pogonlwow') ;?></th>
                    <td>
                        <input type="checkbox" id="show_postmeta" name="dm_options[show_postmeta]" value="1" <?php checked( true, $settings['show_postmeta'] ); ?> />
                        <label for="show_postmeta"><?php _e('Pokazuj datę i ewentualnie przycisk edycji w aktualnościach','pogonlwow') ;?></label>
                    </td>
                </tr>
                <tr valign="top"><th scope="row"><?php _e('Link do Twittera','pogonlwow') ;?></th>
                    <td>
                        <input type="text" id="twitter" name="dm_options[twitter]" value="<?php esc_attr_e($settings['twitter']); ?>" />
                        <label for="twitter"><?php _e('Link do Twittera','pogonlwow') ;?></label>
                    </td>
                </tr>
                <tr valign="top"><th scope="row"><?php _e('Link do Facebooka','pogonlwow') ;?></th>
                    <td>
                        <input type="text" id="facebook" name="dm_options[facebook]" value="<?php esc_attr_e($settings['facebook']); ?>" />
                        <label for="twitter"><?php _e('Link do strony facebooka Pogoni','pogonlwow') ;?></label>
                    </td>
                </tr>
                <tr valign="top"><th scope="row"><?php _e('Link do VK','pogonlwow') ;?></th>
                    <td>
                        <input type="text" id="gplus" name="dm_options[vk]" value="<?php esc_attr_e($settings['vk']); ?>" />
                        <label for="gplus"><?php _e('Link do strony VKontaktie Pogoni','pogonlwow') ;?></label>
                    </td>
                </tr>
                <tr valign="top"><th><h3>Prawa kolumna</h3></th></tr>
                <tr valign="top"><th scope="row"><?php _e('Link do SSPL','pogonlwow') ;?></th>
                    <td>
                        <input type="text" id="sspl" name="dm_options[sspl]" value="<?php esc_attr_e($settings['sspl']); ?>" />
                        <label for="sspl"><?php _e('Link do strony Sympatyków Pogoni Lwów','pogonlwow') ;?></label>
                    </td>
                </tr>
                <tr valign="top"><th scope="row"><?php _e('Link do sklepu','pogonlwow') ;?></th>
                    <td>
                        <input type="text" id="store" name="dm_options[store]" value="<?php esc_attr_e($settings['store']); ?>" />
                        <label for="store"><?php _e('Link do sklepu Pogoni Lwów','pogonlwow') ;?></label>
                    </td>
                </tr>
                <tr valign="top"><th><h3>Inne</h3></th></tr>
                <tr valign="top"><th scope="row"><?php _e('Gdzie ma prowadzić link','pogonlwow') ;?></th>
                    <td>
                        <input type="text" id="store" name="dm_options[join]" value="<?php esc_attr_e($settings['join']); ?>" />
                        <label for="store"><?php _e('"dołącz do naszych sponsorów"','pogonlwow') ;?></label>
                    </td>
                </tr>
            </table>
            <p class="submit">
                <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Zapisz','pogonlwow'); ?>" />
            </p>
        </form>
        </div>
<?php

}
?>
