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