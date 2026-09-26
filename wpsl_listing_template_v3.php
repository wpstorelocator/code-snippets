add_filter( 'wpsl_listing_template', 'custom_listing_template' );

function custom_listing_template() {

    $sections = wpsl_get_service( 'template_sections' );
    $settings = wpsl_get_service( 'wpsl_settings' );

    $icons           = $settings->get( 'appearance', 'icons', [] );
    $icons_enabled   = ! empty( $icons['enabled'] );
    $cta             = $settings->get( 'appearance', 'cta', [] );
    $contact_details = (array) $settings->get( 'ux', 'contact_details', [] );
    $hours           = (array) $settings->get( 'ux', 'hours', [] );
    $description     = (array) $settings->get( 'ux', 'description', [] );
    $is_name_search  = $sections->is_name_search();

    $listing_template = '<li data-store-id="<%= id %>">' . "\r\n";
    $listing_template .= "\t" . '<div class="wpsl-store-location">' . "\r\n";

    // The thumbnail, store name and address.
    if ( $icons_enabled ) {
        $address_icon = isset( $icons['address'] ) ? $icons['address'] : 'marker';

        $listing_template .= "\t\t" . '<p class="wpsl-icon-address wpsl-icon-address-' . esc_attr( $address_icon ) . '"><%= typeof thumb !== "undefined" ? thumb : "" %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<span class="wpsl-location-content">' . "\r\n";
    } else {
        $listing_template .= "\t\t" . '<p><%= typeof thumb !== "undefined" ? thumb : "" %>' . "\r\n";
    }

    $listing_template .= "\t\t\t" . $sections->store_header( 'listing' ) . "\r\n"; // Linked or plain store name
    $listing_template .= "\t\t\t" . '<span class="wpsl-street"><%= address %></span>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<span class="wpsl-street"><%= address2 %></span>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<span>' . $sections->format_address() . '</span>' . "\r\n"; // Address format from the settings page

    if ( ! $settings->get( 'ux', 'hide_country' ) ) {
        $listing_template .= "\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
    }

    if ( $icons_enabled ) {
        $listing_template .= "\t\t\t" . '</span>' . "\r\n";
    }

    $listing_template .= "\t\t" . '</p>' . "\r\n";

    /**
     * Include the data from a custom field called 'my_textinput'.
     *
     * Fields created in Store Locator > Settings > Fields Manager are included
     * automatically. For other custom fields, add them to the location data
     * with the wpsl_frontend_meta_fields filter.
     *
     * The typeof check keeps the template working for locations without the field.
     */
    $listing_template .= "\t\t" . '<% if ( typeof my_textinput !== "undefined" && my_textinput ) { %>' . "\r\n";
    $listing_template .= "\t\t" . '<p><%= my_textinput %></p>' . "\r\n";
    $listing_template .= "\t\t" . '<% } %>' . "\r\n";

    // The phone, fax and email, if "Below the address in the search results" is selected for the contact details.
    if ( in_array( 'search_results', $contact_details, true ) ) {
        $listing_template .= $sections->contact_details();
    }

    // The opening hours, if "Below the address in the search results" is selected for the opening hours.
    if ( in_array( 'search_results', $hours, true ) ) {
        $listing_template .= "\t\t" . '<% if ( typeof hours !== "undefined" && hours ) { %>' . "\r\n";

        if ( $icons_enabled ) {
            $listing_template .= "\t\t" . '<div class="wpsl-icon-hours"><%= hours %></div>' . "\r\n";
        } else {
            $listing_template .= "\t\t" . '<%= hours %>' . "\r\n";
        }

        $listing_template .= "\t\t" . '<% } %>' . "\r\n";
    }

    // The "temporarily closed" or "permanently closed" notice.
    $status_class = ( $icons_enabled ) ? 'wpsl-location-status wpsl-icon-attention' : 'wpsl-location-status';

    $listing_template .= "\t\t" . '<% if ( typeof location_status !== "undefined" && location_status ) { %>' . "\r\n";
    $listing_template .= "\t\t" . '<p class="' . esc_attr( $status_class ) . '"><%= location_status %></p>' . "\r\n";
    $listing_template .= "\t\t" . '<% } %>' . "\r\n";

    // The post content, if "Below the address in the search results" is selected for the post content.
    if ( in_array( 'search_results', $description, true ) ) {
        $listing_template .= "\t\t" . '<% if ( typeof description !== "undefined" && description ) { %>' . "\r\n";
        $listing_template .= "\t\t" . '<p><%= description %></p>' . "\r\n";
        $listing_template .= "\t\t" . '<% } %>' . "\r\n";
    }

    // The "More info" link and content, if any of the "Location(s) of ..." settings includes the "more info" section.
    if ( in_array( 'more_info', $contact_details, true ) || in_array( 'more_info', $hours, true ) || in_array( 'more_info', $description, true ) ) {
        $listing_template .= "\t\t" . $sections->more_info_template() . "\r\n";
    }

    $listing_template .= "\t" . '</div>' . "\r\n";

    // The directions link moves to its own section when the links are styled as buttons, or the "More details" link is enabled.
    $cta_details     = ! empty( $cta['details'] );
    $has_cta_section = ! empty( $cta['enabled'] ) || $cta_details;

    // A search by store name has no distance or route, so the wrapper is left out.
    if ( ! $is_name_search ) {
        $listing_template .= "\t" . '<div class="wpsl-direction-wrap">' . "\r\n";

        if ( ! $settings->get( 'ux', 'hide_distance' ) ) {
            $distance_class = ( $icons_enabled ) ? 'wpsl-distance wpsl-icon-road' : 'wpsl-distance';

            $listing_template .= "\t\t" . '<% if ( typeof distance !== "undefined" ) { %>' . "\r\n";
            $listing_template .= "\t\t" . '<span class="' . esc_attr( $distance_class ) . '"><%= distance %> <% if ( typeof distance_unit !== "undefined" ) { %><%= distance_unit %><% } else { %>{{wpsl_get_distance_unit()}}<% } %></span>' . "\r\n";
            $listing_template .= "\t\t" . '<% } %>' . "\r\n";
        }

        if ( ! $has_cta_section ) {
            $listing_template .= "\t\t" . '<%= createDirectionUrl() %>' . "\r\n";
        }

        $listing_template .= "\t" . '</div>' . "\r\n";
    }

    if ( $has_cta_section && ( $cta_details || ! $is_name_search ) ) {
        $listing_template .= $sections->cta_section( $cta_details, ! $is_name_search );
    }

    $listing_template .= '</li>';

    return $listing_template;
}
