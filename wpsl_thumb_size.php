add_filter( 'wpsl_thumb_size', 'custom_thumb_size' );

function custom_thumb_size() {

    $size = array( 100, 100 );

    return $size;
}
