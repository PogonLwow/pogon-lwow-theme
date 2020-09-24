<?php


function pogon_theme_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'pogon_theme_special_settings_section' , array(
        'title'    => __( 'Specjalne ustawienia motywu Pogoni', 'pogon_theme' ),
        'priority' => 1
    ) );   

    $wp_customize->add_setting( 'purpose', array(
        'default' => '2',
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
  }
  add_action( 'customize_register', 'pogon_theme_customize_register' );

?>