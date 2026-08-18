<?php
/**
 * OFFICIAL.MSB theme functions.
 *
 * functions.php はテーマ全体の入口です。
 * 個別の処理は inc/ 配下へ分割し、ここでは読み込みだけを行います。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_theme_file_path( '/inc/setup.php' );
require_once get_theme_file_path( '/inc/enqueue.php' );
require_once get_theme_file_path( '/inc/post-types.php' );
