// v2
$listing_template .= '<%= distance %> ' . esc_html( $wpsl_settings['distance_unit'] );

// v3: the {{...}} tag goes inside the template string, and follows the shortcode's distance_unit attribute
$listing_template .= '<%= distance %> {{wpsl_get_distance_unit()}}';
