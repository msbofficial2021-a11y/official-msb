<?php
/**
 * Resources archive template.
 *
 * /resources/で表示される外部リソース一覧ページです。
 */

get_header();

$resources_url = get_post_type_archive_link( 'resource' );

if ( ! $resources_url ) {
	$resources_url = home_url( '/resources/' );
}

$current_filter = isset( $_GET['resource_filter'] )
	? sanitize_title( wp_unslash( $_GET['resource_filter'] ) )
	: '';

$resource_categories = get_terms(
	array(
		'taxonomy'   => 'resource_category',
		'hide_empty' => true,
	)
);

if ( is_wp_error( $resource_categories ) ) {
	$resource_categories = array();
}
?>

<main id="primary" class="site-main">
	<section
		class="resources-archive"
		aria-labelledby="resources-archive-title"
	>
		<div class="l-container">
			<header class="resources-archive__header">
				<p class="resources-archive__eyebrow">
					( RESOURCES )
				</p>

				<h1
					id="resources-archive-title"
					class="resources-archive__title"
				>
					Useful Resources
				</h1>

				<p class="resources-archive__lead">
					Web制作や学習に役立つツール・サービス・資料をご紹介します。
				</p>
			</header>

			<?php if ( $resource_categories ) : ?>
				<nav
					class="resources-archive__filters"
					aria-label="Resourcesのカテゴリー絞り込み"
				>
					<ul class="resources-archive__filter-list">
						<li class="resources-archive__filter-item">
							<a
								class="resources-archive__filter-link"
								href="<?php echo esc_url( $resources_url ); ?>"
								<?php if ( ! $current_filter ) : ?>
									aria-current="page"
								<?php endif; ?>
							>
								All
							</a>
						</li>

						<?php foreach ( $resource_categories as $resource_category ) : ?>
							<li class="resources-archive__filter-item">
								<a
									class="resources-archive__filter-link"
									href="<?php echo esc_url(
										add_query_arg(
											'resource_filter',
											$resource_category->slug,
											$resources_url
										)
									); ?>"
									<?php if ( $current_filter === $resource_category->slug ) : ?>
										aria-current="page"
									<?php endif; ?>
								>
									<?php echo esc_html( $resource_category->name ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			<?php endif; ?>

			<?php if ( have_posts() ) : ?>
				<div class="resources-archive__grid">
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>

						<?php
						get_template_part(
							'template-parts/cards/resource',
							'card'
						);
						?>
					<?php endwhile; ?>
				</div>

				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 1,
						'prev_text' => '前へ',
						'next_text' => '次へ',
					)
				);
				?>
			<?php else : ?>
				<p class="resources-archive__empty">
					該当するリソースはありません。
				</p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
