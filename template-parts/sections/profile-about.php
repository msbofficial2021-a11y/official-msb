<?php
/**
 * Profile About section.
 *
 * Profileページで、経歴の概要と現在の目標を紹介します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
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
				'title'      => 'Who I Am',
				'heading_id' => 'profile-about-title',
			)
		);
		?>

		<div class="profile-about__content">
			<div class="profile-about__introduction">
				<p class="profile-about__statement">
					使う人の心と成果を考えながら、<br>
					Webサイトを丁寧に実装します。
				</p>

				<div class="profile-about__description">
					<p>
						Web制作会社で約2年半勤務し、HTML/CSSを中心とした
						コーディングやレスポンシブ対応、既存サイトの
						修正・改善を経験してきました。
					</p>

					<p>
						現在はShopifyやWordPressの制作にも取り組み、
						実務と学習をつなげながら、設計から運用まで
						理解できるWebエンジニアを目指しています。
					</p>
				</div>
			</div>

			<dl class="profile-about__details">
				<div class="profile-about__detail">
					<dt>Role</dt>
					<dd>Web Developer / Coder</dd>
				</div>

				<div class="profile-about__detail">
					<dt>Experience</dt>
					<dd>Web制作会社 約2年半</dd>
				</div>

				<div class="profile-about__detail">
					<dt>Focus</dt>
					<dd>WordPress / Shopify</dd>
				</div>

				<div class="profile-about__detail">
					<dt>Location</dt>
					<dd>Japan</dd>
				</div>
			</dl>
		</div>
	</div>
</section>
