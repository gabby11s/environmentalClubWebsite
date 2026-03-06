<?php
/**
 * Template Name: Home
 */

get_header();
?>

<main id="primary">
        
    <?php
        /**
         * Hook - eco_landscaping_action_home_banner.
         *
         * @hooked eco_landscaping_home_banner_section - 10
         */
        do_action( 'eco_landscaping_action_home_banner' );

        /**
         * Hook - eco_landscaping_action_home_services.
         *
         * @hooked eco_landscaping_home_services_section - 10
         */
        do_action( 'eco_landscaping_action_home_services' );

        /**
         * Hook - eco_landscaping_action_home_extra.
         *
         * @hooked eco_landscaping_home_extra_section - 10
         */
        do_action( 'eco_landscaping_action_home_extra' );
    ?>
    
</main>

<?php
get_footer();