// v2
$listing_template .= wpsl_store_header_template( 'listing' );

// v3
$sections = wpsl_get_service( 'template_sections' );

$listing_template .= $sections->store_header( 'listing' );
