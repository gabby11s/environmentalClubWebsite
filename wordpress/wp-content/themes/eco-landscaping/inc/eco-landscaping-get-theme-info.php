<?php
/**
 * Theme information Eco Landscaping
 *
 * @package Eco Landscaping
 */


 define('ECO_LANDSCAPING_DEMO_URL','https://legacytheme.net/trial/eco-landscaping/');
 define('ECO_LANDSCAPING_THEME_PRO_URL','https://www.legacytheme.net/products/landscaping-wordpress-theme/');
 define('ECO_LANDSCAPING_THEME_DOC_URL','https://www.legacytheme.net/tutorial/eco-landscaping-lite/');
 define('ECO_LANDSCAPING_THEME_SUPPORT_URL','https://wordpress.org/support/theme/eco-landscaping/');
 define('ECO_LANDSCAPING_THEME_RATINGS_URL','https://wordpress.org/support/theme/eco-landscaping/reviews/');
 define('ECO_LANDSCAPING_THEME_UPGRADE_URL','https://www.legacytheme.net/products/landscaping-wordpress-theme/'); 
 define('ECO_LANDSCAPING_THEME_BUNDLE_URL','https://www.legacytheme.net/products/wordpress-theme-bundle/');  


if ( ! class_exists( 'Eco_Landscaping_About_Page' ) ) {
	/**
	 * Singleton class used for generating the about page of the theme.
	 */
	class Eco_Landscaping_About_Page {
		/**
		 * Define the version of the class.
		 *
		 * @var string $version The Eco_Landscaping_About_Page class version.
		 */
		private $version = '1.0.0';
		/**
		 * Used for loading the texts and setup the actions inside the page.
		 *
		 * @var array $config The configuration array for the theme used.
		 */
		private $config;
		/**
		 * Get the theme name using wp_get_theme.
		 *
		 * @var string $theme_name The theme name.
		 */
		private $theme_name;
		/**
		 * Get the theme slug ( theme folder name ).
		 *
		 * @var string $theme_slug The theme slug.
		 */
		private $theme_slug;
		/**
		 * The current theme object.
		 *
		 * @var WP_Theme $theme The current theme.
		 */
		private $theme;
		/**
		 * Holds the theme version.
		 *
		 * @var string $theme_version The theme version.
		 */
		private $theme_version;		
		/**
		 * Define the html notification content displayed upon activation.
		 *
		 * @var string $notification The html notification content.
		 */
		private $notification;
		/**
		 * The single instance of Eco_Landscaping_About_Page
		 *
		 * @var Eco_Landscaping_About_Page $instance The Eco_Landscaping_About_Page instance.
		 */
		private static $instance;
		/**
		 * The Main Eco_Landscaping_About_Page instance.
		 *
		 * We make sure that only one instance of Eco_Landscaping_About_Page exists in the memory at one time.
		 *
		 * @param array $config The configuration array.
		 */
		public static function eco_landscaping_init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Eco_Landscaping_About_Page ) ) {
				self::$instance = new Eco_Landscaping_About_Page;				
				self::$instance->config = $config;
				self::$instance->eco_landscaping_setup_config();	
			}
		}

		/**
		 * Setup the class props based on the config array.
		 */
		public function eco_landscaping_setup_config() {
			$theme = wp_get_theme();
			if ( is_child_theme() ) {
				$this->theme_name = $theme->parent()->get( 'Name' );
				$this->theme      = $theme->parent();
			} else {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			}
			$this->theme_version = $theme->get( 'Version' );
			$this->theme_slug    = $theme->get_template();			
				
		}	
	}
}


/**
 *  Adding a About page 
 */
add_action('admin_menu', 'eco_landscaping_add_menu');
function eco_landscaping_add_menu() {
     add_theme_page(esc_html__('Legacy-themes','eco-landscaping'), esc_html__('Get Theme Info','eco-landscaping'),'manage_options', esc_html__('eco-landscaping-theme-info','eco-landscaping'), esc_html__('eco_landscaping_theme_info','eco-landscaping'));
}

/**
 *  Callback
 */
function eco_landscaping_theme_info() {
	$theme = wp_get_theme();
	$eco_landscaping_demo_redirect_url_getstart = 'themes.php?page=eco-landscaping-demo';
?>
	<div class="theme-info-get">
		<div class="container">
			<div class="top-section">
				<div class="title">
					<h1 class="info-theme-name"><?php esc_html_e( 'Eco Landscaping WordPress Theme', 'eco-landscaping' ); ?> <span><?php echo $theme->get( 'Version' ); ?></span> </h1>
					<p><?php echo $theme->get( 'Description' ); ?></p>
				</div>
			</div>
			<div class="buttons-box">
				<div class="info-btns-link">
					<div class="sidebar">
						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-format-aside"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(ECO_LANDSCAPING_THEME_DOC_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DOCUMENTATION', 'eco-landscaping' ); ?></a></h3>
							</div>						
						</div>

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-visibility"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(ECO_LANDSCAPING_DEMO_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DEMOS', 'eco-landscaping' ); ?></a></h3>
							</div>	
						</div>	

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-admin-generic"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(ECO_LANDSCAPING_THEME_UPGRADE_URL); ?>" target="_blank"><?php esc_html_e( 'UPGRADE TO PRO', 'eco-landscaping' ); ?></a></h3>
							</div>						
						</div>

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-star-filled"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(ECO_LANDSCAPING_THEME_RATINGS_URL); ?>" target="_blank"><?php esc_html_e( 'RATE OUR THEME', 'eco-landscaping' ); ?></a></h3>
							</div>						
						</div>						

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-sos"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(ECO_LANDSCAPING_THEME_SUPPORT_URL); ?>" target="_blank"><?php esc_html_e( 'ASK FOR SUPPORT', 'eco-landscaping' ); ?></a></h3>
							</div>						
						</div>							
					</div>
				</div>
			</div>		
			<div class="middle-section">
				<div class="screnshot-wrapper">
					<div class="scrnsht-box">
						<img class="scrnshot-img" src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
					</div>
				</div>

				<div class="custmzr-settng sidebar-right">
					<div class="quick-links">
						<h2 class="info-qick-hd"><?php esc_html_e( 'Quick Customizer Settings', 'eco-landscaping' ); ?> </h2>
						<div class="cst-btn">			
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-welcome-view-site"></span>
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=custom_logo')) ?>" target="_blank"> <?php esc_html_e( 'Upload Logo', 'eco-landscaping' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-menu-alt2"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=nav_menus')) ?>" target="_blank"> <?php esc_html_e( 'Menu Settings', 'eco-landscaping' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-admin-tools"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[section]=eco_landscaping_home_header_settings')) ?>" target="_blank"> <?php esc_html_e( 'Header Settings', 'eco-landscaping' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-format-image"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[section]=eco_landscaping_home_banner_settings')) ?>" target="_blank"> <?php esc_html_e( 'Banner Settings', 'eco-landscaping' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-image-filter"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[section]=eco_landscaping_home_services_settings')) ?>" target="_blank"> <?php esc_html_e( 'Services Settings', 'eco-landscaping' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-media-default"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=eco_landscaping_enable_page_title')) ?>" target="_blank"> <?php esc_html_e( 'Page Settings', 'eco-landscaping' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-edit-large"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=eco_landscaping_blog_settings_panel')) ?>" target="_blank"> <?php esc_html_e( 'Blog Settings', 'eco-landscaping' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-columns"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[section]=eco_landscaping_footer_settings')) ?>" target="_blank"> <?php esc_html_e( 'Footer Settings', 'eco-landscaping' ); ?> </a>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tick-box">
				<div class="comp-box">
					<h2 class="table-heading"><?php esc_html_e( 'What makes our PRO Version the better option?', 'eco-landscaping' ); ?></h2>
					<div class="comp-table">
						<table>
							<thead> 
								<tr> 
								 	<th class="thead-column1"><strong><h4><?php esc_html_e( 'Feature', 'eco-landscaping' ); ?></h4></strong></th>
									<th class="thead-column2"><strong><h4><?php esc_html_e( 'Eco Landscaping Free', 'eco-landscaping' ); ?></h4></strong></th>
									<th class="thead-column3"><strong><h4><?php esc_html_e( 'Eco Landscaping Pro', 'eco-landscaping' ); ?></h4></strong></th>
								</tr> 
							</thead>
							<tbody>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Customizer Theme Options', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Footer Widget', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Inner Pages Settings', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Blog Sidebar', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Responsive Design (Mobile, Tablets)', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Sidebar Options (Full, Left and Right)', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( '1 Click Demo Import', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Preloader', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Contact Form', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Advance Typography', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'WooCommerce Settings', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Extra Customizer Settings', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Sticky Header', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'More Color Options', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Related Posts Section', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Footer Columns Settings', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Priority Support', 'eco-landscaping' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr> 
								<tr class="last-row"> 
						 					<td class="tbody-column1"></td>
						 					<td class="tbody-column2"></td>
						 					<td class="tbody-column3"><a class="button button-primary button-large" href="<?php echo esc_url(ECO_LANDSCAPING_THEME_PRO_URL); ?>" target="_blank"><?php esc_html_e( 'Upgrade to PRO', 'eco-landscaping' ); ?></a></td>
										</tr> 
			   				</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="bundle-detail">
			<div class="second-side">
				<div class="bundle-wrapper">
					<h3 class="info-theme-name"><?php esc_html_e( 'Bundle up and save! Unlock all our stunning themes in one exclusive pack.', 'eco-landscaping' ); ?> </h3>
					<div class="scrnsht-box bundlee">
                   			<img class="scrnshot-img" src="<?php echo esc_url( get_template_directory_uri() . '/img/bundle.png' ); ?>" alt="<?php esc_attr_e('bundle-img', 'eco-landscaping'); ?>">
					</div>
					<div class="info-pro-btn">
						<a class="button button-primary button-large bundle-btn" href="<?php echo esc_url(ECO_LANDSCAPING_THEME_BUNDLE_URL); ?>" target="_blank"><?php esc_html_e( 'GET ALL THEMES – $59', 'eco-landscaping' ); ?></a>
					</div>
					<div class="info-pro-btn">
						<a href="<?php echo esc_url(admin_url($eco_landscaping_demo_redirect_url_getstart)); ?>" class="button button-primary button-large demo-btn btn" >
							<span class="demo-btn-txt"><?php echo esc_html__( 'DEMO CONTENT IMPORTER', 'eco-landscaping' ); ?></span>
						</a>
					</div>
					<div class="info-pro-btn">
						<a class="button button-primary button-large" href="<?php echo esc_url(ECO_LANDSCAPING_THEME_PRO_URL); ?>" target="_blank"><?php esc_html_e( 'UPGRADE TO PRO', 'eco-landscaping' ); ?></a>
					</div>
				</div>
			</div>
		</div>	
	</div>
<?php
}