<?php
/**
 * Custom taxonomy registration.
 *
 * カスタム投稿タイプで使用する分類をWordPressへ登録します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Resources用カテゴリーを登録します。
 */
function official_msb_register_taxonomies() {
	$labels = array(
		'name'              => 'Resource Categories',
		'singular_name'     => 'Resource Category',
		'search_items'      => 'カテゴリーを検索',
		'all_items'         => 'カテゴリー一覧',
		'parent_item'       => '親カテゴリー',
		'parent_item_colon' => '親カテゴリー：',
		'edit_item'         => 'カテゴリーを編集',
		'update_item'       => 'カテゴリーを更新',
		'add_new_item'      => 'カテゴリーを追加',
		'new_item_name'     => '新しいカテゴリー名',
		'menu_name'         => 'Categories',
	);

	register_taxonomy(
		'resource_category',
		array( 'resource' ),
		array(
			'labels'            => $labels,
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'resource-category',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'official_msb_register_taxonomies' );
