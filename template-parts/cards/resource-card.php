<?php
/**
 * Resource card component.
 *
 * Resources一覧などで、1件分の外部リソースを表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * ACFが無効な場合でもFatal errorにならないように、
 * get_field()が使用できる場合だけ値を取得します。
 */
$resource_type = function_exists( 'get_field' )
	? get_field( 'resource_type' )
	: '';

$resource_description = function_exists( 'get_field' )
	? get_field( 'resource_description' )
	: '';

$resource_url = function_exists( 'get_field' )
	? get_field( 'resource_url' )
	: '';

$resource_link_label = function_exists( 'get_field' )
	? get_field( 'resource_link_label' )
	: '';

/*
 * Link Labelが未入力の場合に使用する既定値です。
 */
if ( ! $resource_link_label ) {
	$resource_link_label = '詳しく見る';
}

/*
 * ACFには英語の固定値を保存し、
 * 表示時だけ日本語のラベルへ変換します。
 */
$resource_type_labels = array(
	'tool'     => 'ツール',
	'service'  => 'サービス',
	'plugin'   => 'プラグイン',
	'site'     => 'Webサイト',
	'learning' => '学習',
	'other'    => 'その他',
);

$resource_type_label = isset( $resource_type_labels[ $resource_type ] )
	? $resource_type_labels[ $resource_type ]
	: $resource_type;

$resource_categories = get_the_terms(
	get_the_ID(),
	'resource_category'
);

if ( is_wp_error( $resource_categories ) ) {
	$resource_categories = array();
}

/*
 * Resources一覧ではh2、Homeなどのセクション内ではh3として
 * 呼び出せるように、見出しレベルを切り替えます。
 */
$heading_level = isset( $args['heading_level'] )
	? (int) $args['heading_level']
	: 2;

if ( ! in_array( $heading_level, array( 2, 3 ), true ) ) {
	$heading_level = 2;
}
?>

<article <?php post_class( 'c-resource-card' ); ?>>
	<?php if ( $resource_url ) : ?>
		<a
			class="c-resource-card__link"
			href="<?php echo esc_url( $resource_url ); ?>"
			target="_blank"
			rel="noopener noreferrer"
			aria-label="<?php echo esc_attr( get_the_title() . 'を新しいタブで開く' ); ?>"
		>
	<?php endif; ?>

		<div class="c-resource-card__media">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php
				the_post_thumbnail(
					'medium_large',
					array(
						'class'   => 'c-resource-card__image',
						'loading' => 'lazy',
					)
				);
				?>
			<?php endif; ?>
		</div>

		<div class="c-resource-card__body">
			<?php if ( $resource_type_label ) : ?>
				<p class="c-resource-card__type">
					<?php echo esc_html( $resource_type_label ); ?>
				</p>
			<?php endif; ?>

			<?php if ( 3 === $heading_level ) : ?>
				<h3 class="c-resource-card__title">
					<?php the_title(); ?>
				</h3>
			<?php else : ?>
				<h2 class="c-resource-card__title">
					<?php the_title(); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $resource_description ) : ?>
				<p class="c-resource-card__description">
					<?php echo esc_html( $resource_description ); ?>
				</p>
			<?php endif; ?>

			<?php if ( $resource_categories ) : ?>
				<ul
					class="c-resource-card__categories"
					aria-label="Resource categories"
				>
					<?php foreach ( $resource_categories as $resource_category ) : ?>
						<li class="c-resource-card__category">
							<?php echo esc_html( $resource_category->name ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ( $resource_url ) : ?>
				<span class="c-resource-card__action">
					<?php echo esc_html( $resource_link_label ); ?>
				</span>
			<?php endif; ?>
		</div>

	<?php if ( $resource_url ) : ?>
		</a>
	<?php endif; ?>
</article>
