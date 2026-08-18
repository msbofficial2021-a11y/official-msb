<?php
/**
 * Single Gallery template.
 *
 * Galleryの個別投稿ページで使用されます。
 * 詳細な表示処理はtemplate-partsへ分割します。
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<?php
		get_template_part(
			'template-parts/content/gallery',
			'single'
		);
		?>
	<?php endwhile; ?>
</main>

<?php
get_footer();