add_filter( 'wpsl_more_info_template', 'custom_more_info_template' );

function custom_more_info_template() {

    $sections = wpsl_get_service( 'template_sections' );
    $settings = wpsl_get_service( 'wpsl_settings' );

    $icons           = $settings->get( 'appearance', 'icons', [] );
    $icons_enabled   = ! empty( $icons['enabled'] );
    $contact_details = (array) $settings->get( 'ux', 'contact_details', [] );
    $hours           = (array) $settings->get( 'ux', 'hours', [] );
    $description     = (array) $settings->get( 'ux', 'description', [] );

    /**
     * Show the "More info" link when a location has data for one of the enabled
     * "more info" fields, or data in the custom 'my_textinput' field.
     */
    $more_info_template = '<% if ( hasMoreInfoData || ( typeof my_textinput !== "undefined" && my_textinput ) ) { %>' . "\r\n";
    $more_info_template .= "<p class='wpsl-more-info'><a class=\"wpsl-store-details wpsl-store-listing\" aria-expanded=\"false\" href=\"#wpsl-id-<%= id %>\">" . "{{wpsl_label( 'more_label' )}}" . '</a></p>' . "\r\n";
    $more_info_template .= "\t\t" . '<div id="wpsl-id-<%= id %>" class="wpsl-more-info-listings">' . "\r\n";

    // The phone, fax and email, if "In the more info section" is selected for the contact details.
    if ( in_array( 'more_info', $contact_details, true ) ) {
        $more_info_template .= "\t" . $sections->contact_details();
    }

    // The opening hours, if "In the more info section" is selected for the opening hours.
    if ( in_array( 'more_info', $hours, true ) ) {
        $more_info_template .= "\t\t\t" . '<% if ( typeof hours !== "undefined" && hours ) { %>' . "\r\n";

        if ( $icons_enabled ) {
            $more_info_template .= "\t\t\t" . '<div class="wpsl-store-hours wpsl-icon-hours"><%= hours %></div>' . "\r\n";
        } else {
            $more_info_template .= "\t\t\t" . '<div class="wpsl-store-hours"><strong>' . "{{wpsl_label( 'hours_label' )}}" . '</strong><%= hours %></div>' . "\r\n";
        }

        $more_info_template .= "\t\t\t" . '<% } %>' . "\r\n";
    }

    // The post content, if "In the more info section" is selected for the post content.
    if ( in_array( 'more_info', $description, true ) ) {
        $more_info_template .= "\t\t\t" . '<% if ( typeof description !== "undefined" && description ) { %>' . "\r\n";
        $more_info_template .= "\t\t\t" . '<%= description %>' . "\r\n";
        $more_info_template .= "\t\t\t" . '<% } %>' . "\r\n";
    }

    /**
     * Include the data from a custom field called 'my_textinput'.
     *
     * Fields created in Store Locator > Settings > Fields Manager are included
     * automatically. For other custom fields, add them to the location data
     * with the wpsl_frontend_meta_fields filter.
     */
    $more_info_template .= "\t\t\t" . '<% if ( typeof my_textinput !== "undefined" && my_textinput ) { %>' . "\r\n";
    $more_info_template .= "\t\t\t" . '<p><%= my_textinput %></p>' . "\r\n";
    $more_info_template .= "\t\t\t" . '<% } %>' . "\r\n";

    $more_info_template .= "\t\t" . '</div>' . "\r\n";
    $more_info_template .= '<% } %>' . "\r\n";

    return $more_info_template;
}
