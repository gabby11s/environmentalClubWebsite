<?php
/**
 * Theme Customizer Controls
 *
 * @package Eco Landscaping
 */

if ( ! function_exists( 'eco_landscaping_customizer_blog_register' ) ) :
function eco_landscaping_customizer_blog_register( $wp_customize ) {
	
	$wp_customize->add_panel(
        'eco_landscaping_blog_settings_panel',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Blog Settings', 'eco-landscaping' ),
        )
    );

	// Section Posts
    $wp_customize->add_section(
        'eco_landscaping_posts_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Posts', 'eco-landscaping' ),
            'panel'          => 'eco_landscaping_blog_settings_panel',
        )
    ); 

	// Title label
	$wp_customize->add_setting( 
		'eco_landscaping_label_post_meta_show', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_post_meta_show', 
		array(
		    'label'       => esc_html__( 'Posts Meta', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_posts_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_label_post_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'eco_landscaping_enable_posts_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'eco_landscaping_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Toggle_Control( $wp_customize, 'eco_landscaping_enable_posts_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_posts_settings',
		    'type'        => 'eco-landscaping-toggle',
		    'settings'    => 'eco_landscaping_enable_posts_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'eco_landscaping_enable_posts_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'eco_landscaping_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Toggle_Control( $wp_customize, 'eco_landscaping_enable_posts_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_posts_settings',
		    'type'        => 'eco-landscaping-toggle',
		    'settings'    => 'eco_landscaping_enable_posts_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'eco_landscaping_enable_posts_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'eco_landscaping_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Toggle_Control( $wp_customize, 'eco_landscaping_enable_posts_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_posts_settings',
		    'type'        => 'eco-landscaping-toggle',
		    'settings'    => 'eco_landscaping_enable_posts_meta_comments',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'eco_landscaping_label_sidebar_layout', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_posts_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_label_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'eco_landscaping_blog_sidebar_layout',
        array(
            'default'			=> 'right',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'eco_landscaping_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Eco_Landscaping_Radio_Image_Control( $wp_customize,'eco_landscaping_blog_sidebar_layout',
            array(
                'settings'		=> 'eco_landscaping_blog_sidebar_layout',
                'section'		=> 'eco_landscaping_posts_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'eco-landscaping' ),
                'choices'		=> array(
                    'right'	        => ECO_LANDSCAPING_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => ECO_LANDSCAPING_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'three_colm'	        => ECO_LANDSCAPING_DIR_URI . '/inc/customizer/assets/images/c3.png',
                    'four_colm'	        => ECO_LANDSCAPING_DIR_URI . '/inc/customizer/assets/images/c4.png',
                    'grid_layout'	        => ECO_LANDSCAPING_DIR_URI . '/inc/customizer/assets/images/c5.png',
                    'grid_left_sidebar'	        => ECO_LANDSCAPING_DIR_URI . '/inc/customizer/assets/images/c6.png',
                    'grid_right_sidebar'	        => ECO_LANDSCAPING_DIR_URI . '/inc/customizer/assets/images/c7.png',
                    'no' 	        => ECO_LANDSCAPING_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'eco_landscaping_label_blog_excerpt', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_blog_excerpt', 
		array(
		    'label'       => esc_html__( 'Post Excerpt', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_posts_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_label_blog_excerpt',
		) 
	));

	// add post excerpt textbox
    $wp_customize->add_setting(
        'eco_landscaping_posts_excerpt_length',
        array(
            'type' => 'theme_mod',
            'default'           => 30,
            'sanitize_callback' => 'eco_landscaping_sanitize_number',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_posts_excerpt_length',
        array(
            'settings'      => 'eco_landscaping_posts_excerpt_length',
            'section'       => 'eco_landscaping_posts_settings',
            'type'          => 'number',
            'label'         => esc_html__( 'Post Excerpt Length', 'eco-landscaping' ),
        )
    );

    // add readmore textbox
    $wp_customize->add_setting(
        'eco_landscaping_posts_readmore_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'READ MORE', 'eco-landscaping' ),
            'sanitize_callback' => 'eco_landscaping_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_posts_readmore_text',
        array(
            'settings'      => 'eco_landscaping_posts_readmore_text',
            'section'       => 'eco_landscaping_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Read More Text', 'eco-landscaping' ),
        )
    );

    //=========================================================================

	// Section Single Post
    $wp_customize->add_section(
        'eco_landscaping_single_post_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Single Post', 'eco-landscaping' ),
            'panel'          => 'eco_landscaping_blog_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'eco_landscaping_label_single_post_category_show', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_single_post_category_show', 
		array(
		    'label'       => esc_html__( 'Post Category', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_single_post_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_label_single_post_category_show',
		) 
	));

	// Add an option to enable the category
	$wp_customize->add_setting( 
		'eco_landscaping_enable_single_post_cat', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'eco_landscaping_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Toggle_Control( $wp_customize, 'eco_landscaping_enable_single_post_cat', 
		array(
		    'label'       => esc_html__( 'Show Category', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_single_post_settings',
		    'type'        => 'eco-landscaping-toggle',
		    'settings'    => 'eco_landscaping_enable_single_post_cat',
		) 
	));

	// add category textbox
    $wp_customize->add_setting(
        'eco_landscaping_single_post_category_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Category:', 'eco-landscaping' ),
            'sanitize_callback' => 'eco_landscaping_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_single_post_category_text',
        array(
            'settings'      => 'eco_landscaping_single_post_category_text',
            'section'       => 'eco_landscaping_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Category Text', 'eco-landscaping' ),
        )
    );

	// Title label
	$wp_customize->add_setting( 
		'eco_landscaping_label_single_post_tag_show', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_single_post_tag_show', 
		array(
		    'label'       => esc_html__( 'Post Tags', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_single_post_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_label_single_post_tag_show',
		) 
	));

	// Add an option to enable the tags
	$wp_customize->add_setting( 
		'eco_landscaping_enable_single_post_tags', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'eco_landscaping_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Toggle_Control( $wp_customize, 'eco_landscaping_enable_single_post_tags', 
		array(
		    'label'       => esc_html__( 'Show Tags', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_single_post_settings',
		    'type'        => 'eco-landscaping-toggle',
		    'settings'    => 'eco_landscaping_enable_single_post_tags',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'eco_landscaping_label_single_pos_meta_show', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_single_pos_meta_show', 
		array(
		    'label'       => esc_html__( 'Post Meta', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_single_post_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_label_single_pos_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'eco_landscaping_enable_single_post_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'eco_landscaping_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Toggle_Control( $wp_customize, 'eco_landscaping_enable_single_post_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_single_post_settings',
		    'type'        => 'eco-landscaping-toggle',
		    'settings'    => 'eco_landscaping_enable_single_post_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'eco_landscaping_enable_single_post_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'eco_landscaping_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Toggle_Control( $wp_customize, 'eco_landscaping_enable_single_post_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_single_post_settings',
		    'type'        => 'eco-landscaping-toggle',
		    'settings'    => 'eco_landscaping_enable_single_post_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'eco_landscaping_enable_single_post_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'eco_landscaping_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Toggle_Control( $wp_customize, 'eco_landscaping_enable_single_post_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_single_post_settings',
		    'type'        => 'eco-landscaping-toggle',
		    'settings'    => 'eco_landscaping_enable_single_post_meta_comments',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'eco_landscaping_label_single_pos_nav_show', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_single_pos_nav_show', 
		array(
		    'label'       => esc_html__( 'Post Navigation', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_single_post_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_label_single_pos_nav_show',
		) 
	));

    // add next article textbox
    $wp_customize->add_setting(
        'eco_landscaping_single_post_next_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Next Article', 'eco-landscaping' ),
            'sanitize_callback' => 'eco_landscaping_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_single_post_next_article_text',
        array(
            'settings'      => 'eco_landscaping_single_post_next_article_text',
            'section'       => 'eco_landscaping_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Next Article Text', 'eco-landscaping' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'eco-landscaping' ),
        )
    );

    // add previous article textbox
    $wp_customize->add_setting(
        'eco_landscaping_single_post_previous_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Previous Article', 'eco-landscaping' ),
            'sanitize_callback' => 'eco_landscaping_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'eco_landscaping_single_post_previous_article_text',
        array(
            'settings'      => 'eco_landscaping_single_post_previous_article_text',
            'section'       => 'eco_landscaping_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Previous Article Text', 'eco-landscaping' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'eco-landscaping' ),
        )
    );
    
	// Title label
	$wp_customize->add_setting( 
		'eco_landscaping_label_single_sidebar_layout', 
		array(
		    'sanitize_callback' => 'eco_landscaping_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Eco_Landscaping_Title_Info_Control( $wp_customize, 'eco_landscaping_label_single_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'eco-landscaping' ),
		    'section'     => 'eco_landscaping_single_post_settings',
		    'type'        => 'eco-landscaping-title',
		    'settings'    => 'eco_landscaping_label_single_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'eco_landscaping_blog_single_sidebar_layout',
        array(
            'default'			=> 'no',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'eco_landscaping_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Eco_Landscaping_Radio_Image_Control( $wp_customize,'eco_landscaping_blog_single_sidebar_layout',
            array(
                'settings'		=> 'eco_landscaping_blog_single_sidebar_layout',
                'section'		=> 'eco_landscaping_single_post_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'eco-landscaping' ),
                'choices'		=> array(
                    'right'	        => ECO_LANDSCAPING_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => ECO_LANDSCAPING_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => ECO_LANDSCAPING_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );
}
endif;

add_action( 'customize_register', 'eco_landscaping_customizer_blog_register' );