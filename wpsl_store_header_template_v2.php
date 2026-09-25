// Store permalinks enabled
add_filter( 'wpsl_store_header_template', 'custom_store_header_template' );

function custom_store_header_template() {
    $header_template = '<h3><a href="<%= permalink %>"><%= store %></a></h3>';

    return $header_template;
}

// Store permalinks disabled
add_filter( 'wpsl_store_header_template', 'custom_store_header_template' );

function custom_store_header_template() {
    $header_template = '<% if ( wpslSettings.storeUrl == 1 && url ) { %>' . "\r\n";
    $header_template .= '<h3><a href="<%= url %>"><%= store %></a></h3>' . "\r\n";
    $header_template .= '<% } else { %>' . "\r\n";
    $header_template .= '<h3><%= store %></h3>' . "\r\n";
    $header_template .= '<% } %>';

    return $header_template;
}
