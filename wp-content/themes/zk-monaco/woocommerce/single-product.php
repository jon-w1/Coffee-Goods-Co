<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action( 'woocommerce_before_main_content' );
	?>	
		<?php cms_shop_page_title(); ?>
		<?php //cms_page_title(); ?>
		<div class="container cms-product-detail <?php echo esc_attr($smof_data['enable_shop_page_title'])?'':'no-page-title'; ?>">
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
						<?php while ( have_posts() ) : the_post(); ?>

							<?php wc_get_template_part( 'content', 'single-product' ); ?>

						<?php endwhile; // end of the loop. ?>
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
