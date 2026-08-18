<?php
/**
 * Profile skills section.
 *
 * Profileページで、現在扱っている技術と対応領域を表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * スキル情報をPHP配列で管理します。
 *
 * ACF無料版ではRepeaterを使用できないため、繰り返し表示する内容を
 * 配列へまとめ、foreachで同じHTML構造を出力します。
 */
$profile_skills = array(
	array(
		'number'     => '01',
		'title'      => 'Frontend',
		'description' => 'HTMLとCSSを基礎に、レスポンシブ対応やアクセシビリティを意識したWebページを実装します。',
		'technologies' => array(
			'HTML',
			'CSS / SCSS',
			'JavaScript',
		),
	),
	array(
		'number'     => '02',
		'title'      => 'WordPress',
		'description' => 'オリジナルテーマ制作を通して、テンプレート階層やWordPress標準APIを活用したサイト構築に取り組んでいます。',
		'technologies' => array(
			'PHP',
			'Custom Post Type',
			'ACF',
		),
	),
	array(
		'number'     => '03',
		'title'      => 'Shopify',
		'description' => '既存テーマの修正やLP制作を中心に、デザインをもとにしたページ実装と運用対応を行います。',
		'technologies' => array(
			'Liquid',
			'CSS',
			'JavaScript',
		),
	),
	array(
		'number'     => '04',
		'title'      => 'Development',
		'description' => 'GitとGitHubによるバージョン管理や、SCSSのコンパイル環境を取り入れながら開発を進めています。',
		'technologies' => array(
			'Git / GitHub',
			'npm',
			'Local',
		),
	),
);
?>

<section
	class="profile-skills"
	aria-labelledby="profile-skills-title"
>
	<div class="profile-skills__inner l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( SKILLS )',
				'title'      => 'Technical Skills',
				'heading_id' => 'profile-skills-title',
			)
		);
		?>

		<ul class="profile-skills__list">
			<?php foreach ( $profile_skills as $skill ) : ?>
				<li class="profile-skills__item">
					<span
						class="profile-skills__number"
						aria-hidden="true"
					>
						<?php echo esc_html( $skill['number'] ); ?>
					</span>

					<div class="profile-skills__body">
						<h3 class="profile-skills__title">
							<?php echo esc_html( $skill['title'] ); ?>
						</h3>

						<p class="profile-skills__description">
							<?php echo esc_html( $skill['description'] ); ?>
						</p>

						<ul
							class="profile-skills__technologies"
							aria-label="<?php echo esc_attr( $skill['title'] . 'で使用する技術' ); ?>"
						>
							<?php foreach ( $skill['technologies'] as $technology ) : ?>
								<li class="profile-skills__technology">
									<?php echo esc_html( $technology ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
