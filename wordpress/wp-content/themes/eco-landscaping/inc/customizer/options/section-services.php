<?php
/**
 * Theme Customizer Controls
 *
 * @package Eco Landscaping
 */

if ( ! function_exists( 'eco_landscaping_customizer_home_services_register' ) ) :
function eco_landscaping_customizer_home_services_register( $wp_customize ) {

    $wp_customize->add_section(
        'eco_landscaping_home_services_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Services Settings', 'eco-landscaping' )
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'eco_landscaping_label_services_settings_title', 
        array(
            'sanitize_callback' => 'eco_landscaping_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_services_settings_title', 
        array(
            'label'       => esc_html__( 'Services Settings', 'eco-landscaping' ),
            'section'     => 'eco_landscaping_home_services_settings',
            'type'        => 'eco-landscaping-title',
            'settings'    => 'eco_landscaping_label_services_settings_title',
        ) 
    ));

    $wp_customize->add_setting(
        'eco_landscaping_services_small_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_services_small_heading',
        array(
            'label'           => sprintf( esc_html__( 'Small Heading', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_services_settings',
            'settings'        => 'eco_landscaping_services_small_heading' ,
            'type'            => 'text',
        )
    );

    $wp_customize->add_setting(
        'eco_landscaping_services_main_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_services_main_heading',
        array(
            'label'           => sprintf( esc_html__( 'Main Heading', 'eco-landscaping' ), ),
            'section'         => 'eco_landscaping_home_services_settings',
            'settings'        => 'eco_landscaping_services_main_heading' ,
            'type'            => 'text',
        )
    );
    
    $wp_customize->add_setting( 'eco_landscaping_services_increase', array(
        'default'           => '', 
        'sanitize_callback' => 'eco_landscaping_sanitize_number',
    ));

    // Add control for number of Services
    $wp_customize->add_control( 'eco_landscaping_services_increase', array(
        'label'       => __( 'Number of Services to Display', 'eco-landscaping' ),
        'section'     => 'eco_landscaping_home_services_settings', 
        'type'        => 'number', 
        'input_attrs' => array(
            'min' => 1,
            'max' => 10,
        ),      
    ));

    $eco_landscaping_services_count =  get_theme_mod('eco_landscaping_services_increase');

    for($i=1; $i<=$eco_landscaping_services_count; $i++ ) {  

    $wp_customize->add_setting(
        'eco_landscaping_services_icon'.$i,
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_services_icon'.$i,
        array(
            'label'           => sprintf( esc_html__( 'Services Icon', 'eco-landscaping' ).$i, ),
            'input_attrs' => array(
                'placeholder'     => esc_html__( 'bi bi-water', 'eco-landscaping' )),           
            'description'     => 'Add Bootstrap Icon from given link:- https://icons.getbootstrap.com/ ',
            'section'         => 'eco_landscaping_home_services_settings',
            'settings'        => 'eco_landscaping_services_icon'.$i ,
            'type'            => 'text',
        )
    );

    $wp_customize->add_setting(
        'eco_landscaping_services_inner_heading'.$i,
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_services_inner_heading'.$i,
        array(
            'label'           => sprintf( esc_html__( 'Inner Heading', 'eco-landscaping' ).$i, ),
            'section'         => 'eco_landscaping_home_services_settings',
            'settings'        => 'eco_landscaping_services_inner_heading'.$i ,
            'type'            => 'text',
        )
    );
    }
}
endif;

add_action( 'customize_register', 'eco_landscaping_customizer_home_services_register' );