add_filter( 'wpsl_listing_template', 'custom_listing_template' );

function custom_listing_template( $listing_template ) {

    $sections = wpsl_get_service( 'template_sections' );
    $settings = wpsl_get_service( 'wpsl_settings' );

    $listing_template = '<li data-store-id="<%= id %>">' . "\r\n";
    $listing_template .= "\t" . '<div class="wpsl-store-location">' . "\r\n";
    $listing_template .= "\t\t" . '<p><%= typeof thumb !== "undefined" ? thumb : "" %>' . "\r\n";

    // Linked or plain store name
    $listing_template .= "\t\t\t" . $sections->store_header( 'listing' ) . "\r\n"; 
    $listing_template .= "\t\t\t" . '<span class="wpsl-street"><%= address %></span>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<span class="wpsl-street"><%= address2 %></span>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";

    // Address format from the settings page
    $listing_template .= "\t\t\t" . '<span>' . $sections->format_address() . '</span>' . "\r\n";

    if ( ! $settings->get( 'ux', 'hide_country' ) ) {
        $listing_template .= "\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
    }

    $listing_template .= "\t\t" . '</p>' . "\r\n";

    // The typeof check keeps the template working for locations without the field.
    $listing_template .= "\t\t" . '<% if ( typeof my_textinput !== "undefined" && my_textinput ) { %>' . "\r\n";
    $listing_template .= "\t\t" . '<p><%= my_textinput %></p>' . "\r\n";
    $listing_template .= "\t\t" . '<% } %>' . "\r\n";

    // Show the phone, fax and email if "Below the address in the search results" is selected.
    if ( in_array( 'search_results', (array) $settings->get( 'ux', 'contact_details', [] ), true ) ) {
        $listing_template .= $sections->contact_details();
    }

    // The "More info" link and content
    $listing_template .= "\t\t" . $sections->more_info_template() . "\r\n"; 
    $listing_template .= "\t" . '</div>' . "\r\n";
    $listing_template .= "\t" . '<div class="wpsl-direction-wrap">' . "\r\n";

    if ( ! $settings->get( 'ux', 'hide_distance' ) ) {
        $listing_template .= "\t\t" . '<span class="wpsl-distance"><%= distance %> {{wpsl_get_distance_unit()}}</span>' . "\r\n";
    }

    $listing_template .= "\t\t" . '<%= createDirectionUrl() %>' . "\r\n";
    $listing_template .= "\t" . '</div>' . "\r\n";
    $listing_template .= '</li>';

    return $listing_template;
}
