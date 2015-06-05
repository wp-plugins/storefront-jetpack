<?php
/**
 * Created by Shramee
 * Date: 4/6/15
 * Time: 2:59 PM
 */

/**
 * Adds a top bar to Storefront, before the header.
 *
 * @action storefront_before_header
 * @since 1.0.0
 */
function sfjp_add_topbar() {
	?>
	<div id="sfjp-topbar">
		<div class="col-full">
			<p>&nbsp<?php echo get_theme_mod( 'sfjp_topbar_text', "Hello! You can customize this text in Appearance > Customize ('Header' section)" ) ?></p>
		</div>
	</div>
<?php
}
add_action( 'storefront_before_header', 'sfjp_add_topbar' );

/**
 * Adds custom logo field in customizer
 *
 * @param WP_Customize_Manager $wp_customize
 * @action customize_register
 * @since 1.0.0
 */
function sfjp_top_bar_customizer( $wp_customize ) {

	$wp_customize->add_setting( 'sfjp_topbar_text' );

	$wp_customize->add_control( 'sfjp_topbar_text', array(
		'label'    => __( 'Topbar Text', 'storefront-jetpack' ),
		'section'  => 'header_image',
		'settings' => 'sfjp_topbar_text',
		'priority' => 999,
		'type'     => 'textarea',
	) );
}
add_action( 'customize_register', 'sfjp_top_bar_customizer' );