<?php
/**
 * WooCommerce Template Hooks
 *
 * Action/filter hooks used for WooCommerce functions/templates
 *
 * @author 		WooThemes
 * @category 	Core
 * @package 	WooCommerce/Templates
 * @version     2.6
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/** Forms ****************************************************************/


/* Product price used in Zooka Element (Grid) */
add_action( 'zooka_element_price', 'woocommerce_template_loop_price', 5 );
/**
 * Change number of products per row 
 * @since 1.0.0
 * @author Chinh Duong Manh
*/
if (!function_exists('loop_columns')) {
	function loop_columns() {
		global $smof_data;
		
		if(!empty($smof_data['product_list_column'])){
			$cols = $smof_data['product_list_column'];
		} else {
			$cols = 3;
		}
		return $cols; // products per row
	}
}
add_filter('loop_shop_columns', 'loop_columns');
/* Product to show per page */
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

/** 
 * Custom product list layout
 * This actions applied for product archive page and VC shortcode
 * @since 1.3.0
 * @author Chinh Duong Manh 
*/
if (!function_exists('zk_monaco_wc_template_loop_product_open')) {
	function zk_monaco_wc_template_loop_product_open() {
	?>
		<div class="product-item-wrap overlay-wrap">
			<div class="product-item-media">
				<?php
					woocommerce_show_product_loop_sale_flash();
					woocommerce_template_loop_product_thumbnail();
				?>
				<div class="overlay">
				<div class="overlay-content">
					<div class="product-item-addtocart text-center">
					<?php woocommerce_template_loop_add_to_cart(); ?>
					</div>

				</div>
				</div>
			</div>
	<?php
	}
}
add_action('woocommerce_before_shop_loop_item', 'zk_monaco_wc_template_loop_product_open' , 10);
remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail', 10);

if (!function_exists('zk_monaco_wc_template_loop_product_title')) {
	function zk_monaco_wc_template_loop_product_title() {
	?>
		<div class="product-item-info text-center">
			<h5><a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<?php
				woocommerce_template_loop_rating();
				woocommerce_template_loop_price();
			?>
		</div>
	</div> <!-- .product-item-wrap overlay-wrap -->
	<?php
	}
}
add_action('woocommerce_shop_loop_item_title', 'zk_monaco_wc_template_loop_product_title' , 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' , 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating' , 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' , 10);


remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart', 10);


/**
 * Custom Cart Page 
 * @since 1.3.0
 * @author Chinh Duong Manh 
*/
/* Change position of Process to checkout button */
add_action('woocommerce_cart_actions', 'woocommerce_button_proceed_to_checkout', 1);
remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );

/* Display Cross Sells on 2 columns instead of default 4 */
 
add_filter( 'woocommerce_cross_sells_columns', 'zk_monaco_change_cross_sells_columns' );
function zk_monaco_change_cross_sells_columns( $columns ) {
	return 2;
}
/* Display Only 2 Cross Sells instead of default 4 */
 
add_filter( 'woocommerce_cross_sells_total', 'zk_monaco_change_cross_sells_product_no' ); 
function zk_monaco_change_cross_sells_product_no( $columns ) {
	return 2;
}

/**
 * Custom Single product page
 * Hooked woocommerce_after_single_product_summary
 * @since 1.3.0
 * @author Chinh Duong Manh 
*/
	/* 
	 * Change upsell product column, number to show
	 * https://docs.woocommerce.com/document/change-number-of-upsells-output/
	*/
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

	if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
		function woocommerce_output_upsells() {
		    woocommerce_upsell_display( 3,3 ); // Display 3 products in rows of 3
		}
	}
	/* Hooked woocommerce_output_related_products_args 
	 * Change related product column, number to show
	*/
	add_filter( 'woocommerce_output_related_products_args', 'zk_monaco_related_products_args' );
	function zk_monaco_related_products_args( $args ) {
		$args = array(
			'posts_per_page' => 3, /* 3 related products */
			'columns'		 => 3 /* 3 columns */
		);
		return $args;
	}
