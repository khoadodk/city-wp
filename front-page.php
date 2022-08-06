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

<?php
get_footer();
