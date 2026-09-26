add_filter( 'wpsl_store_header_template', 'custom_store_header_template', 10, 2 );

/**
 * The $location is 'listing' ( search results ), 'info_window' ( marker popup
 * on the store locator ) or 'wpsl_map' ( marker popup from the [wpsl_map] shortcode ).
 */
function custom_store_header_template( $header_template, $location ) {

    $sections = wpsl_get_service( 'template_sections' );
    $settings = wpsl_get_service( 'wpsl_settings' );

    $new_window = $sections->new_window(); // Opens the link in a new window if that's enabled on the settings page

    if ( $settings->get( 'local_pages', 'permalinks' ) ) {

        // The [wpsl_map] shortcode doesn't always include the permalink, so check for it.
        if ( $location == 'wpsl_map' ) {
            $header_template = '<% if ( typeof permalink !== "undefined" && permalink ) { %>' . "\r\n";
            $header_template .= '<strong class="wpsl-location-name"><a tabindex="0"' . $new_window . ' href="<%= permalink %>"><%= store %></a></strong>' . "\r\n";
            $header_template .= '<% } else { %>' . "\r\n";
            $header_template .= '<strong><%= store %></strong>' . "\r\n";
            $header_template .= '<% } %>';
        } else {
            $header_template = '<strong class="wpsl-location-name"><a tabindex="0"' . $new_window . ' href="<%= permalink %>"><%= store %></a></strong>';
        }
    } else {

        // Link to the store URL if "Make the store name clickable if a store URL exists?" is enabled.
        $header_template = '<% if ( wpslSettings.storeUrl == 1 && url ) { %>' . "\r\n";
        $header_template .= '<strong class="wpsl-location-name"><a tabindex="0"' . $new_window . ' href="<%= url %>"><%= store %></a></strong>' . "\r\n";
        $header_template .= '<% } else { %>' . "\r\n";
        $header_template .= '<strong><%= store %></strong>' . "\r\n";
        $header_template .= '<% } %>';
    }

    /**
     * Include the data from a custom field called 'my_textinput' below the store name.
     *
     * On the store locator, fields created in Store Locator > Settings > Fields Manager
     * are included automatically. For other custom fields, add them to the location data
     * with the wpsl_frontend_meta_fields filter.
     *
     * In the marker popup of the [wpsl_map] shortcode ( 'wpsl_map' location ), no custom
     * fields are included. Add them with the wpsl_cpt_info_window_meta_fields filter.
     */
    $header_template .= "\r\n" . '<% if ( typeof my_textinput !== "undefined" && my_textinput ) { %>' . "\r\n";
    $header_template .= '<span class="wpsl-store-subtitle"><%= my_textinput %></span>' . "\r\n";
    $header_template .= '<% } %>';

    return $header_template;
}
