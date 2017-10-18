<?php
/**
 * Getting started splash screen with documentation, plugins & support
 *
 * @package landy
 */

/**
 * Load Getting Started styles in the admin
 *
 */
function landy_start_load_admin_scripts() {
	// Only load files when we are on the correct page
	global $pagenow;
	if( 'themes.php' != $pagenow )
		return;
	// Getting Started javascript
	wp_enqueue_script( 'landy-getting-started', get_template_directory_uri() . '/includes/admin/getting-started/inc/getting-started.js', array( 'jquery' ), '1.0.0', true );
	// Getting Started styles
	wp_register_style( 'landy-getting-started', get_template_directory_uri() . '/includes/admin/getting-started/inc/getting-started.css', false, '1.0.0' );
	wp_enqueue_style( 'landy-getting-started' );
	// Thickbox
	add_thickbox();
}
add_action( 'admin_enqueue_scripts', 'landy_start_load_admin_scripts' );

/**
* Adds a menu item for the getting started page under the appearance menu.
*
*/
function landy_getting_started_menu() {

	$landy_theme_slug = get_template();

	add_theme_page(
		esc_html__('Getting Started', 'landy'),  		// Page title 
		esc_html__('Getting Started', 'landy'),  		// Menu title
		'manage_options', 								// Capability
		$landy_theme_slug . '-getting-started', 		// Menu slug
		'landy_getting_started_page' 					// Function 
	);

}
add_action( 'admin_menu', 'landy_getting_started_menu');


function landy_getting_started_redirect() {
	global $pagenow;
	$landy_theme_slug = get_template();

	if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
		wp_redirect(admin_url('themes.php?page='.$landy_theme_slug.'-getting-started')); // Your admin page URL
	}	
}
add_action( 'after_switch_theme', 'landy_getting_started_redirect');


/**
* Outputs the markup used on the getting started page.
*
*/
function landy_getting_started_page() {
	// Theme info
	$landy_theme = wp_get_theme( 'landy' );
	// Lowercase theme name for resources links
	$landy_theme_name_lower = get_template();
	// Get theme version
	$landy_theme_version = $landy_theme->get( 'Version' );

	/**
	* Create recommended plugin install URLs
	*
	*/
	$landy_contactForm7Url 				= wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=contact-form-7'), 'install-plugin_contact-form-7');
	$landy_shortcodesUltimate 			= wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=shortcodes-ultimate'), 'install-plugin_shortcodes-ultimate');


?>
	
	<div class="wrap getting-started">
		<div class="intro-wrap">
			<div class="intro">
				<h1><?php printf( esc_html__( 'Getting started with %1$s', 'landy' ), $landy_theme['Name'] ); ?></h1>
				<h4><?php printf( esc_html__( 'You will find everything you need to get started below', 'landy' ) ); ?> <span class="version">(version <?php echo esc_attr($landy_theme_version); ?>)</span></h4>
			</div>
		</div>

		<div class="panels">
			<ul class="inline-list">
				<li class="current"><a id="help" href="#"><div class="getting-started-icon dashicons-editor-help"></div> <?php esc_html_e( 'Help File', 'landy' ); ?></a></li>
				<li><a id="plugins" href="#"><div class="getting-started-icon dashicons-admin-plugins"></div> <?php esc_html_e( 'Plugins', 'landy' ); ?></a></li>
				<li><a id="support" href="#"><div class="getting-started-icon dashicons-format-chat"></div> <?php esc_html_e( 'Support', 'landy' ); ?></a></li>
			</ul>

			<div id="panel" class="panel">

				<!-- Help file panel -->
				<div id="help-panel" class="panel-left visible">
					<!-- Grab feed of help file -->
					<?php include_once( ABSPATH . WPINC . '/feed.php' );
					$landy_rss = fetch_feed( 'http://playnethemes.com/articles/'. $landy_theme_name_lower .'/feed/?withoutcomments=1' );
					if ( ! is_wp_error( $landy_rss ) ) :
						$landy_maxitems = $landy_rss->get_item_quantity( 1 );
						$landy_rss_items = $landy_rss->get_items( 0, $landy_maxitems );
					endif;
						$landy_rss_items_check = array_filter( $landy_rss_items );
					?>

					<?php if ( is_wp_error( $landy_rss ) || empty( $landy_rss_items_check ) ) : ?>
						<p><?php esc_html_e( 'This help file feed seems to be temporarily down. You can always view the help file online in the meantime.', 'landy' ); ?> <a href="https://playnethemes.com/articles/<?php echo esd_attr($landy_theme_name_lower); ?>" title="View help file"><?php echo esc_attr($landy_theme['Name']); ?> <?php esc_html_e( 'Help File &rarr;', 'landy' ); ?></a></p>
					<?php else : ?>
					<?php foreach ( $landy_rss_items as $landy_item ) : ?>
						<?php echo wp_kses_post($landy_item->get_content()); ?>
					<?php endforeach; ?>
					<?php endif; ?>
				</div>

				<!-- Plugins panel -->
				<div id="plugins-panel" class="panel-left">

					<h3><?php esc_html_e( 'Recommended Plugins', 'landy' ); ?></h3>
					<p><?php esc_html_e( 'Below is a list of recommended plugins to install that will help you get the most out of landy. Although each plugin is optional, some may be required to achieve a look similiar to the theme demo or to use the full functionality of the theme.', 'landy' ); ?></p>

					<div class="plugin plugin-card clear">
						<div class="plugin-image">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/includes/admin/getting-started/inc/playne.jpg') ?>" alt="Custom Post Types" />
						</div>
						<div class="plugin-text">
							<h4><?php esc_html_e( 'Custom Post Types', 'landy' ); ?>
							<?php if ( !is_plugin_active( 'customplayneposttypes/customplayneposttypes.php' ) ) { ?>
								<a class="button" href="<?php echo esc_url( admin_url('themes.php?page=tgmpa-install-plugins') ); ?>" title="<?php esc_attr_e( 'Install', 'landy' ); ?>"><?php esc_html_e( 'Install Now', 'landy' ); ?></a>
							<?php } else { ?>
								<span class="button button-secondary disabled"><?php esc_html_e( 'Installed', 'landy' ); ?></span>
							<?php } ?>
							</h4>
							<p><?php esc_html_e( 'You will need to install this to fully use the landy theme. This plugin includes the following post types: menu, gallery, team, testimonials, features, team and Homepage.', 'landy' ); ?></p>
						</div>
					</div>

					<div class="plugin plugin-card clear">
						<div class="plugin-image">
							<img src="//ps.w.org/contact-form-7/assets/icon-256x256.png?rev=1179533" alt="Contact form 7" />
						</div>
						<div class="plugin-text">
							<h4><?php esc_html_e( 'Contact Form 7', 'landy' ); ?>
							<?php if ( ! class_exists( 'wpcf7' ) ) { ?>
								<a class="install-now button" data-slug="contact-form-7" aria-label="Install Contact Form 7 now" data-name="Contact Form 7" href="<?php echo esc_url( $landy_contactForm7Url ); ?>" title="<?php esc_attr_e( 'Install', 'landy' ); ?>"><?php esc_html_e( 'Install Now', 'landy' ); ?></a>
							<?php } else { ?>
								<span class="button button-secondary disabled"><?php esc_html_e( 'Installed', 'landy' ); ?></span>
							<?php } ?>
							</h4>
							<p><?php esc_html_e( 'Create your own sleek & user-friendly contact form. You can customize the form and the mail contents flexibly with simple markup. The form supports Ajax-powered submitting, CAPTCHA, Akismet spam filtering and so on. It has been fully styled to match your theme.', 'landy' ); ?></p>
						</div>
					</div>

					<div class="plugin plugin-card clear">
						<div class="plugin-image">
							<img src="//ps.w.org/shortcodes-ultimate/assets/icon-256x256.png?rev=1359331" alt="Shortcodes Ultimate" />
						</div>
						<div class="plugin-text">
							<h4><?php esc_html_e( 'Shortcodes Ultimate', 'landy' ); ?>
							<?php if ( !is_plugin_active( 'shortcodes-ultimate/shortcodes-ultimate.php' ) ) { ?>
								<a class="install-now button" data-slug="shortcodes-ultimate" aria-label="Install Shortcodes Ultimate now" data-name="Shortcodes ultimate" href="<?php echo esc_url( $landy_shortcodesUltimate ); ?>" title="<?php esc_attr_e( 'Install', 'landy' ); ?>"><?php esc_html_e( 'Install Now', 'landy' ); ?></a>
							<?php } else { ?>
								<span class="button button-secondary disabled"><?php esc_html_e( 'Installed', 'landy' ); ?></span>
							<?php } ?>
							</h4>
							<p><?php esc_html_e( 'Shortcodes ultimate is a WordPress plugin that provides a mega pack of shortcodes for use in your theme.', 'landy' ); ?></p>
						</div>
					</div>

				</div>

				<!-- Support panel -->
				<div id="support-panel" class="panel-left">
					<h3 id="faq-support"><?php esc_html_e( 'Where do I get support?', 'landy' ); ?></h3>
					<p><?php 
						$landy_support_url = 'https://playnethemes.ticksy.com/';
						printf( __( 'If you&apos;ve read through the Help File in the first tab and still have questions or are experiencing certain issues, we&apos;re happy to help! Simply <a href="%s" target="_blank">submit a ticket</a> on our support ticket system.', 'landy' ), esc_url( $landy_support_url ) );
						?>
					</p>
					<p>
						<a class="getting-started-button button-primary" href="<?php echo esc_url($landy_support_url); ?>" target="_blank"><?php esc_html_e('Submit a ticket','landy'); ?></a>
					</p>
				</div>

			</div>
		</div>
	</div>

	<?php
}