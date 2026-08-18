<?php
/**
 * Gallery archive template.
 *
 * /gallery/で表示されるUIコンポーネント一覧ページです。
 */

get_header();
?>

<main id="primary" class="site-main">
	<section
		class="gallery-archive"
		aria-labelledby="gallery-archive-title"
	>
		<div class="l-container">
			<header class="gallery-archive__header">
				<p class="gallery-archive__eyebrow">
					( GALLERY )
				</p>

				<h1
					id="gallery-archive-title"
					class="gallery-archive__title"
				>
					Components Gallery
				</h1>

				<p class="gallery-archive__lead">
					制作したUI・アニメーション・インタラクションをご紹介します。
				</p>
			</header>

			<?php if ( have_posts() ) : ?>
				<div class="gallery-archive__grid">
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>

						<?php
						get_template_part(
							'template-parts/cards/gallery',
							'card'
						);
						?>
					<?php endwhile; ?>
				</div>

				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 1,
						'prev_text' => '前へ',
						'next_text' => '次へ',
					)
				);
				?>
			<?php else : ?>
				<p class="gallery-archive__empty">
					現在、公開中のコンポーネントはありません。
				</p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();