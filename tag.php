<?php
/**
 * Tag archive template.
 *
 * WordPress標準投稿のタグ別一覧に使用されます。
 */

get_header();

$tag_title       = single_tag_title( '', false );
$tag_description = tag_description();
?>

<main id="primary" class="site-main">
	<?php
	get_template_part(
		'template-parts/content/post-taxonomy',
		'archive',
		array(
			'eyebrow'     => '( TAG )',
			'title'       => $tag_title,
			'description' => $tag_description,
		)
	);
	?>
</main>

<?php
get_footer();
