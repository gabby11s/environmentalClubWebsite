<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Eco Landscaping
 */


?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'primary-sidebar' ); ?>
</aside><!-- #secondary -->

<?php if ( ! is_active_sidebar( 'primary-sidebar' ) ) { ?>

	<aside id="secondary" class="widget-area" role="complementary">
		<!-- Search -->
		<aside id="search-3" class="widget widget_search">
			<h2 class="widget-title"><?php esc_html_e('Search Here', 'eco-landscaping'); ?></h2>
			<?php get_search_form(); ?>
		</aside>
		<!-- Categories -->
		<aside id="categories" class="widget widget_categories" role="complementary" aria-label="<?php esc_attr_e( 'secondsidebar', 'eco-landscaping' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Categories', 'eco-landscaping'); ?></h2>
		    <ul>
		        <?php
		        $args = array(
		            'title_li' => '',
		        );
		        wp_list_categories($args);
		        ?>
		    </ul>
		</aside>
		<!-- Archive -->
		<aside id="archive" class="widget widget_archive" role="complementary" aria-label="<?php esc_attr_e( 'secondsidebar', 'eco-landscaping' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Archive List', 'eco-landscaping'); ?></h2>
		    <ul>
		        <?php wp_get_archives('type=monthly'); ?>
		    </ul>
		</aside>
		<!-- Tag Sidebar -->
		<aside id="tag-sidebar" class="widget widget_tag_cloud" role="complementary" aria-label="<?php esc_attr_e( 'thirdsidebar', 'eco-landscaping' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Popular Tags', 'eco-landscaping'); ?></h2>
		    <div class="tagcloud">
		        <?php
		        $eco_landscaping_tags = get_tags(array(
		            'orderby' => 'count',
		            'order'   => 'DESC',
		            'number'  => 20, // You can change the number of tags displayed
		        ));

		        if ($eco_landscaping_tags) {
		            foreach ($eco_landscaping_tags as $eco_landscaping_tag) {
		                $eco_landscaping_tag_link = get_tag_link($eco_landscaping_tag->term_id);
		                $eco_landscaping_tag_name = $eco_landscaping_tag->name;
		                $eco_landscaping_tag_count = $eco_landscaping_tag->count;
		                echo '<a href="' . esc_url($eco_landscaping_tag_link) . '" class="tag-link" title="' . esc_attr($eco_landscaping_tag_name) . ' (' . $eco_landscaping_tag_count . ' posts)">' . esc_html($eco_landscaping_tag_name) . '</a> ';
		            }
		        } else {
		            echo '<p>' . esc_html__('No tags found.', 'eco-landscaping') . '</p>';
		        }
		        ?>
		    </div>
		</aside>	
	</aside>

<?php } ?>
