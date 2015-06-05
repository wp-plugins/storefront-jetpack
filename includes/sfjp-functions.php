<?php
/**
 * Created by PhpStorm.
 * User: shramee
 * Date: 3/6/15
 * Time: 11:35 PM
 */

/**
 * Set's mod fields defaults
 *
 * @param array $mod
 *
 * @return array|bool
 */
function sfjp_get_mod_data( $mod = array() ) {

	if ( empty( $mod['label'] ) OR empty( $mod['description'] ) ) {
		return false;
	}

	if ( empty( $mod['url'] ) ) {
		$mod['url'] = 'http://pootlepress.com';
	}

	if ( empty( $mod['img'] ) ) {
		$mod['img'] = StorefrontJetpackUrl . 'assets/pootle-logo.png';
	}

	if ( empty( $mod['author'] ) ) {
		$mod['author'] = 'PootlePress';
	}

	if ( empty( $mod['author_url'] ) ) {
		$mod['author_url'] = 'http://pootlepress.com';
	}

	return $mod;

}