add_filter( 'wpsl_thumb_attr', 'custom_thumb_attr' );

function custom_thumb_attr( $attr ) {

    $attr['class'] = 'wpsl-store-thumb custom-style';

    return $attr;
}
