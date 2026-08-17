<?php
/**
 * Section heading component.
 *
 * 使用例:
 * get_template_part(
 *     'template-parts/components/section',
 *     'heading',
 *     array(
 *         'eyebrow'   => '( ABOUT )',
 *         'title'     => 'Who I Am',
 *         'heading_id' => 'home-about-title',
 *     )
 * );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow   = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title     = isset( $args['title'] ) ? (string) $args['title'] : '';
$heading_id = isset( $args['heading_id'] )
	? sanitize_title( (string) $args['heading_id'] )
	: '';

if ( '' === $title ) {
	return;
}
?>

<div class="c-section-heading">
	<?php if ( '' !== $eyebrow ) : ?>
		<p class="c-section-heading__eyebrow">
			<?php echo esc_html( $eyebrow ); ?>
		</p>
	<?php endif; ?>

	<h2
		<?php if ( '' !== $heading_id ) : ?>
			id="<?php echo esc_attr( $heading_id ); ?>"
		<?php endif; ?>
		class="c-section-heading__title"
	>
		<?php echo esc_html( $title ); ?>
	</h2>
</div>
