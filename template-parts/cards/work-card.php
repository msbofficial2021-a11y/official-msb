<?php
/**
 * Work card component.
 *
 * Works一覧などで、1件分の制作実績を表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * ACFが無効になってもFatal errorにならないように、
 * get_field()が使用できる場合だけカスタムフィールドを取得します。
 */
$work_year        = function_exists( 'get_field' ) ? get_field( 'work_year' ) : '';
$work_type        = function_exists( 'get_field' ) ? get_field( 'work_type' ) : '';
$work_summary     = function_exists( 'get_field' ) ? get_field( 'work_summary' ) : '';
$main_visual_id   = function_exists( 'get_field' ) ? get_field( 'work_main_visual' ) : 0;

/*
 * 呼び出し元から見出しレベルを変更できます。
 * 指定がない場合はWorks一覧用のh2を使用します。
 */
$heading_level = isset( $args['heading_level'] )
	? (int) $args['heading_level']
	: 2;

if ( ! in_array( $heading_level, array( 2, 3 ), true ) ) {
	$heading_level = 2;
}

?>

<article <?php post_class( 'c-work-card' ); ?>>
	<a
		class="c-work-card__link"
		href="<?php the_permalink(); ?>"
		aria-label="<?php echo esc_attr( get_the_title() ); ?>の詳細を見る"
	>
		<div class="c-work-card__media">
			<?php if ( $main_visual_id ) : ?>
				<?php
				echo wp_get_attachment_image(
					(int) $main_visual_id,
					'large',
					false,
					array(
						'class'   => 'c-work-card__image',
						'loading' => 'lazy',
					)
				);
				?>
			<?php endif; ?>
		</div>

		<div class="c-work-card__body">
			<?php if ( $work_year || $work_type ) : ?>
				<p class="c-work-card__meta">
					<?php if ( $work_year ) : ?>
						<span><?php echo esc_html( $work_year ); ?></span>
					<?php endif; ?>

					<?php if ( $work_type ) : ?>
						<span><?php echo esc_html( $work_type ); ?></span>
					<?php endif; ?>
				</p>
			<?php endif; ?>

            <?php if ( 3 === $heading_level ) : ?>
                <h3 class="c-work-card__title">
                    <?php the_title(); ?>
                </h3>
            <?php else : ?>
                <h2 class="c-work-card__title">
                    <?php the_title(); ?>
                </h2>
            <?php endif; ?>

			<?php if ( $work_summary ) : ?>
				<p class="c-work-card__summary">
					<?php echo esc_html( $work_summary ); ?>
				</p>
			<?php endif; ?>
		</div>
	</a>
</article>
