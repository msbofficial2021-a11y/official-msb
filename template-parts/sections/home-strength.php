<?php
/**
 * Home strength section.
 *
 * ACF無料版のGroupフィールド4件を順番に取得して表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$page_id   = get_queried_object_id();
$strengths = array();

if ( function_exists( 'get_field' ) ) {
	for ( $index = 1; $index <= 4; $index++ ) {
		$field_name = sprintf( 'home_strength_%02d', $index );
		$field      = get_field( $field_name, $page_id );

		if ( ! is_array( $field ) ) {
			continue;
		}

		$image_id   = isset( $field['image'] ) ? absint( $field['image'] ) : 0;
		$title      = isset( $field['title'] ) ? (string) $field['title'] : '';
		$description = isset( $field['description'] )
			? (string) $field['description']
			: '';

		if ( 0 === $image_id && '' === $title && '' === $description ) {
			continue;
		}

		$strengths[] = array(
			'image_id'   => $image_id,
			'title'      => $title,
			'description' => $description,
		);
	}
}
?>

<section class="home-strength" aria-labelledby="home-strength-title">
	<div class="home-strength__inner l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => __( '( STRENGTH )', 'official-msb' ),
				'title'      => __( 'What I Can Do', 'official-msb' ),
				'heading_id' => 'home-strength-title',
			)
		);
		?>

		<?php if ( ! empty( $strengths ) ) : ?>
			<div class="home-strength__list">
				<?php foreach ( $strengths as $strength ) : ?>
					<article class="home-strength__item">
						<?php if ( 0 < $strength['image_id'] ) : ?>
							<div class="home-strength__media">
								<?php
								echo wp_get_attachment_image(
									$strength['image_id'],
									'large',
									false,
									array(
										'class'   => 'home-strength__image',
										'loading' => 'lazy',
									)
								);
								?>
							</div>
						<?php endif; ?>

						<div class="home-strength__body">
							<?php if ( '' !== $strength['title'] ) : ?>
								<h3 class="home-strength__item-title">
									<?php echo esc_html( $strength['title'] ); ?>
								</h3>
							<?php endif; ?>

							<?php if ( '' !== $strength['description'] ) : ?>
								<p class="home-strength__description">
									<?php echo nl2br( esc_html( $strength['description'] ) ); ?>
								</p>
							<?php endif; ?>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
