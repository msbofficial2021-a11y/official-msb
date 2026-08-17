<?php
/**
 * Theme header.
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="site-header__inner l-container">
		<a class="site-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</a>

		<?php if ( has_nav_menu( 'global' ) ) : ?>
			<button
				class="site-header__menu-toggle"
				type="button"
				aria-controls="global-navigation"
				aria-expanded="false"
				aria-label="<?php esc_attr_e( 'メニューを開く', 'official-msb' ); ?>"
				data-label-open="<?php esc_attr_e( 'メニューを開く', 'official-msb' ); ?>"
				data-label-close="<?php esc_attr_e( 'メニューを閉じる', 'official-msb' ); ?>"
			>
				<span class="site-header__menu-icon" aria-hidden="true">
					<span></span>
					<span></span>
				</span>
			</button>

			<nav
				id="global-navigation"
				class="site-header__navigation"
				aria-label="<?php esc_attr_e( 'Global navigation', 'official-msb' ); ?>"
			>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'global',
						'container'      => false,
						'menu_class'     => 'site-header__menu',
						'fallback_cb'    => false,
						'depth'          => 1,
						'items_wrap'     => '<ul id="%1$s" class="%2$s" role="list">%3$s</ul>',
					)
				);
				?>
			</nav>
		<?php endif; ?>
	</div>
</header>
