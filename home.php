<?php
/**
 * Blog archive template.
 *
 * WordPress標準投稿の一覧ページに使用されます。
 */

get_header();
?>

<main id="primary" class="site-main">
	<section
		class="blog-archive"
		aria-labelledby="blog-archive-title"
	>
		<div class="l-container">
			<header class="blog-archive__header">
				<p class="blog-archive__eyebrow">
					( BLOG )
				</p>

				<h1
					id="blog-archive-title"
					class="blog-archive__title"
				>
					Articles &amp; Notes
				</h1>

				<p class="blog-archive__lead">
					制作や学習を通して得た知識を記録します。
				</p>
			</header>

			<?php if ( have_posts() ) : ?>
				<div class="blog-archive__grid">
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>

						<?php
						get_template_part(
							'template-parts/cards/post',
							'card',
							array(
								'heading_level' => 2,
							)
						);
						?>
					<?php endwhile; ?>
				</div>

				<nav
					class="blog-archive__pagination"
					aria-label="記事一覧のページ送り"
				>
					<?php
					the_posts_pagination(
						array(
							'mid_size'           => 1,
							'prev_text'          => '前へ',
							'next_text'          => '次へ',
							'screen_reader_text' => '記事一覧のページ移動',
						)
					);
					?>
				</nav>
			<?php else : ?>
				<p class="blog-archive__empty">
					現在、公開中の記事はありません。
				</p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
