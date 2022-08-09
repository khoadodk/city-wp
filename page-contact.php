<?php
/*
Template Name: Contact Us
 */
get_header();
?>

<div class="contact-us">
	<div class="container">
		<div class="contact-us-inner">
			<div class="contact-us-inner__left">
				<div class="contact-us-header">
					<span class="title-dep"><?php esc_html_e( 'Contacts', 'our-mission' ); ?></span>
					<h2 class="title-default"><?php echo wp_kses_post( __( 'We are in <span class="highlighted">touch</span>', 'our-mission' ) ); ?></h2>
					<p class="text-default"><?php esc_html_e( 'It was popularised in the 1960s with the release of Letraset sheets containing. It wase of Letraset sheets containing  ', 'our-mission' ); ?></p>
				</div>
				<div class="contact-us-body">
					<div class="contact-form-group">
						<label><?php esc_html_e( 'Phone', 'our-mission' ); ?></label>
						<p>
							<a href="tel:<?php echo $ourm_settings['contacts_tel']; ?>"><?php echo $ourm_settings['contacts_tel']; ?></a>
							<span><?php echo $ourm_settings['contacts_working_hours']; ?></span>
						</p>
					</div>
					<div class="contact-form-group">
						<label><?php esc_html_e( 'Email', 'our-mission' ); ?></label>

						<a href="mailto:<?php echo $ourm_settings['contacts_email']; ?>"><?php echo $ourm_settings['contacts_email']; ?></a>
					</div>
					<div class="contact-form-group">
						<label><?php esc_html_e( 'Address', 'our-mission' ); ?></label>

						<span><?php echo $ourm_settings['contacts_addr']; ?></span>
					</div>
					<div class="contact-form-group">
						<label><?php esc_html_e( 'Socials', 'our-mission' ); ?></label>
						<ul class="socials-team">
						<?php
							foreach ( $ourm_settings['redux_socials']['link_text'] as $key => $social ) :
						?>
							<li><a href="<?php echo esc_url( $ourm_settings['redux_socials']['link_url'][ $key ] ); ?>" title="<?php echo esc_attr( $social ); ?>"><img src="<?php echo esc_url( $ourm_settings['redux_socials']['link_icon'][ $key ]['url'] ); ?>" alt=""></a></li>
						<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="contact-us-inner__right">
				<?php
				echo $ourm_settings['contacts_map'];
				?>
			</div>

		</div>
	</div>
</div>

<?php
get_footer();
