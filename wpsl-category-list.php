$terms = wp_get_post_terms( $queried_object->ID, 'wpsl_store_category' );

if ( $terms && ! is_wp_error( $terms ) ) {
    $term_links = [];

    foreach ( $terms as $term ) {
        $term_links[] = '<a href="' . esc_url( get_term_link( $term->term_id, 'wpsl_store_category' ) ) . '">' . esc_html( $term->name ) . '</a>';
    }

    echo esc_html__( 'Categories:', 'wp-store-locator' ) . ' ' . implode( ', ', $term_links );
}
