<div class="theme-offer">
<?php

    function eco_landscaping_create_customizer_nav_menu() {
        // ------- Create Nav Menu --------
        $eco_landscaping_menuname = 'Primary';
        $eco_landscaping_menulocation = 'primary';
        $eco_landscaping_menu_exists = wp_get_nav_menu_object($eco_landscaping_menuname);

        if (!$eco_landscaping_menu_exists) {
            $eco_landscaping_menu_id = wp_create_nav_menu($eco_landscaping_menuname);

            wp_update_nav_menu_item($eco_landscaping_menu_id, 0, array(
                'menu-item-title' => __('Home', 'eco-landscaping'),
                'menu-item-url' => home_url('/'),
                'menu-item-status' => 'publish',
            ));

            wp_update_nav_menu_item($eco_landscaping_menu_id, 0, array(
                'menu-item-title' => __('About Us', 'eco-landscaping'),
                'menu-item-url' => home_url('/index.php/about-us/'),
                'menu-item-status' => 'publish',
            ));

            wp_update_nav_menu_item($eco_landscaping_menu_id, 0, array(
                'menu-item-title' => __('Services', 'eco-landscaping'),
                'menu-item-url' => home_url('/index.php/services/'),
                'menu-item-status' => 'publish',
            ));

            wp_update_nav_menu_item($eco_landscaping_menu_id, 0, array(
                'menu-item-title' => __('Pages', 'eco-landscaping'),
                'menu-item-url' => home_url('/index.php/pages/'),
                'menu-item-status' => 'publish',
            ));

            wp_update_nav_menu_item($eco_landscaping_menu_id, 0, array(
                'menu-item-title' => __('Blog', 'eco-landscaping'),
                'menu-item-url' => home_url('/index.php/blog/'),
                'menu-item-status' => 'publish',
            ));

            // Set menu to location
            $eco_landscaping_locations = get_theme_mod('nav_menu_locations');
            if (!is_array($eco_landscaping_locations)) {
                $eco_landscaping_locations = array();
            }
            $eco_landscaping_locations[$eco_landscaping_menulocation] = $eco_landscaping_menu_id;
            set_theme_mod('nav_menu_locations', $eco_landscaping_locations);
        }
    }

    // POST and update the customizer and other related data of Eco Landscaping
    if (isset($_POST['submit'])) {

        // -------- Plugin Installation and Activation (WooCommerce & Classic Widgets) -------- //
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
        include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
        include_once(ABSPATH . 'wp-admin/includes/file.php');
        include_once(ABSPATH . 'wp-admin/includes/misc.php');

        // Plugin list
        $eco_landscaping_plugins = array(
            array(
                'slug' => 'woocommerce',
                'file' => 'woocommerce/woocommerce.php',
                'download_url' => 'https://downloads.wordpress.org/plugin/woocommerce.zip'
            ),
            array(
                'slug' => 'classic-widgets',
                'file' => 'classic-widgets/classic-widgets.php',
                'download_url' => 'https://downloads.wordpress.org/plugin/classic-widgets.zip'
            )
        );

        foreach ($eco_landscaping_plugins as $plugin) {
            $installed_plugins = get_plugins();

            // Install the plugin if it's not installed
            if (!isset($installed_plugins[$plugin['file']])) {
                $upgrader = new Plugin_Upgrader();
                $upgrader->install($plugin['download_url']);
            }

            // Activate the plugin if it's not active
            if (file_exists(WP_PLUGIN_DIR . '/' . $plugin['file']) && !is_plugin_active($plugin['file'])) {
                activate_plugin($plugin['file']);
            }
        }

        // ------- Create Menu --------
        eco_landscaping_create_customizer_nav_menu();

        // ------- Create Pages --------
        function create_demo_page($title, $content = '', $template = '') {
            $page_id = eco_landscaping_get_page_id_by_title($title);
        
            if (!$page_id) {
                $page_data = array(
                    'post_type'    => 'page',
                    'post_title'   => $title,
                    'post_content' => $content,
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                );
        
                $page_id = wp_insert_post($page_data);
        
                if ($template && !is_wp_error($page_id)) {
                    update_post_meta($page_id, '_wp_page_template', $template);
                }
            }
        
            return $page_id;
        }
        

        $eco_landscaping_home_id = create_demo_page('Home', '', 'home/home.php');
        update_option('page_on_front', $eco_landscaping_home_id);
        update_option('show_on_front', 'page');

        create_demo_page('Pages', '<p>Lorem Ipsum ...</p>');
        create_demo_page('About Us', '<p>Lorem Ipsum ...</p>');
        create_demo_page('Services', '<p>Service description...</p>');

        // Create blog page and assign it to display posts
        $blog_page_id = create_demo_page('Blog');
        update_option('page_for_posts', $blog_page_id);

        // Create the nav menu
        eco_landscaping_create_customizer_nav_menu();

        // ------- Set Theme Mods --------
        set_theme_mod('eco_landscaping_topbar_email_id', 'info@example.com');
        set_theme_mod('eco_landscaping_topbar_address', '775 Rolling Green Rd.');
        set_theme_mod('eco_landscaping_header_button_link', '#');
        
        set_theme_mod('eco_landscaping_social_media1_heading', 'www.facebook.com');
        set_theme_mod('eco_landscaping_social_media2_heading', 'www.instagram.com');
        set_theme_mod('eco_landscaping_social_media3_heading', 'www.twitter.com');
        set_theme_mod('eco_landscaping_social_media4_heading', 'www.youtube.com');

        // ------- Banner Section --------
        
        set_theme_mod("eco_landscaping_banner_image", get_template_directory_uri() . "/img/banner.png");
        set_theme_mod("eco_landscaping_banner_heading", 'TRANSFORMING OUTDOOR SPACES INTO NATURAL MASTERPIECES');
        set_theme_mod("eco_landscaping_banner_small_head", 'DISCOVER A WHOLE NEW WORLD OF NATURE');
        set_theme_mod("eco_landscaping_banner_button_link", '#');  

        // ------- Services Section --------

        set_theme_mod('eco_landscaping_services_small_heading', 'Our Services');
        set_theme_mod('eco_landscaping_services_main_heading', 'Beauty Awaits You in Every Garden');
    
        $eco_landscaping_service_icons = array('bi bi-water', 'bi bi-tree-fill', 'bi bi-flower2', 'bi bi-bug','bi bi-flower1');
        $eco_landscaping_service_headings = array('Garden Design & Planning', 'Lawn Installation', 'Hardscaping Patios, Pathways', 'Planting Services','Irrigation System Installation');

        set_theme_mod('eco_landscaping_services_increase', 5);
        for ($i = 1; $i <= 5; $i++) {
            set_theme_mod("eco_landscaping_services_icon$i", $eco_landscaping_service_icons[$i - 1]);
            set_theme_mod("eco_landscaping_services_inner_heading$i", $eco_landscaping_service_headings[$i - 1]);
        }

        echo '<div class="success">Demo Import Successful</div>';
    }
?>

<ul>
    <li>
        <hr>
        <?php if (!isset($_POST['submit'])) : ?>
            <?php echo esc_html__('Click on the below button to get demo content installed.', 'eco-landscaping'); ?>
            <br>
            <form id="demo-importer-form" action="" method="POST" onsubmit="return confirm('Do you really want to do this?');">
                <input class="run-btn" type="submit" name="submit" value="<?php echo esc_attr('Run Importer', 'eco-landscaping'); ?>">
            </form>
        <?php else: ?>
            <div class="visit">
                <a href="<?php echo esc_url(home_url()); ?>" class="button button-primary button-large run-btn" style="margin-top: 10px;" target="_blank">View Site</a>
            </div>
        <?php endif; ?>
        <hr>
    </li>
</ul>
</div>