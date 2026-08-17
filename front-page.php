<?php
/**
 * Front page template.
 *
 * WordPress管理画面で設定した「ホームページ」に使用される
 * トップページ専用テンプレートです。
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php get_template_part( 'template-parts/sections/home', 'hero' ); ?>
</main>

<?php
get_footer();
