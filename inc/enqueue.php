<?php
/**
 * Enqueue assets.
 *
 * このファイルでは、テーマで使用するCSSやJavaScriptを読み込みます。
 * WordPressでは<link>タグを直接書くより、wp_enqueue_style() / wp_enqueue_script() を使うのが基本です。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * CSSを読み込みます。
 */
function official_msb_enqueue_assets() {
	wp_enqueue_style(
		'official-msb-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'official_msb_enqueue_assets' );
