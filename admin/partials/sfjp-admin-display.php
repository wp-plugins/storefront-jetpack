<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://pootlepress.co.uk
 * @since      1.0.0
 *
 * @package    Storefront_Jetpack
 * @subpackage Storefront_Jetpack/admin/partials
 */

$s = get_option( 'sfjp_mods_enabled', '' );
$mods = apply_filters( 'sfjp_mods', array() );
?>

<div id="sfjp-settings-page" class="wrap">
	<h2>Storefront Jetpack</h2>
	<p><?php
		$message = 'Activate or Deactivate Storefront Jetpack features below and then click \'Save Changes\'. Storefront Jetpack was created by PootlePress. Visit our %1$s store %2$s to find out more about our other products.';
		$link = ' <a href="http://www.pootlepress.com/store?utm_source=storefront-jetpack&utm_medium=plugin&utm_campaign=settings-page"> ';
		printf( __( $message, 'storefront-jetpack' ), $link, ' </a> ' ); ?></p>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php settings_fields( 'storefront_jetpack' ); ?>
		<div class="widefat mod-cards">
			<?php
				foreach( $mods as $id => $mod ){
					$mod = sfjp_get_mod_data( $mod );
					?>
					<div class="mod-card-wrap <?php echo $id; ?>-wrap">
						<div class="mod-card <?php echo $id; ?> <?php if ( ! empty( $s[ $id ] ) ) {
							echo 'active';
						} ?>">

							<div class="mod-img">
								<a href="<?php echo $mod['url'] ?>" class="thickbox"><img src="<?php echo $mod['img'] ?>"></a>
							</div>

							<div class="mod-controls">
								<a class="button pootle activate"><?php _e( 'Activate', 'storefront-jetpack' ) ?></a>
								<a class="button deactivate"><?php _e( 'Deactivate', 'storefront-jetpack' ) ?></a>
								<input type="hidden" name="sfjp_mods_enabled[<?php echo $id; ?>]" value="<?php echo $s[ $id ] ? $s[ $id ] : ''; ?>">
							</div>

							<div class="mod-details">
								<div class="mod-name">
									<h4><a href="<?php echo $mod['url'] ?>" class="thickbox"><?php _e( $mod['label'], 'storefront-jetpack' ) ?></a></h4>
								</div>
								<div class="desc mod-description">
									<p class="mod-description"><?php echo $mod['description'] ?></p>
									<p class="mod-authors"> <cite><?php _e( 'By', 'storefront-jetpack' ) ?> <a href="<?php echo $mod['author_url'] ?>"><?php echo $mod['author'] ?></a></cite></p>
								</div>
							</div>
						</div>
					</div>
				<?php
				}
			?>
		</div>
		<?php submit_button(); ?>
	</form>
</div>