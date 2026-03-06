<?php
/**
 * Theme Customizer Controls
 *
 * @package Eco Landscaping
 */

if ( ! function_exists( 'eco_landscaping_customizer_typography_setting_register' ) ) :
function eco_landscaping_customizer_typography_setting_register( $wp_customize ) {

    // Add Typography Panel for Body and Heading
    $wp_customize->add_panel(
        'eco_landscaping_typography_settings_panel',
        array(
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Typography Settings', 'eco-landscaping' ),
        )
    );

    // Section Body Typography
    $wp_customize->add_section(
        'eco_landscaping_body_typography_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Body', 'eco-landscaping' ),
            'panel'         => 'eco_landscaping_typography_settings_panel',
        )
    );

    // Body Font Family Setting
    $wp_customize->add_setting(
        'eco_landscaping_body_font_family',
        array(
            'default'           => 'Manrope, sans-serif', // Default font
            'sanitize_callback' => 'eco_landscaping_sanitize_font_family', // Custom sanitize function
        )
    );

    $wp_customize->add_control( new Eco_Landscaping_Font_Select_Control(
    $wp_customize,
    'eco_landscaping_body_font_family',
    array(
        'label'   => esc_html__( 'Body Font Family', 'eco-landscaping' ),
        'section' => 'eco_landscaping_body_typography_settings',
        'choices' => eco_landscaping_get_google_fonts(),
    )
    ));


    // Section Heading Typography
    $wp_customize->add_section(
        'eco_landscaping_heading_typography_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Heading', 'eco-landscaping' ),
            'panel'         => 'eco_landscaping_typography_settings_panel',
        )
    );

    // Heading Font Family Setting
    $wp_customize->add_setting(
        'eco_landscaping_heading_font_family',
        array(
            'default'           => 'Manrope, sans-serif', // Default font
            'sanitize_callback' => 'eco_landscaping_sanitize_font_family', // Custom sanitize function
        )
    );

    $wp_customize->add_control( new Eco_Landscaping_Font_Select_Control(
    $wp_customize,'eco_landscaping_heading_font_family',
    array(
        'label'   => esc_html__( 'Heading Font Family', 'eco-landscaping' ),
        'section' => 'eco_landscaping_heading_typography_settings',
        'choices' => eco_landscaping_get_google_fonts(),
    )
    ));
}
endif;

add_action( 'customize_register', 'eco_landscaping_customizer_typography_setting_register' );

// Function to fetch Google Fonts
function eco_landscaping_get_google_fonts() {
    // Add Google Fonts to be available for selection
    return array(
        'Manrope, sans-serif' => 'Manrope',
        'Amatic SC, sans-serif' => 'Amatic SC',
        'Raleway, sans-serif' => 'Raleway',
        'Arial, sans-serif'   => 'Arial',
        'Georgia, serif'      => 'Georgia',
        'Verdana, sans-serif' => 'Verdana',
        'Times New Roman, serif' => 'Times New Roman',
        'Roboto, sans-serif'  => 'Roboto',
        'Open Sans, sans-serif' => 'Open Sans',
        'Lora, serif'         => 'Lora',
        'Merriweather, serif' => 'Merriweather',
        'Montserrat, sans-serif' => 'Montserrat',
        // Add more Google fonts as needed
    );
}

// Sanitize Google Fonts input
function eco_landscaping_sanitize_font_family( $value ) {
    $allowed_fonts = array('Manrope, sans-serif','Amatic SC, sans-serif','Raleway, sans-serif','Arial, sans-serif', 'Georgia, serif', 'Verdana, sans-serif','Times New Roman, serif', 'Roboto, sans-serif', 'Open Sans, sans-serif','Lora, serif', 'Merriweather, serif', 'Montserrat, sans-serif',
        // Add more allowed fonts to this array
    );

    if ( in_array( $value, $allowed_fonts ) ) {
        return $value;
    } else {
        return 'Manrope, sans-serif'; // Default fallback font
    }
}

function eco_landscaping_sanitize_title( $value ) {
    return sanitize_text_field( $value );
}
