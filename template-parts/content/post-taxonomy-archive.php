<?php
/**
 * Post taxonomy archive content.
 *
 * CategoryとTagで共通の記事一覧を表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow      = isset( $args['eyebrow'] ) ? $args['eyebrow'] : '';
$archive_title = isset( $args['title'] ) ? $args['title'] : '';
$description  = isset( $args['description'] ) ? $args['description'] : '';

$blog_page_id = (int) get_option( 'page_for_posts' );
$blog_url     = $blog_page_id
	? get_permalink( $blog_page_id )
	: home_url( '/blog/' );
?>

<section
	class="blog-archive blog-archive--taxonomy"
	aria-labelledby="post-taxonomy-title"
>
	<div class="l-container">
		<header class="blog-archive__header">
			<?php if ( $eyebrow ) : ?>
				<p class="blog-archive__eyebrow">
					<?php echo esc_html( $eyebrow ); ?>
				</p>
			<?php endif; ?>

			<h1
				id="post-taxonomy-title"
				class="blog-archive__title"
			>
				<?php echo esc_html( $archive_title ); ?>
			</h1>

			<?php if ( $description ) : ?>
				<div class="blog-archive__lead">
					<?php echo wp_kses_post( $description ); ?>
				</div>
			<?php endif; ?>
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
				該当する記事はありません。
			</p>
		<?php endif; ?>

		<div class="blog-archive__action">
			<a
				class="c-button"
				href="<?php echo esc_url( $blog_url ); ?>"
			>
				Blog一覧へ戻る
			</a>
		</div>
	</div>
</section>
