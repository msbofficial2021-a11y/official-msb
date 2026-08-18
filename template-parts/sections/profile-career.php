<?php
/**
 * Profile Career section.
 *
 * これまでの経験と、現在目指している方向を
 * 時系列のタイムラインとして表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="profile-career"
	aria-labelledby="profile-career-title"
>
	<div class="l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( CAREER )',
				'title'      => 'My Journey',
				'heading_id' => 'profile-career-title',
			)
		);
		?>

		<ol class="profile-career__list">
			<li class="profile-career__item">
				<span
					class="profile-career__number"
					aria-hidden="true"
				>
					01
				</span>

				<div class="profile-career__body">
					<h3 class="profile-career__item-title">
						Web制作会社で実務経験を積む
					</h3>

					<p class="profile-career__description">
						Web制作会社で約2年半勤務し、Webサイト制作の
						基本から公開後の運用まで、実務を通して経験しました。
					</p>
				</div>
			</li>

			<li class="profile-career__item">
				<span
					class="profile-career__number"
					aria-hidden="true"
				>
					02
				</span>

				<div class="profile-career__body">
					<h3 class="profile-career__item-title">
						修正・改善対応を重ねる
					</h3>

					<p class="profile-career__description">
						HTML/CSSを中心に、レスポンシブ対応や表示調整、
						既存コードを読み解いたうえでの修正に取り組みました。
					</p>
				</div>
			</li>

			<li class="profile-career__item">
				<span
					class="profile-career__number"
					aria-hidden="true"
				>
					03
				</span>

				<div class="profile-career__body">
					<h3 class="profile-career__item-title">
						制作領域を広げる
					</h3>

					<p class="profile-career__description">
						Shopify案件への対応やWordPressオリジナルテーマ制作を通して、
						CMSを活用したサイト構築への理解を深めています。
					</p>
				</div>
			</li>

			<li class="profile-career__item">
				<span
					class="profile-career__number"
					aria-hidden="true"
				>
					04
				</span>

				<div class="profile-career__body">
					<h3 class="profile-career__item-title">
						学習と技術発信を継続する
					</h3>

					<p class="profile-career__description">
						フロントエンドだけでなく、バックエンドやインフラも学び、
						Webサービス全体を扱えるエンジニアを目指しています。
					</p>
				</div>
			</li>
		</ol>
	</div>
</section>
