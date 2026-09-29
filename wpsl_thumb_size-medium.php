add_filter( 'wpsl_thumb_size', 'custom_thumb_size' );

function custom_thumb_size() {

    $size = 'medium';

    return $size;
}
