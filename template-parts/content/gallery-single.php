<?php
/**
 * Gallery single content.
 *
 * Gallery個別ページのACF取得、Live Preview、
 * コードサンプルなどを表示します。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * ACFが無効な場合でもFatal errorを発生させないようにします。
 */
$gallery_type = function_exists( 'get_field' )
	? get_field( 'gallery_type' )
	: '';

$gallery_technologies = function_exists( 'get_field' )
	? get_field( 'gallery_technologies' )
	: '';

$gallery_preview_image_id = function_exists( 'get_field' )
	? get_field( 'gallery_preview_image' )
	: 0;

$gallery_summary = function_exists( 'get_field' )
	? get_field( 'gallery_summary' )
	: '';

$gallery_how_it_works = function_exists( 'get_field' )
	? get_field( 'gallery_how_it_works' )
	: '';

$gallery_html_code = function_exists( 'get_field' )
	? get_field( 'gallery_html_code' )
	: '';

$gallery_css_code = function_exists( 'get_field' )
	? get_field( 'gallery_css_code' )
	: '';

$gallery_js_code = function_exists( 'get_field' )
	? get_field( 'gallery_js_code' )
	: '';

$gallery_technical_notes = function_exists( 'get_field' )
	? get_field( 'gallery_technical_notes' )
	: '';

$gallery_demo_url = function_exists( 'get_field' )
	? get_field( 'gallery_demo_url' )
	: '';

$gallery_github_url = function_exists( 'get_field' )
	? get_field( 'gallery_github_url' )
	: '';

$gallery_demo_directory = function_exists( 'get_field' )
	? get_field( 'gallery_demo_directory' )
	: '';

$internal_demo_url = '';

/*
 * 英小文字・数字・ハイフンだけを許可し、
 * 「../」などによる意図しないファイル参照を防ぎます。
 */
if (
	is_string( $gallery_demo_directory ) &&
	preg_match( '/\A[a-z0-9-]+\z/', $gallery_demo_directory )
) {
	$demo_relative_path = sprintf(
		'/assets/demos/%s/index.html',
		$gallery_demo_directory
	);

	$demo_file_path = get_theme_file_path( $demo_relative_path );

	/*
	 * 実際にテーマ内へindex.htmlが存在する場合だけ、
	 * iframe用URLを生成します。
	 */
	if ( is_file( $demo_file_path ) ) {
		$internal_demo_url = get_theme_file_uri(
			$demo_relative_path
		);
	}
}

?>

<article <?php post_class( 'gallery-single' ); ?>>
	<header class="gallery-single__header">
		<?php if ( $gallery_preview_image_id ) : ?>
			<div
				class="gallery-single__header-media"
				aria-hidden="true"
			>
				<?php
				echo wp_get_attachment_image(
					(int) $gallery_preview_image_id,
					'full',
					false,
					array(
						'class'   => 'gallery-single__header-image',
						'alt'     => '',
						'loading' => 'eager',
					)
				);
				?>
			</div>
		<?php endif; ?>

		<div class="gallery-single__header-inner l-container">
			<p class="gallery-single__eyebrow">
				( GALLERY )
			</p>

			<h1 class="gallery-single__title">
				<?php the_title(); ?>
			</h1>

			<?php if ( $gallery_type || $gallery_technologies ) : ?>
				<p class="gallery-single__meta">
					<?php if ( $gallery_type ) : ?>
						<span><?php echo esc_html( $gallery_type ); ?></span>
					<?php endif; ?>

					<?php if ( $gallery_technologies ) : ?>
						<span>
							<?php echo esc_html( $gallery_technologies ); ?>
						</span>
					<?php endif; ?>
				</p>
			<?php endif; ?>
		</div>
	</header>

	<div class="gallery-single__content">
		<div class="l-container">
			<section
				class="gallery-single__preview"
				aria-labelledby="gallery-preview-title"
			>
				<p class="gallery-single__section-label">
					( LIVE PREVIEW )
				</p>

				<h2
					id="gallery-preview-title"
					class="gallery-single__section-title"
				>
					Live Preview
				</h2>

				<div class="gallery-single__preview-frame">
					<?php if ( $internal_demo_url ) : ?>
						<iframe
							class="gallery-single__iframe"
							src="<?php echo esc_url( $internal_demo_url ); ?>"
							title="<?php echo esc_attr( get_the_title() . 'のLive Preview' ); ?>"
							loading="lazy"
							sandbox="allow-scripts"
						></iframe>
					<?php elseif ( $gallery_preview_image_id ) : ?>
						<?php
						echo wp_get_attachment_image(
							(int) $gallery_preview_image_id,
							'full',
							false,
							array(
								'class'   => 'gallery-single__preview-image',
								'loading' => 'lazy',
							)
						);
						?>
					<?php endif; ?>
				</div>
			</section>
			<?php if ( $gallery_summary ) : ?>
				<section
					class="gallery-single__about"
					aria-labelledby="gallery-about-title"
				>
					<p class="gallery-single__section-label">
						( ABOUT )
					</p>

					<h2
						id="gallery-about-title"
						class="gallery-single__section-title"
					>
						About This Component
					</h2>

					<p class="gallery-single__text">
						<?php
						echo nl2br(
							esc_html( $gallery_summary )
						);
						?>
					</p>
				</section>
			<?php endif; ?>

			<?php if ( $gallery_how_it_works ) : ?>
				<section
					class="gallery-single__how-it-works"
					aria-labelledby="gallery-how-it-works-title"
				>
					<p class="gallery-single__section-label">
						( DETAILS )
					</p>

					<h2
						id="gallery-how-it-works-title"
						class="gallery-single__section-title"
					>
						How It Works
					</h2>

					<p class="gallery-single__text">
						<?php
						echo nl2br(
							esc_html( $gallery_how_it_works )
						);
						?>
					</p>
				</section>
			<?php endif; ?>
			<?php if ( $gallery_html_code || $gallery_css_code || $gallery_js_code ) : ?>
				<section
					class="gallery-single__code"
					aria-labelledby="gallery-code-title"
				>
					<p class="gallery-single__section-label">
						( CODE )
					</p>

					<h2
						id="gallery-code-title"
						class="gallery-single__section-title"
					>
						View the Code
					</h2>

					<div class="gallery-single__code-list">
						<?php if ( $gallery_html_code ) : ?>
							<div class="gallery-single__code-block">
								<h3 class="gallery-single__code-title">
									HTML
								</h3>

								<pre class="gallery-single__pre"><code class="language-html"><?php echo esc_html( $gallery_html_code ); ?></code></pre>
							</div>
						<?php endif; ?>

						<?php if ( $gallery_css_code ) : ?>
							<div class="gallery-single__code-block">
								<h3 class="gallery-single__code-title">
									CSS
								</h3>

								<pre class="gallery-single__pre"><code class="language-css"><?php echo esc_html( $gallery_css_code ); ?></code></pre>
							</div>
						<?php endif; ?>

						<?php if ( $gallery_js_code ) : ?>
							<div class="gallery-single__code-block">
								<h3 class="gallery-single__code-title">
									JavaScript
								</h3>

								<pre class="gallery-single__pre"><code class="language-javascript"><?php echo esc_html( $gallery_js_code ); ?></code></pre>
							</div>
						<?php endif; ?>
					</div>
				</section>
			<?php endif; ?>
			<?php if ( $gallery_technical_notes ) : ?>
				<section
					class="gallery-single__notes"
					aria-labelledby="gallery-notes-title"
				>
					<p class="gallery-single__section-label">
						( NOTES )
					</p>

					<h2
						id="gallery-notes-title"
						class="gallery-single__section-title"
					>
						Technical Notes
					</h2>

					<p class="gallery-single__text">
						<?php
						echo nl2br(
							esc_html( $gallery_technical_notes )
						);
						?>
					</p>
				</section>
			<?php endif; ?>

			<?php
			$public_demo_url = $gallery_demo_url
				? $gallery_demo_url
				: $internal_demo_url;
			?>

			<div class="gallery-single__actions">
				<?php if ( $public_demo_url ) : ?>
					<a
						class="gallery-single__button"
						href="<?php echo esc_url( $public_demo_url ); ?>"
						target="_blank"
						rel="noopener noreferrer"
					>
						デモを別画面で見る
					</a>
				<?php endif; ?>

				<?php if ( $gallery_github_url ) : ?>
					<a
						class="gallery-single__button"
						href="<?php echo esc_url( $gallery_github_url ); ?>"
						target="_blank"
						rel="noopener noreferrer"
					>
						GitHubでコードを見る
					</a>
				<?php endif; ?>

				<a
					class="gallery-single__button gallery-single__button--back"
					href="<?php echo esc_url( get_post_type_archive_link( 'gallery' ) ); ?>"
				>
					Gallery一覧へ戻る
				</a>
			</div>
		</div>
	</div>
</article>