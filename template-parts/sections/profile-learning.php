<?php
/**
 * Profile learning section.
 *
 * Profileページの「Currently Learning」を表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_items = array(
	array(
		'title' => 'React',
		'text'  => 'Frontend development',
	),
	array(
		'title' => 'AWS',
		'text'  => 'Infrastructure / Cloud',
	),
	array(
		'title' => 'Docker',
		'text'  => 'Development Environment',
	),
);
?>

<section class="profile-learning" aria-labelledby="profile-learning-title">
	<div class="l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( Learning )',
				'title'      => 'Currently Learning',
				'heading_id' => 'profile-learning-title',
			)
		);
		?>

		<p class="profile-learning__lead">
			フロントエンドだけでなく、バックエンド・インフラまで理解し、Webサービス全体を扱えるエンジニアを目指して学習しています。
		</p>

		<div class="profile-learning__grid">
			<?php foreach ( $learning_items as $item ) : ?>
				<article class="profile-learning__card">
					<div class="profile-learning__media" aria-hidden="true">
						<span class="profile-learning__icon">&lt;/&gt;</span>
					</div>

					<div class="profile-learning__body">
						<h3 class="profile-learning__title">
							<?php echo esc_html( $item['title'] ); ?>
						</h3>

						<p class="profile-learning__text">
							<?php echo esc_html( $item['text'] ); ?>
						</p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
