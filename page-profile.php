<?php
/**
 * Profile page template.
 *
 * スラッグが「profile」の固定ページに使用されます。
 * ページ固有の構成はこのファイルで管理します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<article <?php post_class( 'profile-page' ); ?>>
			<?php
			get_template_part(
				'template-parts/components/page',
				'hero',
				array(
					'eyebrow'    => '( PROFILE )',
					'title'      => 'About Me',
					'lead'       => "作って終わりではなく、\n学び・発信し・成長し続ける。",
					'image_id'   => get_post_thumbnail_id(),
					'modifier'   => 'profile',
					'heading_id' => 'profile-page-title',
				)
			);
			?>
            <?php get_template_part( 'template-parts/sections/profile', 'about' ); ?>
            <?php get_template_part( 'template-parts/sections/profile', 'career' ); ?>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
