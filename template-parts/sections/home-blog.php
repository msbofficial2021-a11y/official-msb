<?php
/**
 * Home latest articles section.
 *
 * 公開済みの標準投稿を新しい順に3件表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$blog_page_id = (int) get_option( 'page_for_posts' );
$blog_url     = $blog_page_id
	? get_permalink( $blog_page_id )
	: home_url( '/blog/' );

/*
 * Homeのメインクエリとは分けて、
 * WordPress標準投稿だけを取得します。
 */
$posts_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'no_found_rows'       => true,
		'ignore_sticky_posts' => true,
	)
);

/*
 * 公開中の記事がない場合は、空のセクションを表示しません。
 */
if ( ! $posts_query->have_posts() ) {
	return;
}
?>

<section
	class="home-blog"
	aria-labelledby="home-blog-title"
>
	<div class="l-container">
		<?php
		get_template_part(
			'template-parts/components/section',
			'heading',
			array(
				'eyebrow'    => '( BLOG )',
				'title'      => 'Latest Articles',
				'heading_id' => 'home-blog-title',
			)
		);
		?>

		<div class="home-blog__grid">
			<?php while ( $posts_query->have_posts() ) : ?>
				<?php $posts_query->the_post(); ?>

				<?php
				get_template_part(
					'template-parts/cards/post',
					'card',
					array(
						'heading_level' => 3,
					)
				);
				?>
			<?php endwhile; ?>
		</div>

		<div class="home-blog__action">
			<a
				class="c-button"
				href="<?php echo esc_url( $blog_url ); ?>"
			>
				Blog一覧を見る
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
