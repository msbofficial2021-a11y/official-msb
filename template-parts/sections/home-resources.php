<?php
/**
 * Home resources section.
 *
 * 公開済みのResource投稿を新しい順に3件表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Homeのメインクエリとは分けて、
 * Resource投稿だけを取得します。
 */
$resources_query = new WP_Query(
	array(
		'post_type'           => 'resource',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'no_found_rows'       => true,
		'ignore_sticky_posts' => true,
	)
);

/*
 * Resource投稿がない場合は、空のセクションを表示しません。
 */
if ( ! $resources_query->have_posts() ) {
	return;
}
?>

<section
	class="home-resources"
	aria-labelledby="home-resources-title"
>
	<div class="l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( RESOURCES )',
				'title'      => 'Useful Resources',
				'heading_id' => 'home-resources-title',
			)
		);
		?>

		<div class="home-resources__grid">
			<?php while ( $resources_query->have_posts() ) : ?>
				<?php $resources_query->the_post(); ?>

				<?php
				get_template_part(
					'template-parts/cards/resource',
					'card',
					array(
						'heading_level' => 3,
					)
				);
				?>
			<?php endwhile; ?>
		</div>

		<div class="home-resources__action">
			<a
				class="c-button"
				href="<?php echo esc_url( get_post_type_archive_link( 'resource' ) ); ?>"
			>
				Resources一覧を見る
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
