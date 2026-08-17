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
 *
 * SCSSはブラウザが直接読み込めないため、Sassで生成した assets/css/style.css を読み込みます。
 */
function official_msb_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'official-msb-style',
		get_theme_file_uri( '/assets/css/style.css' ),
		array(),
		$theme_version
	);
}
add_action( 'wp_enqueue_scripts', 'official_msb_enqueue_assets' );