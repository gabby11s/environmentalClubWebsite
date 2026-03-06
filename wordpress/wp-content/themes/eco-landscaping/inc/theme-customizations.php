<?php
// Enqueue theme styles and custom inline CSS
function eco_landscaping_enqueue_styles() {
    wp_enqueue_style('eco-landscaping-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'eco_landscaping_enqueue_styles');

// custom header
    add_theme_support('custom-header', array(
            'width'                  => 1920, 
            'height'                 => 400,  
            'flex-height'            => true,
            'flex-width'             => true,
            'header-text'            => true, // Enable or disable header text
            'default-text-color'     => '000000', // Default header text color
            'wp-head-callback'       => 'eco_landscaping_header_style',
        ) );

// custom-background
    add_theme_support( 'custom-background', array(
          'default-color' => 'ffffff',
        ));

// Style the header
function eco_landscaping_header_style() {
    $eco_landscaping_header_image = get_header_image();    
    $eco_landscaping_header_text_color = get_header_textcolor();
   
     if (get_theme_support('custom-header', 'default-text-color') !== $eco_landscaping_header_text_color || !empty($eco_landscaping_header_image)) {
            ?>
        <style type="text/css" id="entr-header-css">
            <?php
            // Has a Custom Header been added?
            if (!empty($eco_landscaping_header_image)) :
                ?>
                 #custom-header {
                    background-image: url(<?php header_image(); ?>);
                    background-repeat: no-repeat;
                    background-position: 50% 50%;
                    -webkit-background-size: cover;
                    -moz-background-size:    cover;
                    -o-background-size:      cover;
                    background-size:         cover;
                }
            <?php endif; ?> 
            <?php
                if ('blank' === $eco_landscaping_header_text_color) :
                ?>
                    .site-title a,.site-description {
                        color: #<?php echo esc_attr( $eco_landscaping_header_text_color ); ?>;
                    }
                <?php elseif ('' !== $eco_landscaping_header_text_color) : ?>
                    .site-title a,.site-description {
                        color: #<?php echo esc_attr($eco_landscaping_header_text_color); ?>;
                    }            
                <?php endif; ?>
        </style>
    <?php
        }
    }
// site-title-checkbox
// Remove "Display Site Title and Tagline" checkbox from Customizer
function eco_landscaping_remove_header_text_display_checkbox( $wp_customize ) {
    $wp_customize->remove_control( 'display_header_text' ); // Removes the checkbox
}
add_action( 'customize_register', 'eco_landscaping_remove_header_text_display_checkbox', 11 );

/**
* Custom logo
*/
function eco_landscaping_logo_setup(){
    add_theme_support('custom-logo', array(
        'height' => 65,
        'width' => 350,
        'flex-height' => true,
        'flex-width' => true,
    ));
}
add_action('after_setup_theme', 'eco_landscaping_logo_setup');


// logo-resizer
function eco_landscaping_logo_dynamic_css() {
    $eco_landscaping_logo_width = get_theme_mod( 'eco_landscaping_logo_width', 150 );
    ?>
    <style type="text/css">
        .logo .custom-logo {
            max-width: <?php echo esc_attr( $eco_landscaping_logo_width ); ?>px;
            height: auto;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'eco_landscaping_logo_dynamic_css' );

// buttons
function eco_landscaping_custom_button_styles() {
    $eco_landscaping_radius = get_theme_mod( 'eco_landscaping_button_border_radius', '50px' );
    $eco_landscaping_padding = get_theme_mod( 'eco_landscaping_button_padding', '12px 30px' );
    ?>
    <style type="text/css">
        .btn,
        .button,
        button,
        input[type="submit"],
        .wp-block-button__link,#blog-section .read-more a,.read-more a,a.hdr-btn {
            border-radius: <?php echo esc_attr($eco_landscaping_radius); ?>;
            padding: <?php echo esc_attr($eco_landscaping_padding); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'eco_landscaping_custom_button_styles' );

function eco_landscaping_customize_fonts() {
    $eco_landscaping_body_font = get_theme_mod('eco_landscaping_body_font_family', 'Manrope, sans-serif');
    $eco_landscaping_heading_font = get_theme_mod('eco_landscaping_heading_font_family', 'Manrope, sans-serif');

    // Extract Google font names (e.g., Roboto from "Roboto, sans-serif")
    $eco_landscaping_body_font_name = trim(explode(',', $eco_landscaping_body_font)[0]);
    $eco_landscaping_heading_font_name = trim(explode(',', $eco_landscaping_heading_font)[0]);

    // Generate Google Fonts URL
    $eco_landscaping_google_font_url = 'https://fonts.googleapis.com/css2?family=' . urlencode($eco_landscaping_body_font_name) . '&family=' . urlencode($eco_landscaping_heading_font_name) . '&display=swap';

    // Enqueue fonts
    wp_enqueue_style('eco-landscaping-fonts', $eco_landscaping_google_font_url, array(), null);

    // Custom inline style for font application
    $custom_css = "
        body, p, span, label, div {
            font-family: {$eco_landscaping_body_font};
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: {$eco_landscaping_heading_font} !important;
        }
    ";
    wp_add_inline_style('eco-landscaping-fonts', $custom_css);
}
add_action('wp_enqueue_scripts', 'eco_landscaping_customize_fonts');

// page title box
function eco_landscaping_page_title_dynamic_styles() {
    $bg_type = get_theme_mod('eco_landscaping_page_bg_radio', '');
    $bg_color = get_theme_mod('eco_landscaping_page_bg_color', '');
    $bg_image = get_theme_mod('eco_landscaping_page_bg_image', '');
    $eco_landscaping_alpha = get_theme_mod('eco_landscaping_global_color1', 'var(--alpha-color)');

    $eco_landscaping_dynamic_css = '';

    if ($bg_type === 'image' && !empty($bg_image)) {
        $eco_landscaping_dynamic_css .= '.page-title {';
        $eco_landscaping_dynamic_css .= 'background-image: url("' . esc_url($bg_image) . '");';
        $eco_landscaping_dynamic_css .= 'background-size: cover;';
        $eco_landscaping_dynamic_css .= 'background-position: center;';
        $eco_landscaping_dynamic_css .= '}';
    } elseif ($bg_type === 'color' && !empty($bg_color)) {
        $eco_landscaping_dynamic_css .= '.page-title {';
        $eco_landscaping_dynamic_css .= 'background-color: ' . esc_attr($bg_color) . ';';
        $eco_landscaping_dynamic_css .= '}';
    } else {
        // Fallback to global theme color
        $eco_landscaping_dynamic_css .= '.page-title {';
        $eco_landscaping_dynamic_css .= 'background-color: ' . esc_attr($eco_landscaping_alpha) . ';';
        $eco_landscaping_dynamic_css .= '}';
    }

    if (!empty($eco_landscaping_dynamic_css)) {
        echo '<style type="text/css">' . $eco_landscaping_dynamic_css . '</style>';
    }
}
add_action('wp_head', 'eco_landscaping_page_title_dynamic_styles', 20);

// global color
function eco_landscaping_global_color_custom_css() {
    $eco_landscaping_alpha = get_theme_mod( 'eco_landscaping_global_color1', 'var(--alpha-color)' );
    $eco_landscaping_bg_type       = get_theme_mod('eco_landscaping_page_bg_radio', 'color');

    $eco_landscaping_theme_css = '';

    if (!empty($eco_landscaping_alpha)) {
        // Apply global background only if no custom bg for page-title
        if ($eco_landscaping_bg_type !== 'color' && $eco_landscaping_bg_type !== 'image') {
            $eco_landscaping_theme_css .= '.page-title .content-section{ background: ' . esc_attr($eco_landscaping_alpha) . '; }';
        }
    }

    if (!empty($eco_landscaping_theme_css)) {
        echo '<style type="text/css">' . $eco_landscaping_theme_css . '</style>';
    }
}
add_action('wp_head', 'eco_landscaping_global_color_custom_css', 10);

/*---------------------------Global Color-------------------*/

function eco_landscaping_global_color() {

    $eco_landscaping_css  = '';
    $eco_landscaping_alpha = get_theme_mod( 'eco_landscaping_global_color1' );

    $eco_landscaping_root_vars = '';
    if ( $eco_landscaping_alpha ) {
        $eco_landscaping_root_vars .= '--alpha-color: ' . esc_attr( $eco_landscaping_alpha ) . ' !important;';
    }

    if ( $eco_landscaping_root_vars !== '' ) {
        $eco_landscaping_css .= ':root {' . $eco_landscaping_root_vars . '}';
    }

    if ( $eco_landscaping_css !== '' ) {
        // Replace these handles with your theme's main & WooCommerce stylesheet handles.
        wp_add_inline_style( 'eco-landscaping-style', $eco_landscaping_css );
        wp_add_inline_style( 'eco-landscaping-woocommerce-css', $eco_landscaping_css );
    }
}
add_action( 'wp_enqueue_scripts', 'eco_landscaping_global_color', 20 );