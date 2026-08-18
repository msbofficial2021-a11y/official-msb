<?php
/**
 * Custom post type registration.
 *
 * Works、Gallery、ResourcesをWordPressへ登録します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * テーマで使用するカスタム投稿タイプを登録します。
 */
function official_msb_register_post_types() {
	$post_types = array(
		'works' => array(
			'singular' => 'Work',
			'plural'   => 'Works',
			'slug'     => 'works',
			'icon'     => 'dashicons-portfolio',
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
		),
		'gallery' => array(
			'singular' => 'Gallery Item',
			'plural'   => 'Gallery',
			'slug'     => 'gallery',
			'icon'     => 'dashicons-format-gallery',
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
		),
		'resource' => array(
			'singular' => 'Resource',
			'plural'   => 'Resources',
			'slug'     => 'resources',
			'icon'     => 'dashicons-book',
			'supports' => array( 'title', 'thumbnail', 'excerpt', 'revisions' ),
		),
	);

	foreach ( $post_types as $post_type => $config ) {
		register_post_type(
			$post_type,
			array(
				'labels' => array(
					'name'               => $config['plural'],
					'singular_name'      => $config['singular'],
					'menu_name'          => $config['plural'],
					'all_items'          => sprintf( '%s一覧', $config['plural'] ),
					'add_new'            => '新規追加',
					'add_new_item'       => sprintf( '%sを追加', $config['singular'] ),
					'edit_item'          => sprintf( '%sを編集', $config['singular'] ),
					'new_item'           => sprintf( '新しい%s', $config['singular'] ),
					'view_item'          => sprintf( '%sを表示', $config['singular'] ),
					'search_items'       => sprintf( '%sを検索', $config['plural'] ),
					'not_found'          => '項目が見つかりませんでした。',
					'not_found_in_trash' => 'ゴミ箱に項目はありません。',
				),
				'public'       => true,
				'has_archive'  => true,
				'show_in_rest' => true,
				'menu_icon'    => $config['icon'],
				'rewrite'      => array(
					'slug'       => $config['slug'],
					'with_front' => false,
				),
				'supports'     => $config['supports'],
			)
		);
	}
}
add_action( 'init', 'official_msb_register_post_types' );
