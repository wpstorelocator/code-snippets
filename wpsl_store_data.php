add_filter( 'wpsl_store_data', 'custom_store_data' );

function custom_store_data( $store_data ) {

    $featured = array();
    $other    = array();

    // Move the stores in the category with the slug "flagship" to the top of the results.
    foreach ( $store_data as $store ) {
        if ( has_term( 'flagship', 'wpsl_store_category', $store['id'] ) ) {
            $featured[] = $store;
        } else {
            $other[] = $store;
        }
    }

    return array_merge( $featured, $other );
}
