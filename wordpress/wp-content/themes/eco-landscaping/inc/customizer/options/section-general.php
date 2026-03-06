<?php
/**
 * Theme Customizer Controls
 *
 * @package Eco Landscaping
 */

if ( ! function_exists( 'eco_landscaping_customizer_general_setting_register' ) ) :
function eco_landscaping_customizer_general_setting_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'eco_landscaping_general_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'General Settings', 'eco-landscaping' )
        )
    );

 	// Add general Panel for preloader and scrolltop
    $wp_customize->add_panel(
        'eco_landscaping_general_settings_panel',
        array(
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'General Settings', 'eco-landscaping' ),
        )
    );

    // Section preloader
    $wp_customize->add_section(
        'eco_landscaping_prelodr_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Preloader', 'eco-landscaping' ),
            'panel'         => 'eco_landscaping_general_settings_panel',
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'eco_landscaping_preloader_settings', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_preloader_settings', 
		array(
		    'label'       => esc_html__( 'Preloader Settings', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_prelodr_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_preloader_settings',
		) 
	));

	// Add an option to enable the preloader
	$wp_customize->add_setting( 
		'eco_landscaping_enable_preloader', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'eco_landscaping_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Toggle_Control( $wp_customize, 'eco_landscaping_enable_preloader', 
		array(
		    'label'       => esc_html__( 'Show Preloader', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_prelodr_settings',
		    'type'        => 'eco-landscaping-toggle',
		    'settings'    => 'eco_landscaping_enable_preloader',
		) 
	));

    $wp_customize->add_section(
        'eco_landscaping_scrol_settings',
        array(
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Scroll Top', 'eco-landscaping' ),
            'panel'         => 'eco_landscaping_general_settings_panel',
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'eco_landscaping_scroll_top_settings', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_scroll_top_settings', 
		array(
		    'label'       => esc_html__( 'Scroll Top Settings', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_scrol_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_scroll_top_settings',
		) 
	));

	// Add an option to enable the scrolltop
	$wp_customize->add_setting( 
		'eco_landscaping_enable_scrolltop', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'eco_landscaping_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Toggle_Control( $wp_customize, 'eco_landscaping_enable_scrolltop', 
		array(
		    'label'       => esc_html__( 'Show Scroll Top', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_scrol_settings',
		    'type'        => 'eco-landscaping-toggle',
		    'settings'    => 'eco_landscaping_enable_scrolltop',
		) 
	));

	 $wp_customize->add_section(
        'eco_landscaping_button_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Buttons', 'eco-landscaping' ),
            'panel'         => 'eco_landscaping_general_settings_panel',
        )
    );

	 // Border Radius Setting
	$wp_customize->add_setting(
	    'eco_landscaping_button_border_radius',
	    array(
	        'default'           => '50px',
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'         => 'refresh',
	    )
	);

	$wp_customize->add_control(
	    'eco_landscaping_button_border_radius',
	    array(
	        'type'     => 'text',
	        'label'    => esc_html__( 'Button Border Radius (e.g. 4px, 50%)', 'eco-landscaping' ),
	        'section'  => 'eco_landscaping_button_settings',
	    )
	);

	// Button Padding Setting
	$wp_customize->add_setting(
	    'eco_landscaping_button_padding',
	    array(
	        'default'           => '12px 30px',
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'         => 'refresh',
	    )
	);

	$wp_customize->add_control(
	    'eco_landscaping_button_padding',
	    array(
	        'type'     => 'text',
	        'label'    => esc_html__( 'Button Padding (e.g. 10px 20px)', 'eco-landscaping' ),
	        'section'  => 'eco_landscaping_button_settings',
	    )
	);


}
endif;

add_action( 'customize_register', 'eco_landscaping_customizer_general_setting_register' );