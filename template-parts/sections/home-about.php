<?php
/**
 * Home about section.
 *
 * Home固定ページに入力したACFの値を取得して表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$page_id           = get_queried_object_id();
$about_lead        = '';
$about_description = '';
$about_image_id    = 0;

// ACFが無効な場合でもFatal errorにならないよう、関数の存在を確認します。
if ( function_exists( 'get_field' ) ) {
	$about_lead        = (string) get_field( 'home_about_lead', $page_id );
	$about_description = (string) get_field( 'home_about_description', $page_id );
	$about_image_id    = absint( get_field( 'home_about_image', $page_id ) );
}
?>

<section class="home-about" aria-labelledby="home-about-title">
	<div class="home-about__inner l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => __( '( ABOUT )', 'official-msb' ),
				'title'      => __( 'Who I Am', 'official-msb' ),
				'heading_id' => 'home-about-title',
			)
		);
		?>

		<div class="home-about__content">
			<div class="home-about__copy">
				<?php if ( '' !== $about_lead ) : ?>
					<p class="home-about__lead">
						<?php echo nl2br( esc_html( $about_lead ) ); ?>
					</p>
				<?php endif; ?>

				<?php if ( '' !== $about_description ) : ?>
					<p class="home-about__description">
						<?php echo nl2br( esc_html( $about_description ) ); ?>
					</p>
				<?php endif; ?>
			</div>

			<div class="home-about__profile">
				<?php if ( 0 < $about_image_id ) : ?>
					<?php
					echo wp_get_attachment_image(
						$about_image_id,
						'medium_large',
						false,
						array(
							'class'   => 'home-about__image',
							'loading' => 'lazy',
						)
					);
					?>
				<?php endif; ?>

				<p class="home-about__meta">
					<?php esc_html_e( 'Profile / Career / Skills', 'official-msb' ); ?>
				</p>

				<a class="c-button" href="<?php echo esc_url( home_url( '/profile/' ) ); ?>">
					<?php esc_html_e( 'PROFILE', 'official-msb' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
