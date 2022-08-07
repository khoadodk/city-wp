<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package our-mission
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header-main">
	<div class="container">
		<div class="header-items">
			<div class="header-logo">
				<?php the_custom_logo() ?>
			</div>
			<nav class="main-navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'container' => false,
							'menu_class' => 'header-menu'
						)
					);
				?>
			</nav>
			<div class="header-buttons">
				<?php get_search_form() ?>
				<a href="" class="btn-light leave-appeal">Leave appeal</a>
			</div>

			<div class="mobile-menu-bars">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</div>
		</div>

		<!-- Mobile menu -->
		<div class="mobile-menu-items">
			<div class="mobile-menu-inner">						
				<div class="mobile-header">
					<div class="mobile-search">
						<?php get_search_form(); ?>
					</div>
				</div>
				<div class="mobile-menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'container'      => false,
							'menu_class'     => 'header-menu',
							'menu_id'        => 'menu-mobile-primary',
						)
					);
					?>
				</div>
				<a href="" class="btn-light">Leave appeal</a>
			</div>
		</div>
	</div>
</header>

