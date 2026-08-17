<?php
/**
 * Home hero section.
 *
 * Home固定ページのアイキャッチ画像を背景として使用します。
 * テキストとリンクは、FigmaのHeroデザインを基準にしています。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="home-hero" aria-labelledby="home-hero-title">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="home-hero__media" aria-hidden="true">
			<?php
			the_post_thumbnail(
				'full',
				array(
					'class'         => 'home-hero__image',
					'alt'           => '',
					'loading'       => 'eager',
					'fetchpriority' => 'high',
				)
			);
			?>
		</div>
	<?php endif; ?>

	<div class="home-hero__inner l-container">
		<div class="home-hero__content">
			<p class="home-hero__eyebrow">
				<?php esc_html_e( 'Web Developer', 'official-msb' ); ?>
			</p>

			<h1 id="home-hero-title" class="home-hero__title">
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</h1>

            <p class="home-hero__message">
                <?php esc_html_e( 'ものづくりには', 'official-msb' ); ?><br class="sp">
                <?php esc_html_e( '人の心が欠かせない', 'official-msb' ); ?>
            </p>

			<p class="home-hero__description">
				<?php esc_html_e( 'Web制作の実務経験を活かし、', 'official-msb' ); ?><br>
				<?php esc_html_e( '使う人の心と成果を考えたサイトを制作します。', 'official-msb' ); ?>
			</p>

			<div class="home-hero__actions">
				<a class="c-button c-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<?php esc_html_e( 'Contact', 'official-msb' ); ?>
				</a>

				<a class="c-button" href="<?php echo esc_url( home_url( '/works/' ) ); ?>">
					<?php esc_html_e( 'Worksを見る', 'official-msb' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>