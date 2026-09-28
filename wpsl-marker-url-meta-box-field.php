add_filter( 'wpsl_meta_box_fields', 'custom_meta_box_marker_url' );

function custom_meta_box_marker_url( $meta_fields ) {

    // Add the field to the bottom of the "Additional Information" tab.
    $tab = esc_html__( 'Additional Information', 'wp-store-locator' );

    $meta_fields[ $tab ]['alternate_marker_url'] = [
        'label' => esc_html__( 'Marker URL', 'your-textdomain' ),
        'type'  => 'url',
    ];

    return $meta_fields;
}
