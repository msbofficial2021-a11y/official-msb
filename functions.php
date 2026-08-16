<?php
/**
 * OFFICIAL.MSB theme functions.
 *
 * functions.php には全処理を直接書きすぎず、
 * 今後は inc/ 配下へ責務ごとに分割して読み込む方針にします。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * テーマの基本機能を登録します。
 */
function official_msb_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'global' => __( 'Global Navigation', 'official-msb' ),
		)
	);
}
add_action( 'after_setup_theme', 'official_msb_setup' );

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
