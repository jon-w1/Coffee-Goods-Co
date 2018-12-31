<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $smof_data;
get_header( 'shop' ); ?>

		<?php cms_shop_page_title(); ?>
		<div class="cms-archive-product container <?php echo esc_attr($smof_data['enable_shop_page_title'])?'':'no-page-title'; ?>">
		<div id="main" role="main">
		<div id="content">
			<div class="row">
				<div id="page-sidebar" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<?php
						/**
						 * woocommerce_sidebar hook
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						do_action( 'woocommerce_sidebar' );
					?>
				</div>

				<div id="primary" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<?php do_action( 'woocommerce_archive_description' ); ?>
					<?php if ( have_posts() ) : ?>

						<div class="clearfix">
						<?php
							/**
							 * woocommerce_before_shop_loop hook
							 *
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
						?>
						</div>
						<div class="cms-woocommerce woocommerce columns-<?php echo esc_attr($smof_data['product_list_column'] ? $smof_data['product_list_column'] : '3'); ?>">
						<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', 'product' ); ?>

							<?php endwhile; // end of the loop. ?>

						<?php woocommerce_product_loop_end(); ?>
						</div><!-- .cms-woocommerce -->
						<?php
							/**
							 * woocommerce_after_shop_loop hook
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php wc_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>
				</div>
			</div>
		</div>
		</div>
		</div>
	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action( 'woocommerce_after_main_content' );
	?>


<?php get_footer( 'shop' ); ?>
