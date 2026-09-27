add_filter( 'do_shortcode_tag', 'custom_wpsl_address_field', 10, 3 );

function custom_wpsl_address_field( $output, $tag, $attr ) {

    if ( $tag !== 'wpsl_address' ) {
        return $output;
    }

    // The store from the id attribute, or the store page that's being viewed.
    $store_id     = ! empty( $attr['id'] ) ? absint( $attr['id'] ) : get_the_ID();
    $my_textinput = get_post_meta( $store_id, 'wpsl_my_textinput', true );

    if ( ! $my_textinput ) {
        return $output;
    }

    $field = '<p class="wpsl-my-textinput">' . esc_html( $my_textinput ) . '</p>';

    // Add the field above the directions link, or at the end of the address block.
    if ( strpos( $output, '<div class="wpsl-location-directions">' ) !== false ) {
        return str_replace( '<div class="wpsl-location-directions">', $field . '<div class="wpsl-location-directions">', $output );
    }

    $position = strrpos( $output, '</div>' );

    return ( $position === false ) ? $output . $field : substr_replace( $output, $field, $position, 0 );
}
