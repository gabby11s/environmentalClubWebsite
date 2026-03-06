<?php
/**
 * Theme Customizer Controls
 *
 * @package Eco Landscaping
 */

if ( ! function_exists( 'eco_landscaping_customizer_home_banner_register' ) ) :
function eco_landscaping_customizer_home_banner_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'eco_landscaping_home_banner_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Banner Settings', 'eco-landscaping' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'eco_landscaping_label_banner_settings_title', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_banner_settings_title', 
		array(
		    'label'       => esc_html__( 'Banner Settings', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_home_banner_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_label_banner_settings_title',
		) 
	));

    $wp_customize->add_setting(
        'eco_landscaping_banner_image',
        array(
            'default'           => '',
            'sanitize_callback' => 'eco_landscaping_sanitize_image',

        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'eco_landscaping_banner_image', 
            array(
                'label'           => sprintf( esc_html__( 'Banner Image', 'eco-landscaping' ), ),
                'settings'  => 'eco_landscaping_banner_image',
                'section'   => 'eco_landscaping_home_banner_settings'
            ) 
        )
    );

    $wp_customize->add_setting(
        'eco_landscaping_banner_small_head',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_banner_small_head',
        array(
            'label'           => sprintf( esc_html__( 'Banner Small Heading', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_banner_settings',
            'settings'        => 'eco_landscaping_banner_small_head' ,
            'type'            => 'text',
        )
    );

    // Banner Heading
    $wp_customize->add_setting(
        'eco_landscaping_banner_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_banner_heading',
        array(
            'label'           => sprintf( esc_html__( 'Banner Heading', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_banner_settings',
            'settings'        => 'eco_landscaping_banner_heading' ,
            'type'            => 'text',
        )
    );

    // banner Button
    $wp_customize->add_setting(
        'eco_landscaping_banner_button_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_banner_button_link',
        array(
            'label'           => sprintf( esc_html__( 'Banner Button Link', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_banner_settings',
            'settings'        => 'eco_landscaping_banner_button_link' ,
            'type'            => 'url',
        )
    );

    // Slider Content Alignment Setting
    $wp_customize->add_setting(
        'eco_landscaping_slider_content_alignment',
        array(
            'default'           => 'left',
            'sanitize_callback' => 'eco_landscaping_sanitize_select',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_slider_content_alignment',
        array(
            'label'    => esc_html__( 'Slider Content Alignment', 'eco-landscaping' ),
            'section'  => 'eco_landscaping_home_banner_settings',
            'settings' => 'eco_landscaping_slider_content_alignment',
            'type'     => 'select',
            'choices'  => array(
                'left'   => esc_html__( 'Left', 'eco-landscaping' ),
                'center' => esc_html__( 'Center', 'eco-landscaping' ),
                'right'  => esc_html__( 'Right', 'eco-landscaping' ),
            ),
        )
    );    
}
endif;

add_action( 'customize_register', 'eco_landscaping_customizer_home_banner_register' );