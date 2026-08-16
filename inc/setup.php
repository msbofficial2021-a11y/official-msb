<?php
/**
 * Theme setup.
 *
 * このファイルでは、テーマが利用するWordPress標準機能を登録します。
 * 例: title-tag、アイキャッチ画像、HTML5出力、ナビゲーションメニューなど。
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
