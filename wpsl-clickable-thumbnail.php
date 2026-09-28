add_filter( 'wpsl_listing_template', 'custom_listing_template_clickable_thumb' );

function custom_listing_template_clickable_thumb( $listing_template ) {

    $sections = wpsl_get_service( 'template_sections' );
    $settings = wpsl_get_service( 'wpsl_settings' );

    // Link to the store page when permalinks are enabled, otherwise to the store URL.
    $field      = $settings->get( 'local_pages', 'permalinks' ) ? 'permalink' : 'url';
    $new_window = $sections->new_window();

    // The thumbnail placeholder in the default template.
    $thumb = '<%= typeof thumb !== "undefined" ? thumb : "" %>';

    // Only add the link when the store has a thumbnail and a link target.
    $has_thumb = 'typeof thumb !== "undefined" && thumb';
    $has_link  = 'typeof ' . $field . ' !== "undefined" && ' . $field;

    $linked_thumb = '<% if ( ' . $has_thumb . ' && ' . $has_link . ' ) { %>';
    $linked_thumb .= '<a href="<%= ' . $field . ' %>"' . $new_window . '>' . $thumb . '</a>';
    $linked_thumb .= '<% } else { %>' . $thumb . '<% } %>';

    $listing_template = str_replace( $thumb, $linked_thumb, $listing_template );

    return $listing_template;
}
