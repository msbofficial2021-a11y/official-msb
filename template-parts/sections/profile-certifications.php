<?php
/**
 * Profile certifications section.
 *
 * 保有資格をカード形式で表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$certifications = array(
	array(
		'title' => '保育士',
	),
	array(
		'title' => 'Webデザイン技能検定 3級',
	),
	array(
		'title' => 'Webデザイナー検定 ベーシック',
	),
	array(
		'title' => 'Webデザイナー検定 エキスパート',
	),
	array(
		'title' => 'マルチメディア検定 ベーシック',
	),
	array(
		'title' => 'マルチメディア検定 エキスパート',
	),
	array(
		'title' => 'ITパスポート',
	),
);
?>

<section
	class="profile-certifications"
	aria-labelledby="profile-certifications-title"
>
	<div class="l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( Qualifications )',
				'title'      => 'Certifications',
				'heading_id' => 'profile-certifications-title',
			)
		);
		?>

		<p class="profile-certifications__lead">
			保有している資格です。
		</p>

		<div class="profile-certifications__grid">
			<?php foreach ( $certifications as $certification ) : ?>
				<article class="profile-certifications__card">
					<div class="profile-certifications__media" aria-hidden="true">
						<div class="profile-certifications__mark">
							<span class="profile-certifications__mark-main">MSB</span>
							<span class="profile-certifications__mark-sub">OFFICIAL.MSB</span>
						</div>
					</div>

					<h3 class="profile-certifications__title">
						<?php echo esc_html( $certification['title'] ); ?>
					</h3>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
