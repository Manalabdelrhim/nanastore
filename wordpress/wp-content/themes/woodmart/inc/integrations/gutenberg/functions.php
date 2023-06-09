<?php
/**
 * Gutenberg.
 *
 * @package xts
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

if ( ! function_exists( 'woodmart_gutenberg_disable_svg' ) ) {
	/**
	 * Gutenberg disable svg.
	 */
	function woodmart_gutenberg_disable_svg() {
		if ( woodmart_get_opt( 'disable_gutenberg_css' ) ) {
			remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
			remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
		}
	}

	add_action( 'init', 'woodmart_gutenberg_disable_svg' );
}

if ( ! function_exists( 'woodmart_gutenberg_show_widgets' ) ) {
	/**
	 * Gutenberg show widgets.
	 *
	 * @return array
	 */
	function woodmart_gutenberg_show_widgets() {
		return array();
	}

	add_action( 'widget_types_to_hide_from_legacy_widget_block', 'woodmart_gutenberg_show_widgets', 100 );
}

if ( ! function_exists( 'woodmart_gutenberg_enqueue_editor_styles' ) ) {
	/**
	 * Gutenberg styles.
	 *
	 * @since 1.0.0
	 */
	function woodmart_gutenberg_enqueue_editor_styles() {
		if ( woodmart_get_opt( 'disable_gutenberg_backend_css' ) ) {
			return;
		}

		$rtl = is_rtl() ? '-rtl' : '';
		wp_enqueue_style( 'wd-gutenberg-editor-style', WOODMART_THEME_DIR . '/css/parts/wp-gutenberg-editor' . $rtl . '.min.css', array(), woodmart_get_theme_info( 'Version' ) );
	}

	add_action( 'admin_print_styles-post.php', 'woodmart_gutenberg_enqueue_editor_styles', 10 );
}

if ( ! function_exists( 'woodmart_gutenberg_editor_styles' ) ) {
	/**
	 * Gutenberg styles.
	 *
	 * @since 1.0.0
	 */
	function woodmart_gutenberg_editor_styles() {
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style-editor.css' );
		add_theme_support( 'align-wide' );
	}

	add_action( 'after_setup_theme', 'woodmart_gutenberg_editor_styles', 10 );
}

if ( ! function_exists( 'woodmart_gutenberg_editor_custom_styles' ) ) {
	/**
	 * Gutenberg styles.
	 *
	 * @since 1.0.0
	 */
	function woodmart_gutenberg_editor_custom_styles() {
		if ( woodmart_get_opt( 'disable_gutenberg_backend_css' ) ) {
			return;
		}

		$all_pages_bg          = woodmart_get_opt( 'pages-background' );
		$site_custom_width     = woodmart_get_opt( 'site_custom_width' );
		$predefined_site_width = woodmart_get_opt( 'site_width' );

		$site_width = '';

		if ( 'full-width' === $predefined_site_width ) {
			$site_width = 1222;
		} elseif ( 'boxed' === $predefined_site_width ) {
			$site_width = 1160;
		} elseif ( 'boxed-2' === $predefined_site_width ) {
			$site_width = 1160;
		} elseif ( 'wide' === $predefined_site_width ) {
			$site_width = 1600;
		} elseif ( 'custom' === $predefined_site_width ) {
			$site_width = $site_custom_width;
		}

		?>
		<style>
			div.block-editor-writing-flow {
				<?php if ( ! empty( $all_pages_bg['color'] ) ) : ?>
					background-color: <?php echo esc_attr( $all_pages_bg['color'] ); ?>;
				<?php endif; ?>
			}

			<?php if ( 'full-width-content' === $predefined_site_width ) : ?>
				div.block-editor .editor-styles-wrapper .wp-block:not([data-align="full"]), div.block-editor .editor-styles-wrapper .wp-block[data-align="wide"] {
					 max-width: 100%;
				}
			<?php endif; ?>

			<?php if ( $site_width ) : ?>
				div.block-editor .editor-styles-wrapper .wp-block:not([data-align="full"]) {
					max-width: <?php echo esc_attr( $site_width ); ?>px;
				}

				div.block-editor .editor-styles-wrapper .wp-block[data-align="wide"] {
					max-width: <?php echo esc_attr( $site_width + 150 ); ?>px;
				}
			<?php endif; ?>
		</style>
		<?php
	}

	add_action( 'admin_print_styles-post.php', 'woodmart_gutenberg_editor_custom_styles' );
}
