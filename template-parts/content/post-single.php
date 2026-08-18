<?php
/**
 * Single post content.
 *
 * Blog記事のHero、本文、分類、前後記事への導線を表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$category_list = get_the_category_list( ', ' );
$tag_list      = get_the_tag_list( '', ', ' );
$previous_post = get_previous_post();
$next_post     = get_next_post();
?>

<article <?php post_class( 'post-single' ); ?>>
	<header class="post-single__header">
		<?php if ( has_post_thumbnail() ) : ?>
			<div
				class="post-single__header-media"
				aria-hidden="true"
			>
				<?php
				the_post_thumbnail(
					'full',
					array(
						'class'   => 'post-single__header-image',
						'alt'     => '',
						'loading' => 'eager',
					)
				);
				?>
			</div>
		<?php endif; ?>

		<div class="post-single__header-inner l-container">
			<p class="post-single__eyebrow">
				( BLOG )
			</p>

			<h1 class="post-single__title">
				<?php the_title(); ?>
			</h1>

			<div class="post-single__meta">
				<time
					datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"
				>
					<?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?>
				</time>

				<?php if ( $category_list ) : ?>
					<span class="post-single__categories">
						<?php echo wp_kses_post( $category_list ); ?>
					</span>
				<?php endif; ?>
			</div>
		</div>
	</header>

	<div class="post-single__content">
		<div class="l-container">
			<div class="post-single__body">
				<div class="post-single__entry">
					<?php the_content(); ?>

					<?php
					wp_link_pages(
						array(
							'before' => '<nav class="post-single__page-links" aria-label="記事内のページ送り">',
							'after'  => '</nav>',
						)
					);
					?>
				</div>

				<?php if ( $category_list || $tag_list ) : ?>
					<footer class="post-single__taxonomy">
						<?php if ( $category_list ) : ?>
							<div class="post-single__taxonomy-row">
								<span class="post-single__taxonomy-label">
									Category
								</span>

								<div class="post-single__taxonomy-links">
									<?php echo wp_kses_post( $category_list ); ?>
								</div>
							</div>
						<?php endif; ?>

						<?php if ( $tag_list ) : ?>
							<div class="post-single__taxonomy-row">
								<span class="post-single__taxonomy-label">
									Tags
								</span>

								<div class="post-single__taxonomy-links">
									<?php echo wp_kses_post( $tag_list ); ?>
								</div>
							</div>
						<?php endif; ?>
					</footer>
				<?php endif; ?>

				<?php if ( $previous_post || $next_post ) : ?>
					<div class="post-single__navigation">
						<?php
						the_post_navigation(
							array(
								'prev_text'          => '<span class="post-single__navigation-label">Previous</span><span class="post-single__navigation-title">%title</span>',
								'next_text'          => '<span class="post-single__navigation-label">Next</span><span class="post-single__navigation-title">%title</span>',
								'screen_reader_text' => '前後の記事',
							)
						);
						?>
					</div>
				<?php endif; ?>

				<div class="post-single__action">
					<a
						class="c-button"
						href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"
					>
						Blog一覧へ戻る
					</a>
				</div>
			</div>
		</div>
	</div>
</article>
