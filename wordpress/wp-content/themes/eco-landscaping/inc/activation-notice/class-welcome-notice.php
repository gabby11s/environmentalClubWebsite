<?php

/**
 * Welcome Notice class.
 */
class Eco_Landscaping_Welcome_Notice {

	/**
	** Constructor.
	*/
	public function __construct() {
		// Render Notice
		add_action( 'admin_notices', [$this, 'eco_landscaping_render_notice'] );

		// Enque AJAX Script
		add_action( 'admin_enqueue_scripts', [$this, 'eco_landscaping_admin_enqueue_scripts'], 5 );

		// Dismiss
		add_action( 'admin_enqueue_scripts', [$this, 'eco_landscaping_notice_enqueue_scripts'], 5 );
		add_action( 'wp_ajax_eco_landscaping_dismissed_handler', [$this, 'eco_landscaping_dismissed_handler'] );

		// Reset
		add_action( 'switch_theme', [$this, 'eco_landscaping_reset_notices'] );
		add_action( 'after_switch_theme', [$this, 'eco_landscaping_reset_notices'] );

	}

	/**
	** Render Notice
	*/
	public function eco_landscaping_render_notice() {
	global $pagenow;

	$eco_landscaping_screen = get_current_screen();

	if (
		$eco_landscaping_screen &&
		$eco_landscaping_screen->id !== 'appearance_page_eco-landscaping-theme-info' &&
		$eco_landscaping_screen->id !== 'appearance_page_eco-landscaping-demo'
	) {
		$eco_landscaping_transient_name = sprintf('%s_activation_notice', get_template());

		if ( ! get_transient($eco_landscaping_transient_name) ) {
			?>
			<div class="eco-landscaping-notice notice notice-info is-dismissible" data-notice="<?php echo esc_attr($eco_landscaping_transient_name); ?>">
				<button type="button" class="notice-dismiss"></button>

				<?php $this->eco_landscaping_render_notice_content(); ?>
			</div>
			<?php
		}
	}
}

	/**
	** Render Notice Content
	*/
	public function eco_landscaping_render_notice_content() {
		$eco_landscaping_action = 'install-activate';
		$eco_landscaping_redirect_url = 'admin.php?page=eco-landscaping-theme-info';
		$eco_landscaping_demo_redirect_url = 'themes.php?page=eco-landscaping-demo';
		$eco_landscaping_screen = get_current_screen();

		?>
		<div class="notice-left-icon-box">
			<span class="dashicons dashicons-palmtree notc-theme-icon"></span>
		</div>
		<div class="welcome-message">
			<div class="notc-contnt">
				<h4><?php esc_html_e('Thank you for installing Legacy Themes!', 'eco-landscaping'); ?></h4>
				<h1><?php esc_html_e('Welcome to Eco Landscaping WordPress Theme!', 'eco-landscaping'); ?></h1>
				<p><?php esc_html_e( 'Our WordPress themes are modern, minimalist, fully responsive, SEO-friendly, and packed with features—perfect for designers, bloggers, and creative professionals across various fields.', 'eco-landscaping' );?>
				</p>			
				<div class="action-buttons">
					<a href="<?php echo esc_url(admin_url($eco_landscaping_redirect_url)); ?>" class="button notice-btn button-hero" data-action="<?php echo esc_attr($eco_landscaping_action); ?>">
						<span class="notc-btn-txt"><?php echo esc_html__( 'Get Started with Eco Landscaping', 'eco-landscaping' ); ?></span>
					</a>
					<a href="<?php echo esc_url(admin_url($eco_landscaping_demo_redirect_url)); ?>" class="demo-btn btn" >
						<span class="demo-btn-txt"><?php echo esc_html__( 'Demo Import', 'eco-landscaping' ); ?></span>
					</a>
					<a href="<?php echo esc_url(ECO_LANDSCAPING_THEME_BUNDLE_URL); ?>" target="_blank" class="bundle-btn btn" >
						<span class="demo-btn-txt"><?php echo esc_html__( 'Get All Themes', 'eco-landscaping' ); ?></span>
					</a>
				</div>
			</div>			
		</div>
		<div class="notice-right-img-box">
			<img class="notc-right-img" src="<?php echo esc_url( get_template_directory_uri() . '/inc/activation-notice/img/notice-right.png' ); ?>" alt="<?php esc_attr_e( 'notice themes img', 'eco-landscaping' ); ?>" />
		</div>

		<?php
	}

	/**
	** Reset Notice.
	*/
	public function eco_landscaping_reset_notices() {
		delete_transient( sprintf( '%s_activation_notice', get_template() ) );
	}

	/**
	** Dismissed handler
	*/
	public function eco_landscaping_dismissed_handler() {
		wp_verify_nonce( null );

		if ( isset( $_POST['notice'] ) ) {
			set_transient( sanitize_text_field( wp_unslash( $_POST['notice'] ) ), true, 0 );
		}
	}

	/**
	** Notice Enqunue Scripts
	*/
	public function eco_landscaping_notice_enqueue_scripts( $page ) {
		
		wp_enqueue_script( 'jquery' );

		ob_start();
		?>
		<script>
			jQuery(function($) {
				$( document ).on( 'click', '.eco-landscaping-notice .notice-dismiss', function () {
					jQuery.post( 'ajax_url', {
						action: 'eco_landscaping_dismissed_handler',
						notice: $( this ).closest( '.eco-landscaping-notice' ).data( 'notice' ),
					});
					$( '.eco-landscaping-notice' ).hide();
				} );
			});
		</script>
		<?php
		$script = str_replace( 'ajax_url', admin_url( 'admin-ajax.php' ), ob_get_clean() );

		wp_add_inline_script( 'jquery', str_replace( ['<script>', '</script>'], '', $script ) );
	}

	/**
	** Register scripts and styles for welcome notice.
	*/
	public function eco_landscaping_admin_enqueue_scripts( $page ) {
		// Enqueue Styles.
		wp_enqueue_style( 'eco-landscaping-welcome-notic-css', get_template_directory_uri() . '/inc/activation-notice/css/notice-bar.css' );
	}

}

new Eco_Landscaping_Welcome_Notice();