<?php
/**
 * Profile Web Career section.
 *
 * Web制作に関する実務経験を、画像とテキストを交互に配置して表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * ACFが無効な場合にもFatal errorが発生しないよう、
 * get_field()が使える場合だけ画像IDを取得します。
 */
$web_career_image_01 = function_exists( 'get_field' )
	? (int) get_field( 'profile_web_career_image_01' )
	: 0;

$web_career_image_02 = function_exists( 'get_field' )
	? (int) get_field( 'profile_web_career_image_02' )
	: 0;

/*
 * ACF無料版のRepeaterには依存せず、文章はPHP配列で管理します。
 * 画像だけを管理画面から差し替えられる構成です。
 */
$web_career_items = array(
	array(
		'number'      => '01',
		'title'       => 'Web制作会社',
		'subtitle'    => '約2年半',
		'description' => '',
		'points'      => array(
			'Webサイト制作',
			'HTML / CSSコーディング',
			'レスポンシブ対応',
			'既存サイト修正',
			'PHPベースCMS（OWLet）',
			'修正外注班',
		),
		'image_id'    => $web_career_image_01,
		'image_alt'   => 'Webサイト制作に使用する複数端末のイメージ',
	),
	array(
		'number'      => '02',
		'title'       => '修正・改善対応の実務経験',
		'subtitle'    => '',
		'description' => '現在対応できることを、案件・実務・学習の文脈で整理します。',
		'points'      => array(),
		'image_id'    => $web_career_image_02,
		'image_alt'   => 'Webサイトのコードを確認している様子',
	),
);
?>

<section
	class="profile-web-career"
	aria-labelledby="profile-web-career-title"
>
	<div class="profile-web-career__inner l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( EXPERIENCE )',
				'title'      => 'Web Career',
				'heading_id' => 'profile-web-career-title',
			)
		);
		?>

		<div class="profile-web-career__list">
			<?php foreach ( $web_career_items as $item ) : ?>
				<article class="profile-web-career__item">
					<?php if ( $item['image_id'] ) : ?>
						<div class="profile-web-career__media">
							<?php
							echo wp_get_attachment_image(
								$item['image_id'],
								'large',
								false,
								array(
									'class'   => 'profile-web-career__image',
									'alt'     => $item['image_alt'],
									'loading' => 'lazy',
								)
							);
							?>
						</div>
					<?php endif; ?>

					<div class="profile-web-career__body">
						<h3 class="profile-web-career__title">
							<span class="profile-web-career__number">
								<?php echo esc_html( $item['number'] ); ?>
							</span>

							<?php echo esc_html( $item['title'] ); ?>
						</h3>

						<?php if ( $item['subtitle'] ) : ?>
							<p class="profile-web-career__subtitle">
								<?php echo esc_html( $item['subtitle'] ); ?>
							</p>
						<?php endif; ?>

						<?php if ( $item['description'] ) : ?>
							<p class="profile-web-career__description">
								<?php echo esc_html( $item['description'] ); ?>
							</p>
						<?php endif; ?>

						<?php if ( $item['points'] ) : ?>
							<ul class="profile-web-career__points">
								<?php foreach ( $item['points'] as $point ) : ?>
									<li><?php echo esc_html( $point ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
