add_filter( 'wpsl_cluster_marker_colors', 'custom_cluster_marker_colors' );

function custom_cluster_marker_colors( $colors ) {

    // Keep the low density color from the Markers settings, and change the other two.
    $colors['high_density_color'] = '#ffff00';
    $colors['label_color']        = '#000000';

    return $colors;
}
