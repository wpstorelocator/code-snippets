add_filter( 'wpsl_sql', 'custom_wpsl_sql' );

function custom_wpsl_sql( $sql ) {

    global $wpdb;

    // Only return locations that have a featured image. The condition is added
    // to the existing WHERE clause, so the rest of the query keeps working.
    $sql = str_replace(
        "WHERE posts.post_type = 'wpsl_stores'",
        "WHERE posts.post_type = 'wpsl_stores'
           AND EXISTS ( SELECT 1 FROM $wpdb->postmeta AS thumb WHERE thumb.post_id = posts.ID AND thumb.meta_key = '_thumbnail_id' )",
        $sql
    );

    return $sql;
}
