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
    <?php get_template_part( 'template-parts/sections/home', 'about' ); ?>
    <?php get_template_part( 'template-parts/sections/home', 'strength' ); ?>
    <?php get_template_part( 'template-parts/sections/home', 'works' ); ?>
    <?php get_template_part( 'template-parts/sections/home', 'gallery' ); ?>
    <?php get_template_part( 'template-parts/sections/home', 'blog' ); ?>
</main>

<?php
get_footer();
