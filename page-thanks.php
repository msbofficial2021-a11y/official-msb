<?php
/**
 * Thanks page template.
 *
 * お問い合わせ完了ページ用テンプレートです。
 */

get_header();

$thanks_hero_image_id = get_post_thumbnail_id();
?>

<main class="site-main thanks-page">
	<?php
	get_template_part(
		'template-parts/components/page',
		'hero',
		array(
			'eyebrow'  => 'CONTACT',
			'title'    => "Let's Talk",
			'lead'     => "制作のご相談、採用について、\nその他お気軽にお問い合わせください。",
			'image_id' => $thanks_hero_image_id,
		)
	);
	?>

	<section class="thanks-page__section" aria-labelledby="thanks-page-title">
		<div class="thanks-page__inner l-container">
			<?php
			get_template_part(
				'template-parts/components/section',
				'heading',
				array(
					'eyebrow'    => '( CONTACT )',
					'title'      => 'Thank You',
					'heading_id' => 'thanks-page-title',
				)
			);
			?>

			<div class="thanks-page__message">
				<p>お問い合わせありがとうございます。</p>
				<p>内容を確認のうえ、ご連絡いたします。</p>
			</div>

			<div class="thanks-page__action">
				<a class="c-button thanks-page__button" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					Homeへ戻る
				</a>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
