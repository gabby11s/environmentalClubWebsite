<?php
/**
 * @package Eco Landscaping
 */

/**
 * Footer
 */
if (! function_exists( 'eco_landscaping_footer_copyrights' ) ):
    function eco_landscaping_footer_copyrights() {
        ?>
            <div class="row">
                <div class="copyrights">
                    <p>
                        <?php
                            if("" != esc_html(get_theme_mod( 'eco_landscaping_footer_copyright_text'))) :
                                echo esc_html(get_theme_mod( 'eco_landscaping_footer_copyright_text'));
                                if(get_theme_mod('eco_landscaping_en_footer_credits',true)) :
                                    ?>
                                    <span class="copyrg-link"><a href="<?php echo esc_url(ECO_LANDSCAPING_AUT); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e(' | Eco Nature WordPress Theme','eco-landscaping') ?></a><?php esc_html_e(' by Legacy Themes','eco-landscaping') ?></span>
                                    <?php   
                                endif;
                            else :
                                echo date_i18n(
                                    /* translators: Copyright date format, see https://secure.php.net/date */
                                    _x( 'Y', 'copyright date format', 'eco-landscaping' )
                                );
                                ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                    <span class="copyrg-link"><a href="<?php echo esc_url(ECO_LANDSCAPING_AUT); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e(' | Eco Nature WordPress Theme','eco-landscaping') ?></a><?php esc_html_e(' by Legacy Themes','eco-landscaping') ?></span>
                                <?php
                            endif;
                        ?>
                    </p>
                </div>
            </div>
        <?php    
    }
endif;
add_action( 'eco_landscaping_action_footer', 'eco_landscaping_footer_copyrights' );


/**
 * Page Title Settings
 */
if ( ! function_exists( 'eco_landscaping_show_page_title' ) ) :
    function eco_landscaping_show_page_title() {
        if ( ! is_front_page() ) {
            ?>
            <div class="page-title"> 
                <div class="content-section img-overlay">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="section-title"> 
                                    <?php
                                    // WooCommerce Pages
                                    if ( function_exists( 'is_shop' ) && is_shop() ) {
                                        // Shop Page
                                        echo '<h1 class="main-title">' . esc_html__( 'Shop Page', 'eco-landscaping' ) . '</h1>';

                                    } elseif ( function_exists( 'is_product' ) && is_product() ) {
                                        // Single Product Page
                                        echo '<h1 class="main-title">' . esc_html__( 'Single Product Page', 'eco-landscaping' ) . '</h1>';

                                    } elseif ( function_exists( 'is_checkout' ) && is_checkout() ) {
                                        // Checkout Page
                                        echo '<h1 class="main-title">' . esc_html__( 'Checkout', 'eco-landscaping' ) . '</h1>';

                                    } elseif ( function_exists( 'is_account_page' ) && is_account_page() ) {
                                        // My Account Page
                                        echo '<h1 class="main-title">' . esc_html__( 'My Account', 'eco-landscaping' ) . '</h1>';

                                    } elseif ( is_home() ) {
                                        // Blog Index Page
                                        echo '<h1 class="main-title">' . esc_html__( 'Blog Page', 'eco-landscaping' ) . '</h1>';

                                    } elseif ( is_singular( 'post' ) ) {
                                        // Single Blog Post
                                        echo '<h1 class="main-title">' . get_the_title() . '</h1>';

                                    } elseif ( is_category() ) {
                                        echo '<h1 class="main-title">' . single_cat_title( '', false ) . '</h1>';

                                    } elseif ( is_tag() ) {
                                        echo '<h1 class="main-title">' . single_tag_title( '', false ) . '</h1>';

                                    } elseif ( is_author() ) {
                                        echo '<h1 class="main-title">' . get_the_author() . '</h1>';

                                    } elseif ( is_archive() ) {
                                        echo '<h1 class="main-title">' . get_the_archive_title() . '</h1>';

                                    } elseif ( is_search() ) {
                                        echo '<h1 class="main-title">' . esc_html__( 'Search Results', 'eco-landscaping' ) . '</h1>';

                                    } elseif ( is_404() ) {
                                        echo '<h1 class="main-title">' . esc_html__( 'Page Not Found', 'eco-landscaping' ) . '</h1>';

                                    } else {
                                        // Default for all other pages
                                        echo '<h1 class="main-title">' . get_the_title() . '</h1>';
                                    }
                                    ?>
                                </div>                      
                            </div>
                        </div>
                    </div>  
                </div>
            </div>  <!-- End page-title --> 
            <?php
        }
    }
endif;

// Register page title action globally
add_action( 'eco_landscaping_get_page_title', 'eco_landscaping_show_page_title' );

/**
 * Home Banner Section
 */
if (! function_exists( 'eco_landscaping_home_banner_section' ) ):
    function eco_landscaping_home_banner_section() {
        ?>
        <section id="main-banner-wrap">
            <div class="slider-sec">
                <?php
                $eco_landscaping_banner_image = get_theme_mod( 'eco_landscaping_banner_image', '' );
                if ( ! empty( $eco_landscaping_banner_image ) ) { ?>
                    <div class="banner-side-margin position-relative">
                        <div class="overlay-slider"></div>
                        <div class="main-banner-inner-box">
                            <img src="<?php echo esc_url( $eco_landscaping_banner_image ); ?>">
                        </div>
                        <?php
                        $eco_landscaping_alignment_class = get_theme_mod( 'eco_landscaping_slider_content_alignment', 'left' );
                        ?>
                        <div class="main-banner-content-box content-<?php echo esc_attr( $eco_landscaping_alignment_class ); ?>">
                            <?php
                                $eco_landscaping_banner_small_head = get_theme_mod( 'eco_landscaping_banner_small_head', '' );
                                if ( ! empty( $eco_landscaping_banner_small_head ) ) { ?>
                                    <h6 class="bnr-sm-hd p-0 mb-5"><?php echo esc_html( $eco_landscaping_banner_small_head ); ?></h6>
                            <?php } ?>
                            <?php
                                $eco_landscaping_banner_heading = get_theme_mod( 'eco_landscaping_banner_heading', '' );
                                if ( ! empty( $eco_landscaping_banner_heading ) ) { ?>
                                    <h2 class="bnr-heading p-0 mb-lg-3"><?php echo esc_html( $eco_landscaping_banner_heading ); ?></h2>
                            <?php } ?>                             
                           <div class="btn-box-slid">
                                <?php
                                $eco_landscaping_banner_button_link = get_theme_mod( 'eco_landscaping_banner_button_link', '' );
                                    if ( ! empty( $eco_landscaping_banner_button_link ) ) { ?>
                                    <a class="btn-slid btn" href="<?php echo esc_url( $eco_landscaping_banner_button_link ); ?>"><?php echo esc_html('Discover More','eco-landscaping'); ?></a>
                                <?php } ?>
                            </div>
                        </div>    
                    </div>
                <?php } ?>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'eco_landscaping_action_home_banner', 'eco_landscaping_home_banner_section' );


/**
 * Home Services Section
 */
if (! function_exists( 'eco_landscaping_home_services_section' ) ):
    function eco_landscaping_home_services_section() {
    ?>
    <section id="services-wrap" class="py-5">
        <div class="container">
            <div class="inner-wrap pb-4">
                <div class="services-head text-center">
                    <?php
                    $eco_landscaping_services_small_heading = get_theme_mod( 'eco_landscaping_services_small_heading', '' );
                    if ( ! empty( $eco_landscaping_services_small_heading ) ) { ?>
                    <h6 class="serv-sm-hd p-0 mb-0"><?php echo esc_html( $eco_landscaping_services_small_heading ); ?></h6>
                    <?php } ?>
                    <?php
                    $eco_landscaping_services_main_heading = get_theme_mod( 'eco_landscaping_services_main_heading', '' );
                    if ( ! empty( $eco_landscaping_services_main_heading ) ) { ?>
                    <h3 class="serv-main-hd py-4 mb-0"><?php echo esc_html( $eco_landscaping_services_main_heading ); ?></h3>
                    <?php } ?>
                </div>
                <div class="services-box pt-4">
                    <div class="owl-carousel">
                        <?php $eco_landscaping_services_count = get_theme_mod("eco_landscaping_services_increase");
                        for ($i = 1; $i <= $eco_landscaping_services_count; $i++) { ?>
                            <div class="serv-detail">
                                <div class="serv-img-box text-center">
                                    <?php if(get_theme_mod('eco_landscaping_services_icon'.$i)!=''){ ?>
                                        <i class="<?php echo esc_attr(get_theme_mod('eco_landscaping_services_icon'.$i)); ?> serv-icon <?php { echo 'serv-img'.$i; }?>"></i>
                                    <?php } ?>
                                    <div class="serv-title">
                                        <?php
                                            $eco_landscaping_services_inner_heading = get_theme_mod( 'eco_landscaping_services_inner_heading'.$i, '' );
                                            if ( ! empty( $eco_landscaping_services_inner_heading ) ) { ?>
                                            <h6 class="serv-inn-hd pt-3 m-0"><?php echo esc_html( $eco_landscaping_services_inner_heading ); ?></h6>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div> 
                        <?php } ?>
                    </div>
                </div>
            </div>                
        </div>
    </section>
    <?php    
    }
endif;
add_action( 'eco_landscaping_action_home_services', 'eco_landscaping_home_services_section' );

/**
 * Home page another adding Section
 */
if (! function_exists( 'eco_landscaping_home_extra_section' ) ):
    function eco_landscaping_home_extra_section() {
        ?>
        <div id="custom-home-extra-content" class="py-3">
            <div class="container">
              <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
              <?php endwhile; ?>
            </div>
        </div>
        <?php    
    }
endif;
add_action( 'eco_landscaping_action_home_extra', 'eco_landscaping_home_extra_section' );