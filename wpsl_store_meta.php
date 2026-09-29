add_filter( 'wpsl_store_meta', 'custom_store_meta', 10, 2 );

function custom_store_meta( $store_meta, $store_id ) {

    $store_meta['extra_data'] = 'your extra data';

    return $store_meta;
}
