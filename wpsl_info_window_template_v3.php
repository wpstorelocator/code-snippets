add_filter( 'wpsl_info_window_template', 'custom_info_window_template' );

function custom_info_window_template() {

    $sections = wpsl_get_service( 'template_sections' );
    $settings = wpsl_get_service( 'wpsl_settings' );

    $icons           = $settings->get( 'appearance', 'icons', [] );
    $icons_enabled   = ! empty( $icons['enabled'] );
    $contact_details = (array) $settings->get( 'ux', 'contact_details', [] );
    $hours           = (array) $settings->get( 'ux', 'hours', [] );
    $description     = (array) $settings->get( 'ux', 'description', [] );

    $info_window_template = '<div data-store-id="<%= id %>" class="wpsl-info-window">' . "\r\n";

    // The store name and address.
    if ( $icons_enabled ) {
        $address_icon = isset( $icons['address'] ) ? $icons['address'] : 'marker';

        $info_window_template .= "\t" . '<p class="wpsl-icon-address wpsl-icon-address-' . esc_attr( $address_icon ) . '">' . "\r\n";
        $info_window_template .= "\t\t" . '<span class="wpsl-location-content">' . "\r\n";
    } else {
        $info_window_template .= "\t" . '<p>' . "\r\n";
    }

    $info_window_template .= "\t\t" . $sections->store_header() . "\r\n"; // Linked or plain store name
    $info_window_template .= "\t\t" . '<span class="wpsl-street"><%= address %></span>' . "\r\n";
    $info_window_template .= "\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span class="wpsl-street"><%= address2 %></span>' . "\r\n";
    $info_window_template .= "\t\t" . '<% } %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span>' . $sections->format_address() . '</span>' . "\r\n"; // Address format from the settings page

    if ( $icons_enabled ) {
        $info_window_template .= "\t\t" . '</span>' . "\r\n";
    }

    $info_window_template .= "\t" . '</p>' . "\r\n";

    /**
     * Include the data from a custom field called 'my_textinput'.
     *
     * Fields created in Store Locator > Settings > Fields Manager are included
     * automatically. For other custom fields, add them to the location data
     * with the wpsl_frontend_meta_fields filter.
     *
     * The typeof check keeps the template working for locations without the field.
     */
    $info_window_template .= "\t" . '<% if ( typeof my_textinput !== "undefined" && my_textinput ) { %>' . "\r\n";
    $info_window_template .= "\t" . '<p><%= my_textinput %></p>' . "\r\n";
    $info_window_template .= "\t" . '<% } %>' . "\r\n";

    // The phone, fax and email, if "In the marker popup" is selected for the contact details.
    if ( in_array( 'marker_popup', $contact_details, true ) ) {
        $info_window_template .= $sections->contact_details();
    }

    // The short open / closed status, if "In the marker popup" is selected for the opening hours and the status is enabled.
    if ( in_array( 'marker_popup', $hours, true ) && $settings->get( 'ux', 'show_hour_status' ) ) {
        $info_window_template .= "\t" . '<% if ( typeof hours_status !== "undefined" && hours_status && ( typeof location_status === "undefined" || !location_status ) ) { %>' . "\r\n";

        if ( $icons_enabled ) {
            $info_window_template .= "\t" . '<div class="wpsl-icon-hours"><%= hours_status %></div>' . "\r\n";
        } else {
            $info_window_template .= "\t" . '<%= hours_status %>' . "\r\n";
        }

        $info_window_template .= "\t" . '<% } %>' . "\r\n";
    }

    // The post content, if "In the marker popup" is selected for the post content.
    if ( in_array( 'marker_popup', $description, true ) ) {
        $info_window_template .= "\t" . '<% if ( typeof description !== "undefined" && description ) { %>' . "\r\n";
        $info_window_template .= "\t" . '<p><%= description %></p>' . "\r\n";
        $info_window_template .= "\t" . '<% } %>' . "\r\n";
    }

    // The "temporarily closed" or "permanently closed" notice.
    $status_class = ( $icons_enabled ) ? 'wpsl-location-status wpsl-icon-attention' : 'wpsl-location-status';

    $info_window_template .= "\t" . '<% if ( typeof location_status !== "undefined" && location_status ) { %>' . "\r\n";
    $info_window_template .= "\t" . '<p class="' . esc_attr( $status_class ) . '"><%= location_status %></p>' . "\r\n";
    $info_window_template .= "\t" . '<% } %>' . "\r\n";

    // The directions, street view and zoom links, plus the "More details" link when it's enabled.
    $info_window_template .= "\t" . '<%= createInfoWindowActions( id, url, typeof permalink !== "undefined" ? permalink : "" ) %>' . "\r\n";
    $info_window_template .= '</div>';

    return $info_window_template;
}
