<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package our-mission
 */

?>
<footer class="footer">

<div class="footer-layer-1">
	<div class="container">
		<div class="footer-logo">
			<?php the_custom_logo(); ?>
		</div>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'container'      => false,
					'menu_class'     => 'footer-menu',
				)
			);
		?>
		<ul class="footer-socials">
		<?php $socials = get_theme_mod( 'our_mission_socials' ); ?>
			<?php foreach ( $socials as $social ) : ?>
				<li><a href="<?php echo esc_url( $social['link_url'] ); ?>"><img src="<?php echo esc_url( $social['link_icon'] ); ?>" alt=""></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
	<!-- This is optional. Can be set as a widget -->
	<?php 
		if ( is_active_sidebar( 'footer-1' ) ) : 
		 	dynamic_sidebar( 'footer-1' ); 
		endif; 
		if ( is_active_sidebar( 'footer-2' ) ) :
			dynamic_sidebar( 'footer-2' ); 
		endif; 
	?>

<div class="footer-layer-2">
	<div class="container">
		<p class="copyrights">Copyright 2021 © All rights reserved. When reprinting materials, a link to the site is required!</p>
		<div id="scroll_to_top">
			<svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M10.5 5.25L6 0.75L1.5 5.25" stroke="#8DA3C6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
		</div>
	</div>
</div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
