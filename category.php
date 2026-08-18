<?php
/**
 * Category archive template.
 *
 * WordPress標準投稿のカテゴリー別一覧に使用されます。
 */

get_header();

$category_title       = single_cat_title( '', false );
$category_description = category_description();
?>

<main id="primary" class="site-main">
	<?php
	get_template_part(
		'template-parts/content/post-taxonomy',
		'archive',
		array(
			'eyebrow'    => '( CATEGORY )',
			'title'      => $category_title,
			'description' => $category_description,
		)
	);
	?>
</main>

<?php
get_footer();
