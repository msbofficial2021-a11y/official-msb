<?php
/**
 * Works archive template.
 *
 * /works/で表示される制作実績一覧ページです。
 */

get_header();
?>

<main id="primary" class="site-main">
	<section
		class="works-archive"
		aria-labelledby="works-archive-title"
	>
		<div class="l-container">
			<header class="works-archive__header">
				<p class="works-archive__eyebrow">
					( WORKS )
				</p>

				<h1
					id="works-archive-title"
					class="works-archive__title"
				>
					Selected Works
				</h1>

				<p class="works-archive__lead">
					これまで携わった制作実績をご紹介します。
				</p>
			</header>

			<?php if ( have_posts() ) : ?>
				<div class="works-archive__grid">
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>

						<?php
						get_template_part(
							'template-parts/cards/work',
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
				<p class="works-archive__empty">
					現在、公開中の制作実績はありません。
				</p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
