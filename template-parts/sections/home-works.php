<?php
/**
 * Home featured works section.
 *
 * 公開済みのWorksを新しい順に3件表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Homeの一覧はメインクエリではないため、
 * WP_Queryを使ってWorksだけを取得します。
 */
$works_query = new WP_Query(
	array(
		'post_type'           => 'works',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'no_found_rows'       => true,
		'ignore_sticky_posts' => true,
	)
);

/*
 * Worksが1件もない場合は、空のセクションを表示しません。
 */
if ( ! $works_query->have_posts() ) {
	return;
}
?>

<section
	class="home-works"
	aria-labelledby="home-works-title"
>
	<div class="l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( WORKS )',
				'title'      => 'Featured Works',
				'heading_id' => 'home-works-title',
			)
		);
		?>

		<div class="home-works__grid">
			<?php while ( $works_query->have_posts() ) : ?>
				<?php $works_query->the_post(); ?>

				<?php
				get_template_part(
					'template-parts/cards/work',
					'card',
					array(
						'heading_level' => 3,
					)
				);
				?>
			<?php endwhile; ?>
		</div>

		<div class="home-works__action">
			<a
				class="c-button"
				href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>"
			>
				Works一覧を見る
			</a>
		</div>
	</div>
</section>

<?php
/*
 * サブループで変更されたグローバルな投稿情報を、
 * Homeページ本来の投稿情報へ戻します。
 */
wp_reset_postdata();
