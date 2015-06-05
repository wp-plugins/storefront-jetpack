<?php
/**
 * Created by Shramee
 * Date: 3/6/15
 * Time: 10:05 PM
 */

/**
 * Contains default modules in Storefront Jetpack
 *
 * Example
 * 'mod_id' => array(
 *   'label' => 'Mod Name',                      //Required
 *   'url' => 'http://modurl.com',               //Default http://pootlepress.com
 *   'description' => 'Describe the mod here',   //Required
 *   'img' => 'http://url/to/mod/img.png',       //Default pootle image
 *   'author' => 'Shramee',                      //Default PootlePress
 *   'author_url' => 'http://shramee.com',       //Default http://pootlepress.com
 * ),
 *
 * @since 1.0.0
 */
$sfjp_modules = array(
	'align_menu_right' => array(
		'label' => 'Align Menu Right of logo',
		'url' => 'http://www.pootlepress.com/shop/align-menu-right-woothemes-storefront/',
		'description' => "Provides an option under Appearance > Customize (under 'Header' section) to align the primary navigation to the right of the logo.",
		'img' => StorefrontJetpackUrl . 'assets/sfx-amr.png',
	),
	'add_top_bar' => array(
		'label' => 'Add Top Bar',
		'url' => 'http://pootlepress.com',
		'description' => "Adds a top bar to Storefront, above the header. The text can be edited in Appearance > Customize, under the 'Header' section.",
		'img' => StorefrontJetpackUrl . 'assets/top-bar.png',
	),
	'remove_header_search' => array(
		'label' => 'Remove Search bar from header',
		'url' => 'http://pootlepress.com',
		'description' => 'When activated this removes the search bar from the header (when WooCommerce is installed).',
		'img' => StorefrontJetpackUrl . 'assets/hide-header-search.png',
	),
	'custom_logo' => array(
		'label' => 'Add Logo',
		'url' => 'http://pootlepress.com',
		'description' => 'Add your own custom logo to Storefront. Activate and go to Appearance > Customize > Logo, Site Title & Tagline',
		'img' => StorefrontJetpackUrl . 'assets/custom-logo.png',
	),
);