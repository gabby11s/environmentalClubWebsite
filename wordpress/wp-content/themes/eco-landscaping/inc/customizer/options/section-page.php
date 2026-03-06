<?php
/**
 * Theme Customizer Controls
 *
 * @package Eco Landscaping
 */

if ( ! function_exists( 'eco_landscaping_customizer_page_register' ) ) :
function eco_landscaping_customizer_page_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'eco_landscaping_page_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Page Settings', 'eco-landscaping' )
        )
    );

    // Info label
     $wp_customize->add_setting( 
        'eco_landscaping_label_page_title_hide_settings', 
        array(
            'sanitize_callback' => 'eco_landscaping_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_page_title_hide_settings', 
        array(
            'label'       => esc_html__( 'Hide Page Title', 'eco-landscaping' ),
            'section'     => 'eco_landscaping_page_settings',
            'type'        => 'eco-landscaping-title',
            'settings'    => 'eco_landscaping_label_page_title_hide_settings',
        ) 
    ));  

    // Hide page title section
    $wp_customize->add_setting(
        'eco_landscaping_enable_page_title',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'eco_landscaping_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Eco_Landscaping_Toggle_Control( $wp_customize, 'eco_landscaping_enable_page_title', 
        array(
            'settings'      => 'eco_landscaping_enable_page_title',
            'section'       => 'eco_landscaping_page_settings',
            'type'          => 'eco-landscaping-toggle',
            'label'         => esc_html__( 'Show Page Title Section:', 'eco-landscaping' ),
            'description'   => '',           
        )
    ));

    // Info label
    $wp_customize->add_setting( 
        'eco_landscaping_label_page_title_bg_settings', 
        array(
            'sanitize_callback' => 'eco_landscaping_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_page_title_bg_settings', 
        array(
            'label'       => esc_html__( 'Page Title Background', 'eco-landscaping' ),
            'section'     => 'eco_landscaping_page_settings',
            'type'        => 'title',
            'settings'    => 'eco_landscaping_label_page_title_bg_settings',
            'active_callback' => 'eco_landscaping_page_title_enable',
        ) 
    ));

    // Background selection
    $wp_customize->add_setting(
        'eco_landscaping_page_bg_radio',
        array(
            'type' => 'theme_mod',
            'default'           => 'color',
            'sanitize_callback' => 'eco_landscaping_sanitize_select'
        )
    );

    $wp_customize->add_control(
    	new Eco_Landscaping_Text_Radio_Control( $wp_customize, 'eco_landscaping_page_bg_radio',
        array(
            'settings'      => 'eco_landscaping_page_bg_radio',
            'section'       => 'eco_landscaping_page_settings',
            'type'          => 'radio',
            'label'         => esc_html__( 'Choose Page Title Background Color or Background Image:', 'eco-landscaping' ),
            'description'   => esc_html__('This setting will change the background of the page title area.', 'eco-landscaping'),
            'choices' => array(
                            'color' => esc_html__('Background Color','eco-landscaping'),
                            'image' => esc_html__('Background Image','eco-landscaping'),
                            ),
            'active_callback' => 'eco_landscaping_page_title_enable',
        )
    ));

    // Background color
    $wp_customize->add_setting(
        'eco_landscaping_page_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'eco_landscaping_page_bg_color',
            array(
                'label'      => esc_html__( 'Select Background Color', 'eco-landscaping' ),
                'description'   => esc_html__('This setting will add background color to the page title area if Background Color was selected above.', 'eco-landscaping'),
                'section'    => 'eco_landscaping_page_settings',
                'settings'   => 'eco_landscaping_page_bg_color',
                'active_callback' => 'eco_landscaping_page_title_color_enable',
            )
        )
    );

     // Background image
    $wp_customize->add_setting(
        'eco_landscaping_page_bg_image',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'eco_landscaping_page_bg_image',
            array(
                'label'       => esc_html__( 'Upload Background Image', 'eco-landscaping' ),
                'description' => esc_html__('This setting will add a background image to the page title area if Background Image was selected above.', 'eco-landscaping'),
                'section'     => 'eco_landscaping_page_settings',
                'settings'    => 'eco_landscaping_page_bg_image',
                'active_callback' => 'eco_landscaping_page_title_image_enable',
            )
        )
    );
    
}
endif;

add_action( 'customize_register', 'eco_landscaping_customizer_page_register' );