<?php
/**
 * Home gallery section.
 *
 * 公開済みのGallery投稿を新しい順に4件表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Homeのメインクエリとは分けて、
 * Gallery投稿だけを取得します。
 */
$gallery_query = new WP_Query(
	array(
		'post_type'           => 'gallery',
		'post_status'         => 'publish',
		'posts_per_page'      => 4,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'no_found_rows'       => true,
		'ignore_sticky_posts' => true,
	)
);

/*
 * Gallery投稿がない場合は、空のセクションを表示しません。
 */
if ( ! $gallery_query->have_posts() ) {
	return;
}
?>

<section
	class="home-gallery"
	aria-labelledby="home-gallery-title"
>
	<div class="l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( GALLERY )',
				'title'      => 'Components Gallery',
				'heading_id' => 'home-gallery-title',
			)
		);
		?>

		<div class="home-gallery__grid">
			<?php while ( $gallery_query->have_posts() ) : ?>
				<?php $gallery_query->the_post(); ?>

				<?php
				get_template_part(
					'template-parts/cards/gallery',
					'card',
					array(
						'heading_level' => 3,
					)
				);
				?>
			<?php endwhile; ?>
		</div>

		<div class="home-gallery__action">
			<a
				class="c-button"
				href="<?php echo esc_url( get_post_type_archive_link( 'gallery' ) ); ?>"
			>
				Gallery一覧を見る
			</a>
		</div>
	</div>
</section>

<?php
/*
 * サブループで変更された投稿情報を、
 * Homeページ本来の投稿情報へ戻します。
 */
wp_reset_postdata();
