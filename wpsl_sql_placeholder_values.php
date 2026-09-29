add_filter( 'wpsl_sql_placeholder_values', 'custom_sql_placeholder_values' );

function custom_sql_placeholder_values( $placeholder_values ) {

    /*
     * The values for the two %s placeholders added in custom_hide_flagged_sql().
     * They have to go right after the first 4 values ( earth radius, lat, lng, lat ),
     * because that is where the placeholders are in the query.
     */
    array_splice( $placeholder_values, 4, 0, [ 'wpsl_hide_in_search', '1' ] );

    return $placeholder_values;
}

add_filter( 'wpsl_sql', 'custom_hide_flagged_sql' );

function custom_hide_flagged_sql( $sql ) {

    global $wpdb;

    // Skip locations where the "Hide in search" checkbox is checked.
    $sql = str_replace(
        "WHERE posts.post_type = 'wpsl_stores'",
        "WHERE posts.post_type = 'wpsl_stores'
           AND NOT EXISTS ( SELECT 1 FROM $wpdb->postmeta AS hide_flag WHERE hide_flag.post_id = posts.ID AND hide_flag.meta_key = %s AND hide_flag.meta_value = %s )",
        $sql
    );

    return $sql;
}
