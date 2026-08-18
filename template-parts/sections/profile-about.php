<?php
/**
 * Profile About section.
 *
 * Profileページで、プロフィール概要と基本情報を表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * ACFが無効な場合でもFatal errorにならないように、
 * get_field()が使用できる場合だけ画像IDを取得します。
 */
$profile_about_image_id = function_exists( 'get_field' )
	? (int) get_field( 'profile_about_image' )
	: 0;
?>

<section
	class="profile-about"
	aria-labelledby="profile-about-title"
>
	<div class="l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( ABOUT )',
				'title'      => 'Web Developer / Coder',
				'heading_id' => 'profile-about-title',
			)
		);
		?>

		<div class="profile-about__content">
			<div class="profile-about__introduction">
				<p class="profile-about__name">
					菅谷 将司
					<span lang="en">Masashi Sugaya</span>
				</p>

				<div class="profile-about__description">
					<p>
						1998年生まれ。<br>
						Web制作会社での実務経験を経て、<br>
						現在はWebサイトの導入支援・修正などに携わっています。
					</p>

					<p>
						「ものづくりには人の心が欠かせない」を大切に、<br>
						技術だけではなく、その先にいる人を考えながら<br>
						Web制作に取り組んでいます。
					</p>
				</div>

				<dl class="profile-about__details">
					<div class="profile-about__detail">
						<dt>LOCATION</dt>
						<dd>Japan</dd>
					</div>

					<div class="profile-about__detail">
						<dt>CAREER</dt>
						<dd>Web Industry 3+ Years</dd>
					</div>

					<div class="profile-about__detail">
						<dt>ROLE</dt>
						<dd>Web Developer / Coder</dd>
					</div>
				</dl>
			</div>

			<aside
				class="profile-about__card"
				aria-label="プロフィール概要"
			>
				<?php if ( $profile_about_image_id ) : ?>
					<div class="profile-about__card-media">
						<?php
						echo wp_get_attachment_image(
							$profile_about_image_id,
							'medium',
							false,
							array(
								'class'   => 'profile-about__card-image',
								'alt'     => '菅谷将司のプロフィールイラスト',
								'loading' => 'lazy',
							)
						);
						?>
					</div>
				<?php endif; ?>

				<p class="profile-about__card-label">
					Profile / Career / Skills
				</p>

				<a
					class="c-button c-button--outline profile-about__card-button"
					href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
				>
					CONTACT
				</a>
			</aside>
		</div>
	</div>
</section>
