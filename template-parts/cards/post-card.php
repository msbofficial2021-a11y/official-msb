<?php
/**
 * Post card component.
 *
 * Blog一覧やHomeで、WordPress標準投稿を1件表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_categories = get_the_category();
$post_category   = ! empty( $post_categories )
	? $post_categories[0]
	: null;

$post_excerpt = get_the_excerpt();

/*
 * Blog一覧ではh2、Homeのセクション内ではh3として
 * 呼び出せるように、見出しレベルを切り替えます。
 */
$heading_level = isset( $args['heading_level'] )
	? (int) $args['heading_level']
	: 2;

if ( ! in_array( $heading_level, array( 2, 3 ), true ) ) {
	$heading_level = 2;
}
?>

<article <?php post_class( 'c-post-card' ); ?>>
	<a
		class="c-post-card__link"
		href="<?php the_permalink(); ?>"
		aria-label="<?php echo esc_attr( get_the_title() . 'の記事を読む' ); ?>"
	>
		<div class="c-post-card__media">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php
				the_post_thumbnail(
					'large',
					array(
						'class'   => 'c-post-card__image',
						'loading' => 'lazy',
					)
				);
				?>
			<?php endif; ?>
		</div>

		<div class="c-post-card__body">
			<div class="c-post-card__meta">
				<time
					class="c-post-card__date"
					datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"
				>
					<?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?>
				</time>

				<?php if ( $post_category ) : ?>
					<span class="c-post-card__category">
						<?php echo esc_html( $post_category->name ); ?>
					</span>
				<?php endif; ?>
			</div>

			<?php if ( 3 === $heading_level ) : ?>
				<h3 class="c-post-card__title">
					<?php the_title(); ?>
				</h3>
			<?php else : ?>
				<h2 class="c-post-card__title">
					<?php the_title(); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $post_excerpt ) : ?>
				<p class="c-post-card__excerpt">
					<?php echo esc_html( $post_excerpt ); ?>
				</p>
			<?php endif; ?>
		</div>
	</a>
</article>
