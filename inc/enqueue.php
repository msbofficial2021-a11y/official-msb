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
	$theme_version   = wp_get_theme()->get( 'Version' );
	$style_path      = get_theme_file_path( '/assets/css/style.css' );
	$navigation_path = get_theme_file_path( '/assets/js/navigation.js' );

	/*
	 * ファイルの更新時刻をバージョンとして使用します。
	 * CSSやJavaScriptを更新したとき、ブラウザキャッシュが残るのを防ぎます。
	 */
	$style_version = file_exists( $style_path )
		? (string) filemtime( $style_path )
		: $theme_version;

	$navigation_version = file_exists( $navigation_path )
		? (string) filemtime( $navigation_path )
		: $theme_version;

	wp_enqueue_style(
		'official-msb-style',
		get_theme_file_uri( '/assets/css/style.css' ),
		array(),
		$style_version
	);

	if ( file_exists( $navigation_path ) ) {
		wp_enqueue_script(
			'official-msb-navigation',
			get_theme_file_uri( '/assets/js/navigation.js' ),
			array(),
			$navigation_version,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'official_msb_enqueue_assets' );
