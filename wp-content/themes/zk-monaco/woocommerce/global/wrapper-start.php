<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $smof_data;
$template = get_option( 'template' );

switch( $template ) {
	default :
		echo '<div id="cms-woocontainer">';
		break;
}
