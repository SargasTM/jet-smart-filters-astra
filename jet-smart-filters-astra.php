<?php
/**
 * Plugin Name: JetSmartFilters - Astra compatibility
 * Plugin URI:  #
 * Description: Adds some compatibility with the Astra theme.
 * Version:     1.0.1
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
add_filter( 'jet-smart-filters/providers/epro-archive-products/before-ajax-content', 'jet_smart_filters_astra_shop_customization' );

if ( ! function_exists( 'jet_smart_filters_astra_shop_customization' ) ) {

	function jet_smart_filters_astra_shop_customization() {

		if ( class_exists( 'Astra_Woocommerce' ) ) {

			// 'ASTRA_Ext_WooCommerce_Markup' class is part of Astra Pro, that instance fixes order/sort toolbar shift.
			if ( class_exists( 'ASTRA_Ext_WooCommerce_Markup' ) ) {
	                    ASTRA_Ext_WooCommerce_Markup::get_instance()->shop_page_styles();
	                }
			// 'Astra_Ext_Advanced_Hooks_Markup' class is part of Astra Pro, that instance makes sure custom hooks used on the product feeds also render on Ajax load.
			if ( class_exists( 'Astra_Ext_Advanced_Hooks_Markup' ) ) {
	                    Astra_Ext_Advanced_Hooks_Markup::get_instance()->load_markup();
	                }
			Astra_Woocommerce::get_instance()->woocommerce_init();
			Astra_Woocommerce::get_instance()->shop_customization();

		}

	}

}
