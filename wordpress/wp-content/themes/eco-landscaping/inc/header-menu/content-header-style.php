<?php
/**
 * Template part for displaying header menu
 *
 * @package Eco Landscaping
 */

?>
<?php
    $eco_landscaping_page_val= is_front_page() ? 'home':'page' ;

?>

<header id="<?php echo esc_attr($eco_landscaping_page_val);?>-inner" class="elementer-menu-anchor theme-menu-wrapper full-width-menu style1 page" role="banner">
    <?php
        if(true===get_theme_mod('eco_landscaping_enable_highlighted area',true) && is_front_page()){
            ?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('skip to content','eco-landscaping'); ?> </a> <?php
        }
        else{
        ?><a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('skip to content','eco-landscaping');?></a> <?php
    }
    ?>
    <div id="header-main" class="header-wrapper">
        <div id="topbar">
            <div class="container">
                <div class="row py-2">
                    <div class="col-lg-4 col-md-4 col-12 align-self-center text-center text-lg-start text-md-start ri8-soco">
                        <div class="follow-us my-2 my-lg-0">
                            <?php
                                $eco_landscaping_social_media1_heading = get_theme_mod( 'eco_landscaping_social_media1_heading', '' );
                                if ( ! empty( $eco_landscaping_social_media1_heading ) ) { ?>
                                <a href="<?php echo esc_url( $eco_landscaping_social_media1_heading ); ?>"><i class="bi bi-facebook me-3"></i></a>
                            <?php } ?>
                            <?php
                                $eco_landscaping_social_media2_heading = get_theme_mod( 'eco_landscaping_social_media2_heading', '' );
                                if ( ! empty( $eco_landscaping_social_media2_heading ) ) { ?>
                                <a href="<?php echo esc_url( $eco_landscaping_social_media2_heading ); ?>"><i class="bi bi-instagram me-3"></i></a>
                            <?php } ?>
                            <?php
                                $eco_landscaping_social_media3_heading = get_theme_mod( 'eco_landscaping_social_media3_heading', '' );
                                if ( ! empty( $eco_landscaping_social_media3_heading ) ) { ?>
                                <a href="<?php echo esc_url( $eco_landscaping_social_media3_heading ); ?>"><i class="bi bi-twitter-x me-3"></i></a>
                            <?php } ?>
                            <?php
                                $eco_landscaping_social_media4_heading = get_theme_mod( 'eco_landscaping_social_media4_heading', '' );
                                if ( ! empty( $eco_landscaping_social_media4_heading ) ) { ?>
                                <a href="<?php echo esc_url( $eco_landscaping_social_media4_heading ); ?>"><i class="bi bi-youtube me-3"></i></a>
                            <?php } ?>
                            <?php
                                $eco_landscaping_social_media5_heading = get_theme_mod( 'eco_landscaping_social_media5_heading', '' );
                                if ( ! empty( $eco_landscaping_social_media5_heading ) ) { ?>
                                <a href="<?php echo esc_url( $eco_landscaping_social_media5_heading ); ?>"><i class="bi bi-pinterest me-3"></i></a>
                            <?php } ?>
                            <?php
                                $eco_landscaping_social_media6_heading = get_theme_mod( 'eco_landscaping_social_media6_heading', '' );
                                if ( ! empty( $eco_landscaping_social_media6_heading ) ) { ?>
                                <a href="<?php echo esc_url( $eco_landscaping_social_media6_heading ); ?>"><i class="bi bi-linkedin me-3"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-12 text-center text-lg-end text-md-end align-self-center ri8-mail">
                        <?php $eco_landscaping_topbar_email_id = get_theme_mod('eco_landscaping_topbar_email_id', '' );
                            if ( ! empty( $eco_landscaping_topbar_email_id ) ) { ?>
                            <p class="tbr-call-no mb-2 mb-lg-0"><i class="bi bi-envelope-fill mail-icon me-2"></i>
                                <?php echo esc_html( $eco_landscaping_topbar_email_id ); ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-lg-2 col-md-4 col-12 text-center text-lg-end text-md-end align-self-center ri8-adrs">
                        <?php $eco_landscaping_topbar_address = get_theme_mod('eco_landscaping_topbar_address', '' );
                                    if ( ! empty( $eco_landscaping_topbar_address ) ) { ?>
                            <p class="tbr-adrs mb-0"><i class="bi bi-geo-alt-fill map-icon me-2"></i>
                                <?php echo esc_html( $eco_landscaping_topbar_address ); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="custom-header">
            <?php if ( display_header_text() ) : ?>
            <div id="content-header">
                <div class="container">
                    <div class="row py-3">
                        <div class="col-lg-2 col-md-3 col-6 align-self-center text-center text-lg-start text-md-start ri8-logo">
                            <div class="logo <?php echo (has_custom_logo() ? 'has-logo' : 'no-logo'); ?>" itemscope itemtype="https://schema.org/Organization">
                                <?php 
                                    // Display custom logo if available
                                    if ( has_custom_logo() ) {
                                        eco_landscaping_custom_logo();
                                    }

                                    // Display sticky header logo if enabled
                                    if ( get_theme_mod( 'eco_landscaping_enable_logo_stickyheader', false ) ) {
                                        $eco_landscaping_alt_logo = esc_url( get_theme_mod( 'eco_landscaping_logo_stickyheader' ) );
                                        if ( ! empty( $eco_landscaping_alt_logo ) ) {
                                            ?>
                                            <a id="logo-alt" class="logo-alt" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                <img src="<?php echo esc_url( $eco_landscaping_alt_logo ); ?>" alt="<?php esc_attr_e( 'logo', 'eco-landscaping' ); ?>">
                                            </a>
                                            <?php
                                        }
                                    }

                                    // Site title and tagline settings
                                    $eco_landscaping_show_title   = get_theme_mod( 'eco_landscaping_display_site_title', true );
                                    $eco_landscaping_show_tagline = get_theme_mod( 'eco_landscaping_display_site_tagline', false );
                                    $eco_landscaping_header_class = $eco_landscaping_show_title ? 'site-title' : 'screen-reader-text';

                                    // Display site title
                                    if ( $eco_landscaping_show_title && get_bloginfo( 'name' ) ) {
                                        if ( is_front_page() ) {
                                            ?>
                                            <h1 class="<?php echo esc_attr( $eco_landscaping_header_class ); ?>">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
                                            </h1>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="<?php echo esc_attr( $eco_landscaping_header_class ); ?>">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
                                            </p>
                                            <?php
                                        }
                                    }

                                    // Display tagline
                                    if ( $eco_landscaping_show_tagline ) {
                                        $eco_landscaping_description = get_bloginfo( 'description', 'display' );
                                        if ( $eco_landscaping_description || is_customize_preview() ) {
                                            ?>
                                            <p class="site-description"><?php echo esc_html( $eco_landscaping_description ); ?></p>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-3 col-6 align-self-center">
                            <div class="top-menu-wrapper">
                                <div class="navigation_header">
                                    <div class="toggle-nav mobile-menu">
                                        <button onclick="eco_landscaping_openNav()"><i class="bi bi-list"></i></button>
                                    </div>
                                    <div id="mySidenav" class="nav sidenav">
                                        <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'eco-landscaping' ); ?>">
                                            <?php {
                                                    wp_nav_menu(
                                                        array(
                                                            'theme_location' => 'primary',
                                                            'container_class' => 'navi clearfix navbar-nav' ,
                                                            'menu_class'     => 'menu clearfix', 
                                                            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                                            'fallback_cb' => 'wp_page_menu',
                                                        )
                                                    );
                                                } ?>
                                        </nav>
                                        <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="eco_landscaping_closeNav()"><i class="bi bi-x"></i></a>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 align-self-center">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-2 align-self-center text-lg-end text-center text-md-end hdr-icns">
                                    <?php if(get_theme_mod('eco_landscaping_search_hide',false)=="1"){ ?>
                                        <div class="search-container py-2">
                                            <button id="search-icon" class="search-icon">
                                                <i class="bi bi-search"></i>
                                            </button>
                                            <div id="search-form" class="search-form">
                                                <?php get_search_form(); ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-3 col-md-2 col-2 align-self-center text-center">
                                    <div class="hdr-cart">
                                        <?php eco_landscaping_custom_woocommerce_cart_icon(); ?>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-8 col-8 align-self-center text-center text-lg-end text-md-end">
                                    <?php
                                        $eco_landscaping_header_button_link = get_theme_mod( 'eco_landscaping_header_button_link', '' );
                                            if ( ! empty( $eco_landscaping_header_button_link ) ) { ?>
                                            <a class="hdr-btn" href="<?php echo esc_url( $eco_landscaping_header_button_link ); ?>"><?php echo esc_html('Get Free Quote','eco-landscaping'); ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
         <?php endif; ?>
        </div>
    </div>    
</header>

<div class="clearfix"></div>
<div id="content" class="elementor-menu-anchor"></div>

<div class="content-wrap">