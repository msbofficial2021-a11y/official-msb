<?php
/**
 * Profile What I Use section.
 *
 * Profileページで、使用技術を3つのカードに分けて表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * ACFが無効な場合でもFatal errorにならないように、
 * get_field()が使用できる場合だけ画像IDを取得します。
 */
$frontend_image_id = function_exists( 'get_field' )
	? (int) get_field( 'profile_use_frontend_image' )
	: 0;

$cms_image_id = function_exists( 'get_field' )
	? (int) get_field( 'profile_use_cms_image' )
	: 0;

$development_image_id = function_exists( 'get_field' )
	? (int) get_field( 'profile_use_development_image' )
	: 0;

/*
 * 各カードの内容を配列へまとめます。
 *
 * 同じHTMLを3回記述せず、項目の追加や文言変更を
 * 一か所で管理できるようにしています。
 */
$profile_tools = array(
	array(
		'title'    => 'Frontend',
		'skills'   => 'HTML / CSS / JavaScript',
		'image_id' => $frontend_image_id,
	),
	array(
		'title'    => 'CMS / EC',
		'skills'   => 'WordPress / Shopify / ACF',
		'image_id' => $cms_image_id,
	),
	array(
		'title'    => 'Development',
		'skills'   => 'Git / GitHub / SCSS',
		'image_id' => $development_image_id,
	),
);
?>

<section
	class="profile-use"
	aria-labelledby="profile-use-title"
>
	<div class="l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( SKILLS )',
				'title'      => 'What I Use',
				'heading_id' => 'profile-use-title',
			)
		);
		?>

		<div class="profile-use__grid">
			<?php foreach ( $profile_tools as $tool ) : ?>
				<article class="profile-use__card">
					<?php if ( $tool['image_id'] ) : ?>
						<div class="profile-use__media">
							<?php
							echo wp_get_attachment_image(
								$tool['image_id'],
								'medium_large',
								false,
								array(
									'class'   => 'profile-use__image',
									'loading' => 'lazy',
								)
							);
							?>
						</div>
					<?php endif; ?>

					<div class="profile-use__body">
						<h3 class="profile-use__title">
							<?php echo esc_html( $tool['title'] ); ?>
						</h3>

						<p class="profile-use__skills">
							<?php echo esc_html( $tool['skills'] ); ?>
						</p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
