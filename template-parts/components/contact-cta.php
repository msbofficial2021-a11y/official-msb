<?php
/**
 * Contact CTA component.
 *
 * 全ページ共通で使用する「Let's Talk」セクションです。
 * 文言やリンク先は呼び出し元から上書きできます。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact_page = get_page_by_path( 'contact' );
$contact_url  = $contact_page instanceof WP_Post
	? get_permalink( $contact_page )
	: home_url( '/contact/' );

$default_image_path = '/assets/images/common/contact-cta.jpg';
$default_image_url  = file_exists( get_theme_file_path( $default_image_path ) )
	? get_theme_file_uri( $default_image_path )
	: '';

$cta_args = wp_parse_args(
	isset( $args ) && is_array( $args ) ? $args : array(),
	array(
		'eyebrow'      => '( CONTACT )',
		'title'        => "Let's Talk",
		'text'         => '制作のご相談、採用について、その他お気軽にお問い合わせください。',
		'button_label' => 'Contact',
		'button_url'   => $contact_url,
		'image_url'    => $default_image_url,
	)
);
?>

<section class="c-contact-cta" aria-labelledby="contact-cta-title">
	<?php if ( $cta_args['image_url'] ) : ?>
		<div class="c-contact-cta__media" aria-hidden="true">
			<img
				class="c-contact-cta__image"
				src="<?php echo esc_url( $cta_args['image_url'] ); ?>"
				alt=""
				loading="lazy"
			>
		</div>
	<?php endif; ?>

	<div class="c-contact-cta__inner l-container">
		<p class="c-contact-cta__eyebrow">
			<?php echo esc_html( $cta_args['eyebrow'] ); ?>
		</p>

		<h2 id="contact-cta-title" class="c-contact-cta__title">
			<?php echo esc_html( $cta_args['title'] ); ?>
		</h2>

		<p class="c-contact-cta__text">
			<?php echo esc_html( $cta_args['text'] ); ?>
		</p>

		<a class="c-contact-cta__button" href="<?php echo esc_url( $cta_args['button_url'] ); ?>">
			<?php echo esc_html( $cta_args['button_label'] ); ?>
		</a>
	</div>
</section>
