<?php
/**
 * Profile strength section.
 *
 * 得意分野を、画像と説明文を組み合わせて表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * ACFが無効な場合でもFatal errorにならないように、
 * get_field()が使える場合だけ画像IDを取得します。
 */
$strength_items = array(
	array(
		'number'      => '01',
		'title'       => '既存サイトの修正・改善',
		'description' => 'Web制作会社で修正外注班を担当した経験から、既存コードを読み取り、影響範囲を考えながら修正することを得意としています。',
		'image_id'    => function_exists( 'get_field' )
			? (int) get_field( 'profile_strength_image_01' )
			: 0,
	),
	array(
		'number'      => '02',
		'title'       => 'レスポンシブ対応',
		'description' => 'PC/SPそれぞれの表示を考えながら、デザインに沿った実装を行います。',
		'image_id'    => function_exists( 'get_field' )
			? (int) get_field( 'profile_strength_image_02' )
			: 0,
	),
	array(
		'number'      => '03',
		'title'       => 'CMSを使ったWeb制作',
		'description' => 'WordPressやShopifyなど、更新・運用を前提としたWebサイト制作に対応します。',
		'image_id'    => function_exists( 'get_field' )
			? (int) get_field( 'profile_strength_image_03' )
			: 0,
	),
	array(
		'number'      => '04',
		'title'       => '学びながら解決する力',
		'description' => '未知の技術でも調査・検証しながら、問題を切り分けて解決していきます。',
		'image_id'    => function_exists( 'get_field' )
			? (int) get_field( 'profile_strength_image_04' )
			: 0,
	),
);
?>

<section
	class="profile-strength"
	aria-labelledby="profile-strength-title"
>
	<div class="l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( Strength )',
				'title'      => "What I'm Good At",
				'heading_id' => 'profile-strength-title',
			)
		);
		?>

		<div class="profile-strength__list">
			<?php foreach ( $strength_items as $item ) : ?>
				<article class="profile-strength__item">
					<?php if ( $item['image_id'] ) : ?>
						<div class="profile-strength__media">
							<?php
							echo wp_get_attachment_image(
								$item['image_id'],
								'large',
								false,
								array(
									'class'   => 'profile-strength__image',
									'loading' => 'lazy',
								)
							);
							?>
						</div>
					<?php endif; ?>

					<div class="profile-strength__body">
						<h3 class="profile-strength__title">
							<span class="profile-strength__number">
								<?php echo esc_html( $item['number'] ); ?>
							</span>

							<span>
								<?php echo esc_html( $item['title'] ); ?>
							</span>
						</h3>

						<p class="profile-strength__description">
							<?php echo esc_html( $item['description'] ); ?>
						</p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
