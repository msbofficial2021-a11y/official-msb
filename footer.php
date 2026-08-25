<?php
/**
 * Theme footer.
 */
?>

<?php
if ( ! is_page( array( 'contact', 'thanks' ) ) ) {
	get_template_part( 'template-parts/components/contact-cta' );
}
?>

<footer class="site-footer">
	<div class="site-footer__inner l-container">
		<a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</a>

		<div class="site-footer__links">
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav
					class="site-footer__navigation"
					aria-label="<?php esc_attr_e( 'Footer navigation', 'official-msb' ); ?>"
				>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container'      => false,
							'menu_class'     => 'site-footer__menu',
							'fallback_cb'    => false,
							'depth'          => 1,
							'items_wrap'     => '<ul id="%1$s" class="%2$s" role="list">%3$s</ul>',
						)
					);
					?>
				</nav>
			<?php endif; ?>

			<a class="site-footer__back-to-top" href="#top">
				<?php esc_html_e( 'Back to Top', 'official-msb' ); ?>
			</a>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
