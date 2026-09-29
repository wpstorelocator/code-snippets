add_filter( 'wpsl_map_shortcode_defaults', 'custom_map_shortcode_defaults' );

function custom_map_shortcode_defaults( $shortcode_defaults ) {

    // Make every [wpsl_map] 500px high, unless the shortcode sets its own height.
    $shortcode_defaults['height'] = 500;

    // Turn off scroll wheel zooming on these maps. The [wpsl] map keeps the setting from the Map tab.
    $shortcode_defaults['scrollwheel'] = 0;

    return $shortcode_defaults;
}
