add_filter( 'wpsl_single_location_export_data', 'custom_single_location_export_data', 10, 2 );

function custom_single_location_export_data( $post_meta, $post_id ) {

    /*
     * Every new column needs a header and a value. The values are written
     * in the order they are added, so add both in the same order.
     */
    $post_meta['headers'][]    = 'name';
    $post_meta['data']['name'] = get_post_field( 'post_title', $post_id );

    // The store categories as a comma separated list.
    $categories = wp_get_post_terms( $post_id, 'wpsl_store_category', array( 'fields' => 'names' ) );

    $post_meta['headers'][]        = 'category';
    $post_meta['data']['category'] = is_wp_error( $categories ) ? '' : implode( ', ', $categories );

    // A custom field. With ACF you can use get_field( 'my_field', $post_id ) instead.
    $post_meta['headers'][]        = 'my_field';
    $post_meta['data']['my_field'] = get_post_meta( $post_id, 'my_field', true );

    return $post_meta;
}
