add_filter( 'wpsl_store_header_template', 'custom_store_header_template', 10, 2 );

function custom_store_header_template( $header_template, $location ) {

    $sections = wpsl_get_service( 'template_sections' );
    $settings = wpsl_get_service( 'wpsl_settings' );

    if ( $settings->get( 'local_pages', 'permalinks' ) ) {
        $header_template = '<% if ( typeof permalink !== "undefined" && permalink ) { %>' . "\r\n";
        $header_template .= '<h3 class="wpsl-location-name"><a' . $sections->new_window() . ' href="<%= permalink %>"><%= store %></a></h3>' . "\r\n";
        $header_template .= '<% } else { %>' . "\r\n";
        $header_template .= '<h3><%= store %></h3>' . "\r\n";
        $header_template .= '<% } %>';
    } else {
        $header_template = '<% if ( wpslSettings.storeUrl == 1 && url ) { %>' . "\r\n";
        $header_template .= '<h3 class="wpsl-location-name"><a' . $sections->new_window() . ' href="<%= url %>"><%= store %></a></h3>' . "\r\n";
        $header_template .= '<% } else { %>' . "\r\n";
        $header_template .= '<h3><%= store %></h3>' . "\r\n";
        $header_template .= '<% } %>';
    }

    return $header_template;
}
