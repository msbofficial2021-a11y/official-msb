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

		<?php
		$career_items = array(
			array(
				'period' => '2017 保育士',
				'detail' => '人と関わる仕事',
			),
			array(
				'period' => '2020 便利屋',
				'detail' => 'ものづくりの仕事',
			),
			array(
				'period' => '2023 WEB業界へ',
				'detail' => 'Web制作 / 修正外注班',
			),
			array(
				'period' => '2026 現在',
				'detail' => 'Webサイト導入支援・サイト修正・Shopify等',
			),
		);
		?>

		<ol class="profile-career__list">
			<?php foreach ( $career_items as $career_item ) : ?>
				<li class="profile-career__item">
					<span
						class="profile-career__marker"
						aria-hidden="true"
					></span>

					<p class="profile-career__period">
						<?php echo esc_html( $career_item['period'] ); ?>
					</p>

					<p class="profile-career__detail">
						<?php echo esc_html( $career_item['detail'] ); ?>
					</p>
				</li>
			<?php endforeach; ?>
		</ol>

	</div>
</section>
