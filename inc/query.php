<?php
/**
 * Main query adjustments.
 *
 * WordPressのメインクエリへ、一覧ページ固有の条件を追加します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Resources一覧の表示件数とカテゴリー絞り込みを設定します。
 *
 * @param WP_Query $query WordPressが実行するクエリ。
 */
function official_msb_filter_resource_archive( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( ! $query->is_post_type_archive( 'resource' ) ) {
		return;
	}

	/*
	 * 1ページあたりの表示件数を3列×3行の9件にします。
	 */
	$query->set( 'posts_per_page', 9 );

	if ( empty( $_GET['resource_filter'] ) ) {
		return;
	}

	/*
	 * URLから受け取った値を、Taxonomyのスラッグとして
	 * 使用できる安全な形式へ変換します。
	 */
	$resource_filter = sanitize_title(
		wp_unslash( $_GET['resource_filter'] )
	);

	if ( ! $resource_filter ) {
		return;
	}

	$resource_term = get_term_by(
		'slug',
		$resource_filter,
		'resource_category'
	);

	/*
	 * 存在しないカテゴリー値の場合は絞り込みを行いません。
	 */
	if ( ! $resource_term ) {
		return;
	}

	$query->set(
		'tax_query',
		array(
			array(
				'taxonomy' => 'resource_category',
				'field'    => 'slug',
				'terms'    => array( $resource_filter ),
			),
		)
	);
}
add_action( 'pre_get_posts', 'official_msb_filter_resource_archive' );
