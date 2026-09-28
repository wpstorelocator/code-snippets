add_filter( 'wpsl_store_meta', 'custom_store_meta_category_names', 10, 2 );

function custom_store_meta_category_names( $store_meta, $store_id ) {

    $terms = get_the_terms( $store_id, 'wpsl_store_category' );

    $store_meta['terms'] = '';

    if ( $terms && ! is_wp_error( $terms ) ) {
        $names = wp_list_pluck( $terms, 'name' );

        // Separate the names with a comma when a store is in more than one category.
        $store_meta['terms'] = esc_html( implode( ', ', $names ) );
    }

    return $store_meta;
}
