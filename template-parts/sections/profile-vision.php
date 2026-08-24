<?php
/**
 * Profile vision section.
 *
 * Profileページの「Where I'm Going」セクションを表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vision_image_id = function_exists( 'get_field' )
	? get_field( 'profile_vision_image' )
	: 0;
?>

<section class="profile-vision" aria-labelledby="profile-vision-title">
	<div class="l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( Vision )',
				'title'      => "Where I'm Going",
				'heading_id' => 'profile-vision-title',
			)
		);
		?>

		<div class="profile-vision__content">
			<div class="profile-vision__body">
				<p class="profile-vision__lead">
					Webのことなら、<br>
					なんでも任せられる人へ。
				</p>

				<div class="profile-vision__text">
					<p>
						現在はWeb制作・フロントエンドを中心に経験を積んでいます。
					</p>

					<p>
						今後はReactなどのフロントエンド技術だけでなく、バックエンド、AWS、Dockerなどにも領域を広げ、Webサービス全体を理解できるフルスタックエンジニアを目指しています。
					</p>

					<p>
						「この人に聞けばWebのことはなんとかなる」そう思ってもらえる人材になることが目標です。
					</p>
				</div>
			</div>

			<?php if ( $vision_image_id ) : ?>
				<div class="profile-vision__media">
					<?php
					echo wp_get_attachment_image(
						(int) $vision_image_id,
						'large',
						false,
						array(
							'class'   => 'profile-vision__image',
							'loading' => 'lazy',
						)
					);
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
