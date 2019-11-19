<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elevateproductions
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600i,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'elevateproductions' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding">
				<?php the_custom_logo(); ?>
			</div>
			<div class="main-menu">
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav>
			</div>
			<button class="menu-header">
				<span class="control-button menu" data-slide-menu="primary-slide-menu">
					<span class="open">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</span>
				</span>
			</button>
			<div class="menu-show">
				<div class="slide-menu-overlay"></div>
				<div class="main-menu-show">
					<div class="menu-top">
						<p>Menu</p>
						<span class="close">
							<i class="fa fa-close fas fa-times" aria-hidden="true"></i>
						</span>
					</div>
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'menu-header',
						) );
					?>
				</div>
			</div>
		</div>
	</header>

	<div id="content" class="site-content">
