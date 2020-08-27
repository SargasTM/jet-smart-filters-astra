<?php
/**
 * Plugin Name: JetSmartFilters - Astra compatibility
 * Plugin URI:  #
 * Description: Adds some compatibility with the Astra theme.
 * Version:     1.0.0
 * Author:      Crocoblock
 * Author URI:  https://crocoblock.com/
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

add_filter( 'jet-smart-filters/providers/epro-products/before-ajax-content', 'jet_smart_filters_astra_shop_customization' );

if ( ! function_exists( 'jet_smart_filters_astra_shop_customization' ) ) {

	function jet_smart_filters_astra_shop_customization() {

		if ( class_exists( 'Astra_Woocommerce' ) ) {

			Astra_Woocommerce::get_instance()->woocommerce_init();
			Astra_Woocommerce::get_instance()->shop_customization();

		}

	}

}