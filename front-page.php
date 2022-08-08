<?php
/**
 * The template for displaying front page
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package our-mission
 */

get_header();
?>

<!-- Banner Section -->
<section class="banner-main">
	<div class="container">
		<div class="banner-inner">
			<div class="banner-left-side">
				<h1><?php echo wp_kses( get_theme_mod('our_mission_banner_title'), array('span' => array('class' => true), 'br' => true)) ?></h1>
				<span><?php echo wp_kses_post( get_theme_mod('our_mission_banner_subtitle')) ?></span>
				<div class="banner-socials">
					<ul class="banner-socials-list">
						
						<?php $socials = get_theme_mod('our_mission_socials'); 
                            //echo '<pre>';
                            //print_r($socials);
                            //echo '</pre>'
                        ?>
                        <?php foreach($socials as $social): ?>
                            <li><a href="<?php echo esc_url( $social['link_url']) ?>">
                                <img src="<?php echo esc_url( $social['link_icon']) ?>" alt="">
                            </a></li>
                        <?php endforeach; ?>
						
					</ul>

				</div>
			</div>
			<div class="banner-right-side">
				<img src="<?php echo esc_url(( get_theme_mod('our_mission_banner_image'))) ?>" alt="">
			</div>
		</div>
	</div>
	<div class="circles-shapes-home"><img src="<?php echo get_template_directory_uri() . '/assets/images/circle.png' ?>" alt=""></div>
</section>

<!-- Two Blocks Section -->
<section class="two-halves-block">
	<div class="container">
		<div class="two-halves-block__inner">
			<div class="two-halves-block__left">
			<img src="<?php echo get_template_directory_uri() . '/assets/images/image1.svg' ?>" alt="">
			</div>
			<div class="two-halves-block__right">
				<span class="title-dep"><?php esc_html_e('Our Mission', 'our-mission') ?></span>
				<h2 class="title-default">
                    <?php esc_html_e("I'm running for mayor because I don't care what area I live in and my family. In what country will each of us live", 'our-mission') ?>
				</h2>
				<p class="text-default">
                    <?php esc_html_e('	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'our-mission') ?>				
				</p>
				<a href="" class="btn-oulined-blue"><?php esc_html_e('Read more', 'our-mission') ?>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M4.16602 10H15.8327" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M11.5 5L16.5 10L11.5 15" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- News Section -->
<section class="kh-news">
	<div class="container">
		<div class="news-header">
			<span class="title-dep">News</span>
			<h2 class="title-default">What the <span class='highlighted'>media</span> says about us</h2>
		</div>
		<div class="news-block">
			<div class="news-block__left">
				<?php 
					$left_args = array(
						'posts_per_page' => 1,
						'post__in' => get_option( 'sticky_posts' ),
						'ignore_sticky_posts' => 1
					);
					$the_query = new WP_Query($left_args);
				?>
				<?php 
					if($the_query->have_posts()):
						while ($the_query->have_posts()):
							$the_query->the_post(); 
				?>
				<a href="<?php echo get_the_permalink() ?>" class="new-image">
					<?php the_post_thumbnail('full') ?>
				</a>
				<div class="news-meta">
					<?php $cats = wp_get_post_categories(get_the_ID(), array('fields' => 'all')) ?>
					<a href="<?php echo get_term_link($cats[0]->term_id) ?>" class="news-cat">
						<?php echo esc_html($cats[0]->name) ?>
					</a><span><?php echo get_the_date('j F Y') ?></span>
				</div>
				<a href="<?php echo get_the_permalink() ?>" class="news-title"><?php echo esc_html(get_the_title()) ?></a>
				<?php
						endwhile;
					else:
							_e('Sorry, no posts matched your criteria.', 'our-mission');
					endif;
					wp_reset_postdata();
				?>
			</div>

			<div class="news-block__right">
				<?php 
					$right_args = array(
						'post_type' => 'post',
						'posts_per_page' => 4,
						'ignore_sticky_posts' => 1
					);
					$the_query = new WP_Query($right_args);
				?>
				<?php 
					if($the_query->have_posts()):
						while ($the_query->have_posts()):
							$the_query->the_post(); 
				?>
				<div class="news-item">
					<a href="<?php echo get_the_permalink() ?>" class="new-image">
						<?php the_post_thumbnail('full') ?>
					</a>
					<div class="news-meta">
						<?php $cats = wp_get_post_categories(get_the_ID(), array('fields' => 'all')) ?>
						<a href="<?php echo get_term_link($cats[0]->term_id) ?>" class="news-cat">
							<?php echo esc_html($cats[0]->name) ?>
						</a><span><?php echo get_the_date('j F Y') ?></span>
					</div>
					<a href="<?php echo get_the_permalink() ?>" class="news-title"><?php echo esc_html(wp_trim_words(get_the_title(), 8)) ?></a>
				</div>
				<?php
							endwhile;
						else:
								_e('Sorry, no posts matched your criteria.', 'our-mission');
						endif;
						wp_reset_postdata();
				?>	
			</div>
		</div>
		<div class="read-more-wrapper">
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn-oulined-blue"> All news
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4.16602 10H15.8327" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M11.5 5L16.5 10L11.5 15" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</a>
		</div>
	</div>
</section>

<!-- Projects Section -->
<section class="projects">
	<div class="container">
		<div class="project-header">
			<span class="title-dep">Our projects</span>
			<h2 class="title-default">Development of Charlotte - this is our common <span class='highlighted'>cause</span></h2>
			<p class="text-default">It was popularised in the 1960s with the release of Letraset sheets containing  It was popularised in the 1960s with the release.</p>
		</div>
		<div class="project-items">
			<?php 
				$args = array(
					'post_type'=> 'projects',
					'posts_per_page' => 3,
				);
				$projects = get_posts($args)
			?>
			<?php 
				foreach($projects as $post):
					setup_postdata($post)
			?>
			<div class="project-item" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url()) ?>')">
				<h5 class="project-item-title"><?php echo get_the_title() ?></h5>
				<div class="project-item-excerpt">
					<?php echo get_the_excerpt() ?>
				</div>
				<a href="<?php esc_url(get_permalink()) ?>" class="read-more"> <?php esc_html_e('Read more', 'our-mission') ?>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M4.16602 10H15.8327" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M11.5 5L16.5 10L11.5 15" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
			</div>

			<?php 
				endforeach;
				wp_reset_postdata();
			?>		
		</div>
		<div class="read-more-wrapper">
			<a href="<?php echo get_post_type_archive_link('projects') ?>" class="btn-oulined-blue">All projects
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4.16602 10H15.8327" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M11.5 5L16.5 10L11.5 15" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</a>
		</div>
	</div>
</section>

<!-- Initiatives Section -->
<section class="initiatives">
	<div class="container">
		<div class="initiative-header">
			<span class="title-dep"><?php esc_html_e( 'Initiatives', 'our-mission' ); ?></span>
			<h2 class="title-default"><?php echo wp_kses_post( __( 'What we <span class="highlighted">are working</span> on now' ), 'our-mission' ); ?></h2>
			<p class="text-default"><?php esc_html_e( 'It was popularised in the 1960s with the release of Letraset sheets containing', 'our-mission' ); ?> </p>
			<!-- Slick slider arrows -->
			<div class="kh-slick-arr"></div>
		</div>
		<div class="initiative-items">
		<?php
			$initiative_args = array(
				'post_type'      => 'initiatives',
				'posts_per_page' => -1,
			);
			$initiatives     = get_posts( $initiative_args );
			?>
		<?php foreach ( $initiatives as $post ) : ?>
			<?php setup_postdata( $post ); ?>
		<div class="initiative-item">
			<div class="initiative-item-header">
				<div class="district-initiative">
					<?php
					$selected_district = get_field( 'initiative_district', $post->ID );
					$all_disctricts    = our_mission_get_disctricts();

					?>
					<?php if ( array_key_exists( $selected_district, $all_disctricts ) ) : ?>
						<?php echo esc_html( $all_disctricts[ $selected_district ] ); ?>
						<?php endif; ?>
				</div>

				<?php
				$selected_status = get_field( 'initiative_status', $post->ID );
				$all_statuses    = our_mission_get_statuses();

				?>
				<?php if ( array_key_exists( $selected_status, $all_statuses ) ) : ?>
					<?php
					switch ( $selected_status ) {
						case 'on-keep':
							?>
							<div class="status-initiative keep">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M11.6667 3L15 6.33333L6.33333 15H3V11.6667L11.6667 3Z" stroke="#8660F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>

							<?php echo esc_html( $all_statuses[ $selected_status ] ); ?>
						</div>
							<?php
							break;
						case 'completed':
							?>
								<div class="status-initiative completed">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M15 6L8.125 13L5 9.81818" stroke="#16B308" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>

							<?php echo esc_html( $all_statuses[ $selected_status ] ); ?>
						</div>
								<?php
							break;
						case 'on-consider':
							?>
											<div class="status-initiative consider">
											<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.99885 15.2999C12.5611 15.2999 15.4489 12.4122 15.4489 8.84992C15.4489 5.28767 12.5611 2.3999 8.99885 2.3999C5.4366 2.3999 2.54883 5.28767 2.54883 8.84992C2.54883 12.4122 5.4366 15.2999 8.99885 15.2999Z" stroke="#E7A600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M9 4.97998V8.84999L11.58 10.14" stroke="#E7A600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
	
							<?php echo esc_html( $all_statuses[ $selected_status ] ); ?>
									</div>
											<?php
							break;
						case 'denied':
							?>
							<div class="status-initiative denied">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M12.6004 5.3999L5.40039 12.5999" stroke="#BC403A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M5.40039 5.3999L12.6004 12.5999" stroke="#BC403A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
				
							<?php echo esc_html( $all_statuses[ $selected_status ] ); ?>
							</div>
							<?php
							break;
					}

						endif;
				?>
			</div>
			<h5 class="initiative-item-title">
			<?php echo get_the_title(); ?>
			</h5>
			<div class="initiative-item-excerpt">
			<?php echo wp_trim_words( get_the_content(), 20 ); ?>
			</div>
			<div class="votes-initiative-block">
						<?php
						$required_votes = get_field( 'required_votes', $post->ID );
						$accepted_votes = get_field( 'accepted_votes', $post->ID );
						$round_votes    = (int) $accepted_votes / (int) $required_votes * 100;
						?>
				<div class="voted-header">
					<div class="votes-initiative"><?php printf( '<span>%d</span> signatures', $accepted_votes ); ?> </div>
					<div class="votes-initiative-percent"><?php echo esc_html( floor( $round_votes ) . '%' ); ?></div>
				</div>
				<span class="range-total">
					
						<span class="range-completed" style="width: <?php echo esc_html( $round_votes . '%' ); ?>"></span>
					
				</span>
				<?php
					$date_created = get_the_date( 'Y-m-d' );
					$date_now     = new DateTime( 'now' );

					$expiry_date_object = DateTime::createFromFormat( 'Y-m-d', $date_created );
					// expiry date is 100 days from $date_created;
					$expiry_date = $expiry_date_object->add( new DateInterval( 'P100D' ) );
					$interval    = $expiry_date->diff( $date_now )->format( '%a' );

				?>
				<?php if ( $date_now->format( 'Y-m-d' ) < $expiry_date->format( 'Y-m-d' ) ) : ?>
					<div class="dates-to-expire">
						<?php printf( _n( '%s day left', '%s days left', $interval, 'our-mission' ), $interval ); ?>

					</div>
				<?php endif; ?>
			</div>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more-blue"> <?php esc_html_e( 'Read more', 'our-mission' ); ?>
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4.16602 10H15.8327" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M11.5 5L16.5 10L11.5 15" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</a>
		</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<div class="read-more-wrapper">
			<a href="<?php echo esc_url( get_post_type_archive_link( 'initiatives' ) ); ?>" class="btn-oulined-blue"><?php esc_html_e( 'All initiatives', 'our-mission' ); ?>
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4.16602 10H15.8327" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M11.5 5L16.5 10L11.5 15" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</a>
		</div>
	</div>
</section>

<!-- Initiative Banner -->
<?php get_template_part('templates/initiative-banner') ?>

<!--  Events Section  -->
<section class="activities">

	<div class="container">
		<div class="activities-header">
			<div>
				<h2 class="title-default">Upcoming events</h2>
				<p class="text-default">It was popularised in the 1960s with the release of Letraset sheets containing. It wase of Letraset sheets containing  </p>
			</div>
			<div class="read-more-wrapper">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'events' ) ); ?>" class="btn-oulined-blue"> All events
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M4.16602 10H15.8327" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M11.5 5L16.5 10L11.5 15" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
			</div>
		</div>
		<div class="activities-content">

			<div class="activities-content-nav">
			<?php
			$date_now            = new DateTime( 'now', new DateTimeZone( wp_timezone_string() ) );
					$events_args = array(
						'post_type'      => 'events',
						'posts_per_page' => 6,
						'orderby'        => 'meta_value',
						'order'          => 'ASC',
						'meta_query'     => array(
							array(
								'key'     => 'date_event',
								'value'   => $date_now->format( 'Y-m-d H:i:s' ),
								'compare' => '>',
							),
						),
					);
					$events      = get_posts( $events_args );
					?>
				<?php foreach ( $events as $key => $post ) : ?>
					<?php setup_postdata( $post ); ?>
					<?php

					$date_event = get_field( 'date_event', $post->ID );
					?>
					<div class="activities-nav-item  <?php echo 0 === $key ? 'active' : ''; ?>" data-nav="<?php echo esc_attr( 'ac-' . $key ); ?>">
						<span class="activity-date">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15.4444 4.40039H4.55556C3.69645 4.40039 3 5.02718 3 5.80036V15.6002C3 16.3734 3.69645 17.0001 4.55556 17.0001H15.4444C16.3036 17.0001 17 16.3734 17 15.6002V5.80036C17 5.02718 16.3036 4.40039 15.4444 4.40039Z" stroke="#8C96A3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M3 8.6001H17" stroke="#8C96A3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M13.1094 3V5.79995" stroke="#8C96A3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M6.89062 3V5.79995" stroke="#8C96A3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							</svg>

							<span><?php echo wp_date( 'j F Y', strtotime( $date_event ) ); ?></span>
						</span>
						<h4><?php echo wp_kses_post( get_the_title() ); ?></h4>
					</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
			
			</div>
			<div class="activities-content-tabs">
			<?php foreach ( $events as $key => $post ) : ?>
					<?php setup_postdata( $post ); ?>
					<?php
					$date_event = get_field( 'date_event', $post->ID );
					$due_date   = get_gmt_from_date( $date_event );
					?>
					<div class="activities-content-tab <?php echo 0 === $key ? 'active' : ''; ?>" id="<?php echo esc_attr( 'ac-' . $key ); ?>">
						<div class="activities-thumb">
						   <?php the_post_thumbnail( 'full' ); ?>
						</div>
						<div class="activities-centered">
							<div class="activities-desc">
							<?php echo wp_kses_post( get_the_content() ); ?>
							</div>
							<span><?php esc_html_e( 'To the event remains:', 'our-mission' ); ?></span>
							<div class="kh-widget-countdown_kvitna" data-id="<?php echo esc_attr( 'count-' . $key ); ?>" >
								<div class="kh-countdown-wrapper" data-date="<?php echo strtotime( $due_date ); ?>">
									<div class="kh-countdown-item">
										<div class="kh-countdown-days kh-countdown-digitals">
											
										</div>

										<div class="kh-countdown-label">
											<?php esc_html_e( 'Days', 'our-mission' ); ?>
										</div>
									</div>
									<div class="kh-countdown-item">
										<div class="kh-countdown-hours kh-countdown-digitals">
											
										</div>

										<div class="kh-countdown-label">
											<?php esc_html_e( 'Hours', 'our-mission' ); ?>
										</div>
									</div>
									<div class="kh-countdown-item">
										<div class="kh-countdown-minutes kh-countdown-digitals">
											
										</div>

										<div class="kh-countdown-label">
											<?php esc_html_e( 'Minutes', 'our-mission' ); ?>
										</div>
									</div>
								</div>
							</div>
							<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more-blue"><?php esc_html_e( 'See details', 'our-mission' ); ?> 
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M4.16602 10H15.8327" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M11.5 5L16.5 10L11.5 15" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</a>
						</div>
					</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
			</div>
		</div>
		<div class="read-more-wrapper mobile">
			<a href="<?php echo esc_url( get_post_type_archive_link( 'events' ) ); ?>" class="btn-oulined-blue"> <?php esc_html_e( 'All events', 'our-mission' ); ?>
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4.16602 10H15.8327" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M11.5 5L16.5 10L11.5 15" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</a>
		</div>
	</div>
</section>

<!-- Appeal Banner -->
<?php get_template_part('templates/appeal-banner') ?>

<!-- Charity Section -->
<?php
get_footer();
