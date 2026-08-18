<?php
/**
 * Single post template.
 *
 * WordPress標準投稿の個別ページに使用されます。
 * WorksとGalleryには、より優先度の高い専用テンプレートがあります。
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<?php
		get_template_part(
			'template-parts/content/post',
			'single'
		);
		?>
	<?php endwhile; ?>
</main>

<?php
get_footer();
