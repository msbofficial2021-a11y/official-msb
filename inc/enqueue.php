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
 * 外部フォント配信先への接続を事前に開始します。
 *
 * Google FontsのCSSとフォントファイルを取得する前に接続を準備し、
 * フォント表示までの待ち時間を短縮します。
 *
 * @param array  $urls          リソースヒントとして出力するURL。
 * @param string $relation_type リソースヒントの種類。
 * @return array
 */
function official_msb_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' !== $relation_type ) {
		return $urls;
	}

	$urls[] = 'https://fonts.googleapis.com';
	$urls[] = array(
		'href'        => 'https://fonts.gstatic.com',
		'crossorigin' => 'anonymous',
	);

	return $urls;
}
add_filter( 'wp_resource_hints', 'official_msb_resource_hints', 10, 2 );

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

	/*
	 * Figmaで使用しているWebフォントをGoogle Fontsから読み込みます。
	 * 使用するウェイトだけに限定し、不要な通信量を抑えます。
	 */
	$google_fonts_url = 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Inter:wght@400;500;600&family=Shippori+Mincho:wght@400;500;600&display=swap';

	wp_enqueue_style(
		'official-msb-google-fonts',
		$google_fonts_url,
		array(),
		null
	);

	wp_enqueue_style(
		'official-msb-style',
		get_theme_file_uri( '/assets/css/style.css' ),
		array( 'official-msb-google-fonts' ),
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
