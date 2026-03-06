<?php
/**
 * @package Eco Landscaping
 */

//Return if the first widget area has no widgets
if ( !is_active_sidebar( 'footer-1' ) ) {
	return;
} ?>

<?php //user selected widget columns

	$eco_landscaping_widget_num = esc_html(get_theme_mod('eco_landscaping_footer_widgets', '4'));
	
	if ($eco_landscaping_widget_num == '4') :
		$eco_landscaping_col1 ='col-md-3';
		$eco_landscaping_col2 ='col-md-3';
		$eco_landscaping_col3 ='col-md-3';
		$eco_landscaping_col4 ='col-md-3';
	elseif ($eco_landscaping_widget_num == '3') :
		$eco_landscaping_col1 ='col-md-4';
		$eco_landscaping_col2 ='col-md-4';
		$eco_landscaping_col3 ='col-md-4';
		
	elseif ($eco_landscaping_widget_num == '2') :
		 $eco_landscaping_col1 ='col-md-6';
		 $eco_landscaping_col2 ='col-md-6';
	else :
		$eco_landscaping_col1 ='col-md-12';
	endif;
?>
		
<?php 
	if ( is_active_sidebar( 'footer-1' ) && ( $eco_landscaping_widget_num == '4' || $eco_landscaping_widget_num == '3' || $eco_landscaping_widget_num == '2' || $eco_landscaping_widget_num == '1')) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($eco_landscaping_col1); ?>">
				<?php dynamic_sidebar( 'footer-1'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-2' ) && ( $eco_landscaping_widget_num == '4' || $eco_landscaping_widget_num == '3' || $eco_landscaping_widget_num == '2')) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($eco_landscaping_col2); ?>">
				<?php dynamic_sidebar( 'footer-2'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-3' ) && ( $eco_landscaping_widget_num == '4' || $eco_landscaping_widget_num == '3' )) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($eco_landscaping_col3); ?>">
				<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-4' ) && ( $eco_landscaping_widget_num == '4' )) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($eco_landscaping_col4); ?>">
				<?php dynamic_sidebar( 'footer-4'); ?>
			</div>
		<?php
	endif;
?>