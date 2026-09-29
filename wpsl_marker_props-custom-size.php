add_filter( 'wpsl_marker_props', 'custom_marker_file_size' );

function custom_marker_file_size( $marker_props ) {

    /*
     * 'geometry' holds the size of the marker images from your own marker folder,
     * read from the files themselves. Show them 32 pixels wide instead,
     * and keep their proportions.
     */
    if ( ! empty( $marker_props['geometry'] ) ) {
        foreach ( $marker_props['geometry'] as $src => $size ) {
            $marker_props['geometry'][ $src ] = [
                'width'  => 32,
                'height' => (int) round( $size['height'] * 32 / $size['width'] ),
            ];
        }
    }

    return $marker_props;
}
