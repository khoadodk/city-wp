<?php

/**
 * All districts.
 *
 * @return array
 */
function our_mission_get_disctricts() {
	return array(
		'miller_harbour' => __( 'Miller harbour', 'our-mission' ),
		'crime_alley'    => __( 'Crime alley', 'our-mission' ),
		'the_bowery'     => __( 'The Bowery', 'our-mission' ),
		'little_italy'   => __( 'Little Italy', 'our-mission' ),
		'bloodhaven'     => __( 'Bloodhaven', 'our-mission' ),
		'otisburg'       => __( 'Otisburg', 'our-mission' ),
	);
}

/**
 * All initiatives statuses.
 *
 * @return array
 */
function our_mission_get_statuses() {

	return array(
		'on-keep'     => __( 'Collection is going', 'our-mission' ),
		'completed'   => __( 'Collection completed', 'our-mission' ),
		'on-consider' => __( 'Under consideration', 'our-mission' ),
		'denied'      => __( 'Not supported', 'our-mission' ),
	);
}

/**
 * Output filters on news page.
 */
function our_mission_get_categories_html() {
	$categories = get_categories(
		array(
			'taxonomy' => 'category',
			'type'     => 'post',
			'orderby'  => 'name',
			'order'    => 'ASC',
		)
	);
	echo '<ul>';
	echo '<li><a href="' . esc_url( get_post_type_archive_link( 'post' ) ) . '" class="' . ( isset( $_GET['cat'] ) ? '' : 'active' ) . '">' . __( 'All news', 'our-mission' ) . '</a></li>';
	foreach ( $categories as $cat ) {
		echo '<li><a href="' . esc_url( add_query_arg( array( 'cat' => $cat->term_id ), get_post_type_archive_link( 'post' ) ) ) . '" class="' . ( isset( $_GET['cat'] ) && (int) $_GET['cat'] === $cat->term_id ? 'active' : '' ) . '">' . esc_html( $cat->name ) . '</a></li>';
	}
	echo '</ul>';
}
