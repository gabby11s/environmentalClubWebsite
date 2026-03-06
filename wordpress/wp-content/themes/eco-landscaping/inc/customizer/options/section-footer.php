<?php
/**
 * Theme Customizer Controls
 *
 * @package Eco Landscaping
 */

if ( ! function_exists( 'eco_landscaping_customizer_footer_register' ) ) :
function eco_landscaping_customizer_footer_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'eco_landscaping_footer_settings',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Footer Settings', 'eco-landscaping' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'eco_landscaping_label_footer_settings_title', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_footer_settings_title', 
		array(
		    'label'       => esc_html__( 'Footer Settings', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_footer_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_label_footer_settings_title',
		) 
	));

	// Copyright text
    $wp_customize->add_setting(
        'eco_landscaping_footer_copyright_text',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'eco_landscaping_sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_footer_copyright_text',
        array(
            'settings'      => 'eco_landscaping_footer_copyright_text',
            'section'       => 'eco_landscaping_footer_settings',
            'type'          => 'textarea',
            'label'         => esc_html__( 'Footer Copyright Text', 'eco-landscaping' )
        )
    );
}
endif;

add_action( 'customize_register', 'eco_landscaping_customizer_footer_register' );