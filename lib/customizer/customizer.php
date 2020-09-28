<?php


function pogon_theme_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'pogon_theme_special_settings_section' , array(
        'title'    => __( 'Specjalne ustawienia motywu Pogoni', 'pogon_theme' ),
        'priority' => 1
    ) );   

    $wp_customize->add_setting( 'purpose', array(
        'default' => 'club',
            'sanitize_callback' => 'esc_attr',
      ) );
    
        $wp_customize->add_control( 'purpose', array(
            'type' => 'radio',
            'label' => __( 'Przeznaczenie', 'pogon_theme' ),
            'section' => 'pogon_theme_special_settings_section',
            'choices' => array(
                    'club' => __( 'Jako Klub', 'pogon_theme' ),
                    'foundation' => __( 'Jako Fundacja', 'pogon_theme' ),
            ),
      ) );


      
      $wp_customize->add_setting( 'position', array(
        'default' => '',
            'sanitize_callback' => 'esc_attr',
      ) );

      $wp_customize->add_control( 'position', array(
        'type' => 'number',
        'label' => __( 'Pozycja w tabeli', 'pogon_theme' ),
        'section' => 'pogon_theme_special_settings_section',
    ) );

    $wp_customize->add_setting( 'facebook-url', array(
        'default' => '',
            'sanitize_callback' => 'esc_attr',
      ) );

      $wp_customize->add_control( 'facebook-url', array(
        'type' => 'text',
        'label' => __( 'Link do fanpage', 'pogon_theme' ),
        'section' => 'pogon_theme_special_settings_section',
    ) );

    $wp_customize->add_setting( 'twitter-url', array(
        'default' => '',
            'sanitize_callback' => 'esc_attr',
      ) );

      $wp_customize->add_control( 'twitter-url', array(
        'type' => 'text',
        'label' => __( 'Link do twittera', 'pogon_theme' ),
        'section' => 'pogon_theme_special_settings_section',
    ) );

    $wp_customize->add_setting( 'shop-url', array(
        'default' => '',
            'sanitize_callback' => 'esc_attr',
      ) );

      $wp_customize->add_control( 'shop-url', array(
        'type' => 'text',
        'label' => __( 'Link do sklepu', 'pogon_theme' ),
        'section' => 'pogon_theme_special_settings_section',
    ));

    $wp_customize->add_setting( 'shop-url', array(
        'default' => './shop',
            'sanitize_callback' => 'themeslug_sanitize_dropdown_pages',
      ) );

      $wp_customize->add_control( 'shop-url', array(
        'type' => 'dropdown-pages',
        'label' => __( 'Strona sklepu', 'pogon_theme' ),
        'section' => 'pogon_theme_special_settings_section',
    ));

    $wp_customize->add_setting( 'table-url', array(
        'default' => '',
            'sanitize_callback' => 'themeslug_sanitize_dropdown_pages',
      ) );

      $wp_customize->add_control( 'table-url', array(
        'type' => 'dropdown-pages',
        'label' => __( 'Strona tabeli', 'pogon_theme' ),
        'section' => 'pogon_theme_special_settings_section',
    ));
  }
  add_action( 'customize_register', 'pogon_theme_customize_register' );
 
  function themeslug_sanitize_dropdown_pages( $page_id, $setting ) {
    // Ensure $input is an absolute integer.
    $page_id = absint( $page_id );
  
    // If $page_id is an ID of a published page, return it; otherwise, return the default.
    return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
  }
?>