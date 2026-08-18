<?php
/**
 * Page Hero component.
 *
 * 下層ページで共通使用するメインビジュアルです。
 *
 * 使用例:
 * get_template_part(
 *     'template-parts/components/page',
 *     'hero',
 *     array(
 *         'eyebrow'   => '( PROFILE )',
 *         'title'     => 'About Me',
 *         'lead'      => "作って終わりではなく、\n学び・発信し・成長し続ける。",
 *         'image_id'  => get_post_thumbnail_id(),
 *         'modifier'  => 'profile',
 *         'heading_id' => 'profile-page-title',
 *     )
 * );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * 呼び出し元で省略された値には初期値を設定します。
 */
$page_hero_args = wp_parse_args(
	isset( $args ) && is_array( $args ) ? $args : array(),
	array(
		'eyebrow'    => '',
		'title'      => '',
		'lead'       => '',
		'image_id'   => 0,
		'meta'       => array(),
		'modifier'   => '',
		'heading_id' => 'page-hero-title',
	)
);

$eyebrow    = (string) $page_hero_args['eyebrow'];
$title      = (string) $page_hero_args['title'];
$lead       = (string) $page_hero_args['lead'];
$image_id   = (int) $page_hero_args['image_id'];
$meta       = is_array( $page_hero_args['meta'] )
	? array_filter( $page_hero_args['meta'] )
	: array();
$modifier   = sanitize_html_class(
	(string) $page_hero_args['modifier']
);
$heading_id = sanitize_title(
	(string) $page_hero_args['heading_id']
);

if ( '' === $title ) {
	return;
}

/*
 * 画像の有無やページの種類に応じて、
 * 必要なModifierクラスを追加します。
 */
$hero_classes = array( 'c-page-hero' );

if ( $image_id ) {
	$hero_classes[] = 'c-page-hero--has-image';
}

if ( '' !== $modifier ) {
	$hero_classes[] = 'c-page-hero--' . $modifier;
}
?>

<header
	class="<?php echo esc_attr( implode( ' ', $hero_classes ) ); ?>"
	aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
>
	<?php if ( $image_id ) : ?>
		<div
			class="c-page-hero__media"
			aria-hidden="true"
		>
			<?php
			echo wp_get_attachment_image(
				$image_id,
				'full',
				false,
				array(
					'class'         => 'c-page-hero__image',
					'alt'           => '',
					'loading'       => 'eager',
					'fetchpriority' => 'high',
				)
			);
			?>
		</div>
	<?php endif; ?>

	<div class="c-page-hero__inner l-container">
		<?php if ( '' !== $eyebrow ) : ?>
			<p class="c-page-hero__eyebrow">
				<?php echo esc_html( $eyebrow ); ?>
			</p>
		<?php endif; ?>

		<h1
			id="<?php echo esc_attr( $heading_id ); ?>"
			class="c-page-hero__title"
		>
			<?php echo esc_html( $title ); ?>
		</h1>

		<?php if ( '' !== $lead ) : ?>
			<p class="c-page-hero__lead">
				<?php echo nl2br( esc_html( $lead ) ); ?>
			</p>
		<?php endif; ?>

		<?php if ( $meta ) : ?>
			<p class="c-page-hero__meta">
				<?php foreach ( $meta as $meta_item ) : ?>
					<span>
						<?php echo esc_html( $meta_item ); ?>
					</span>
				<?php endforeach; ?>
			</p>
		<?php endif; ?>
	</div>
</header>
