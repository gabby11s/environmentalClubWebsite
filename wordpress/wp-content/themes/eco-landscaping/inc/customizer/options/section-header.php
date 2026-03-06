<?php
/**
 * Theme Customizer Controls
 *
 * @package Eco Landscaping
 */

if ( ! function_exists( 'eco_landscaping_customizer_header_register' ) ) :
function eco_landscaping_customizer_header_register( $wp_customize ) {

    $wp_customize->add_section(
        'eco_landscaping_home_header_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Header Settings', 'eco-landscaping' )
        )
    );
    
    // Title label
    $wp_customize->add_setting( 
        'eco_landscaping_label_social_meida_settings_title', 
        array(
            'sanitize_callback' => 'eco_landscaping_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_social_meida_settings_title', 
        array(
            'label'       => esc_html__( 'Social Media Links', 'eco-landscaping' ),
            'section'     => 'eco_landscaping_home_header_settings',
            'type'        => 'eco-landscaping-title',
            'settings'    => 'eco_landscaping_label_social_meida_settings_title',
        ) 
    ));

    // Facebook Link
    $wp_customize->add_setting(
        'eco_landscaping_social_media1_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_social_media1_heading',
        array(
            'label'           => sprintf( esc_html__( 'Facebook Link', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_header_settings',
            'settings'        => 'eco_landscaping_social_media1_heading' ,
            'type'            => 'url',
        )
    );

    // Instagram Link
    $wp_customize->add_setting(
        'eco_landscaping_social_media2_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_social_media2_heading',
        array(
            'label'           => sprintf( esc_html__( 'Instagram Link', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_header_settings',
            'settings'        => 'eco_landscaping_social_media2_heading' ,
            'type'            => 'url',
        )
    );

    // Twitter Link
    $wp_customize->add_setting(
        'eco_landscaping_social_media3_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_social_media3_heading',
        array(
            'label'           => sprintf( esc_html__( 'Twitter Link', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_header_settings',
            'settings'        => 'eco_landscaping_social_media3_heading' ,
            'type'            => 'url',
        )
    );

    // Youtube Link
    $wp_customize->add_setting(
        'eco_landscaping_social_media4_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_social_media4_heading',
        array(
            'label'           => sprintf( esc_html__( 'Youtube Link', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_header_settings',
            'settings'        => 'eco_landscaping_social_media4_heading' ,
            'type'            => 'url',
        )
    );

    // Pinterest Link
    $wp_customize->add_setting(
        'eco_landscaping_social_media5_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_social_media5_heading',
        array(
            'label'           => sprintf( esc_html__( 'Pinterest Link', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_header_settings',
            'settings'        => 'eco_landscaping_social_media5_heading' ,
            'type'            => 'url',
        )
    );

    // Linkedin Link
    $wp_customize->add_setting(
        'eco_landscaping_social_media6_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_social_media6_heading',
        array(
            'label'           => sprintf( esc_html__( 'Linkedin Link', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_header_settings',
            'settings'        => 'eco_landscaping_social_media6_heading' ,
            'type'            => 'url',
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'eco_landscaping_label_header_settings_title', 
        array(
            'sanitize_callback' => 'eco_landscaping_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_header_settings_title', 
        array(
            'label'       => esc_html__( 'Contact Detail', 'eco-landscaping' ),
            'section'     => 'eco_landscaping_home_header_settings',
            'type'        => 'eco-landscaping-title',
            'settings'    => 'eco_landscaping_label_header_settings_title',
        ) 
    ));

    $wp_customize->add_setting(
        'eco_landscaping_topbar_email_id',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_topbar_email_id',
        array(
            'label'           => sprintf( esc_html__( 'Email Id', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_header_settings',
            'settings'        => 'eco_landscaping_topbar_email_id' ,
            'type'            => 'text',
        )
    );

    $wp_customize->add_setting(
        'eco_landscaping_topbar_address',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_topbar_address',
        array(
            'label'           => sprintf( esc_html__( 'Address', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_header_settings',
            'settings'        => 'eco_landscaping_topbar_address' ,
            'type'            => 'text',
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'eco_landscaping_label_header_search_settings_title', 
        array(
            'sanitize_callback' => 'eco_landscaping_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_header_search_settings_title', 
        array(
            'label'       => esc_html__( 'Search Bar', 'eco-landscaping' ),
            'section'     => 'eco_landscaping_home_header_settings',
            'type'        => 'eco-landscaping-title',
            'settings'    => 'eco_landscaping_label_header_search_settings_title',
        ) 
    ));

     // Hide Search bar
    $wp_customize->add_setting(
        'eco_landscaping_search_hide',
        array(
            'type' => 'theme_mod',
            'default'           => false,
            'sanitize_callback' => 'eco_landscaping_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Eco_Landscaping_Toggle_Control( $wp_customize, 'eco_landscaping_search_hide', 
        array(
            'settings'      => 'eco_landscaping_search_hide',
            'section'       => 'eco_landscaping_home_header_settings',
            'type'          => 'eco-landscaping-toggle',
            'label'         => esc_html__( 'Show\Hide Search', 'eco-landscaping' ),
            'description'   => '',           
        )
    ));
    
     // header Button
    $wp_customize->add_setting(
        'eco_landscaping_header_button_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_header_button_link',
        array(
            'label'           => sprintf( esc_html__( 'Header Button Link', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_header_settings',
            'settings'        => 'eco_landscaping_header_button_link' ,
            'type'            => 'url',
        )
    );
}
endif;

add_action( 'customize_register', 'eco_landscaping_customizer_header_register' );