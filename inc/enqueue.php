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
 * 読み込み順は重要です。
 * 先にリセット・基本設計を読み込み、その後にレイアウト・コンポーネント・ページ固有CSSを読み込みます。
 */
function official_msb_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'official-msb-style',
		get_stylesheet_uri(),
		array(),
		$theme_version
	);

	wp_enqueue_style(
		'official-msb-reset',
		get_theme_file_uri( '/assets/css/base/reset.css' ),
		array( 'official-msb-style' ),
		$theme_version
	);

	wp_enqueue_style(
		'official-msb-foundation',
		get_theme_file_uri( '/assets/css/base/foundation.css' ),
		array( 'official-msb-reset' ),
		$theme_version
	);

	wp_enqueue_style(
		'official-msb-container',
		get_theme_file_uri( '/assets/css/layout/container.css' ),
		array( 'official-msb-foundation' ),
		$theme_version
	);

	wp_enqueue_style(
		'official-msb-header',
		get_theme_file_uri( '/assets/css/layout/header.css' ),
		array( 'official-msb-container' ),
		$theme_version
	);

	wp_enqueue_style(
		'official-msb-footer',
		get_theme_file_uri( '/assets/css/layout/footer.css' ),
		array( 'official-msb-header' ),
		$theme_version
	);

	wp_enqueue_style(
		'official-msb-button',
		get_theme_file_uri( '/assets/css/components/button.css' ),
		array( 'official-msb-footer' ),
		$theme_version
	);

	wp_enqueue_style(
		'official-msb-home',
		get_theme_file_uri( '/assets/css/pages/home.css' ),
		array( 'official-msb-button' ),
		$theme_version
	);
}
add_action( 'wp_enqueue_scripts', 'official_msb_enqueue_assets' );