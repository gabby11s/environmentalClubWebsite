<?php
/**
 * Theme Customizer Controls
 *
 * @package Eco Landscaping
 */

if ( ! function_exists( 'eco_landscaping_customizer_global_color_setting_register' ) ) :
function eco_landscaping_customizer_global_color_setting_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'eco_landscaping_global_color_settings',
        array (
            'priority'      => 40,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Global Color Settings', 'eco-landscaping' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'eco_landscaping_theme_color_settings', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_theme_color_settings', 
		array(
		    'label'       => esc_html__( 'Global Color Settings', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_global_color_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_theme_color_settings',
		) 
	));

	$wp_customize->add_setting('eco_landscaping_global_color1',
        array(
            'type' => 'theme_mod',
            'default'           => '#6A961F',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'eco_landscaping_global_color1',
            array(
                'label'      => esc_html__( 'Global Color1', 'eco-landscaping' ),
                'section'    => 'eco_landscaping_global_color_settings',
                'settings'   => 'eco_landscaping_global_color1',
            )
        )
    ); 
}
endif;

add_action( 'customize_register', 'eco_landscaping_customizer_global_color_setting_register' );