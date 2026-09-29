add_filter( 'wpsl_direction_travel_mode', 'custom_direction_travel_mode' );

function custom_direction_travel_mode( $mode ) {

    // Each map provider has its own name for walking directions.
    $walking = [
        'gmaps'  => 'walking',
        'mapbox' => 'walking',
        'osm'    => 'foot-walking',
        'stadia' => 'walking',
    ];

    $map_service = wpsl_get_active_map_service();

    if ( isset( $walking[ $map_service ] ) ) {
        $mode = $walking[ $map_service ];
    }

    return $mode;
}
