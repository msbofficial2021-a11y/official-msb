<?php
/**
 * Gallery card component.
 *
 * Gallery一覧などで、1件分のUIコンポーネントを表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gallery_type         = function_exists( 'get_field' ) ? get_field( 'gallery_type' ) : '';
$gallery_technologies = function_exists( 'get_field' ) ? get_field( 'gallery_technologies' ) : '';
$gallery_thumbnail_id = function_exists( 'get_field' ) ? get_field( 'gallery_thumbnail' ) : 0;
$gallery_summary      = function_exists( 'get_field' ) ? get_field( 'gallery_summary' ) : '';

/*
 * Gallery一覧ではh2、Homeなどのセクション内ではh3として
 * 呼び出せるように、見出しレベルを切り替えます。
 */
$heading_level = isset( $args['heading_level'] )
	? (int) $args['heading_level']
	: 2;

if ( ! in_array( $heading_level, array( 2, 3 ), true ) ) {
	$heading_level = 2;
}
?>

<article <?php post_class( 'c-gallery-card' ); ?>>
	<a
		class="c-gallery-card__link"
		href="<?php the_permalink(); ?>"
		aria-label="<?php echo esc_attr( get_the_title() ); ?>の詳細を見る"
	>
		<div class="c-gallery-card__media">
			<?php if ( $gallery_thumbnail_id ) : ?>
				<?php
				echo wp_get_attachment_image(
					(int) $gallery_thumbnail_id,
					'large',
					false,
					array(
						'class'   => 'c-gallery-card__image',
						'loading' => 'lazy',
					)
				);
				?>
			<?php endif; ?>
		</div>

		<div class="c-gallery-card__body">
			<?php if ( $gallery_type || $gallery_technologies ) : ?>
				<p class="c-gallery-card__meta">
					<?php if ( $gallery_type ) : ?>
						<span><?php echo esc_html( $gallery_type ); ?></span>
					<?php endif; ?>

					<?php if ( $gallery_technologies ) : ?>
						<span><?php echo esc_html( $gallery_technologies ); ?></span>
					<?php endif; ?>
				</p>
			<?php endif; ?>

			<?php if ( 3 === $heading_level ) : ?>
				<h3 class="c-gallery-card__title">
					<?php the_title(); ?>
				</h3>
			<?php else : ?>
				<h2 class="c-gallery-card__title">
					<?php the_title(); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $gallery_summary ) : ?>
				<p class="c-gallery-card__summary">
					<?php echo esc_html( $gallery_summary ); ?>
				</p>
			<?php endif; ?>
		</div>
	</a>
</article>
