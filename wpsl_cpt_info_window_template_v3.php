add_filter( 'wpsl_cpt_info_window_template', 'custom_cpt_info_window_template' );

function custom_cpt_info_window_template() {

    $sections = wpsl_get_service( 'template_sections' );
    $settings = wpsl_get_service( 'wpsl_settings' );

    $icons           = $settings->get( 'appearance', 'icons', [] );
    $icons_enabled   = ! empty( $icons['enabled'] );
    $contact_details = (array) $settings->get( 'ux', 'contact_details', [] );
    $hours           = (array) $settings->get( 'ux', 'hours', [] );
    $description     = (array) $settings->get( 'ux', 'description', [] );

    $cpt_info_window_template = '<div class="wpsl-info-window">' . "\r\n";

    // The store name and address.
    $cpt_info_window_template .= "\t" . '<p class="wpsl-no-margin">' . "\r\n";
    $cpt_info_window_template .= "\t\t" . $sections->store_header( 'wpsl_map' ) . "\r\n"; // Linked or plain store name
    $cpt_info_window_template .= "\t\t" . '<span><%= address %></span>' . "\r\n";
    $cpt_info_window_template .= "\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $cpt_info_window_template .= "\t\t" . '<span><%= address2 %></span>' . "\r\n";
    $cpt_info_window_template .= "\t\t" . '<% } %>' . "\r\n";
    $cpt_info_window_template .= "\t\t" . '<span>' . $sections->format_address() . '</span>' . "\r\n"; // Address format from the settings page

    if ( ! $settings->get( 'ux', 'hide_country' ) ) {
        $cpt_info_window_template .= "\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
    }

    $cpt_info_window_template .= "\t" . '</p>' . "\r\n";

    /**
     * Include the data from a custom field called 'my_textinput'.
     *
     * Before you can access the 'my_textinput' data, you first need to
     * add it through the 'wpsl_cpt_info_window_meta_fields' filter.
     *
     * The typeof check keeps the template working for locations without the field.
     */
    $cpt_info_window_template .= "\t" . '<% if ( typeof my_textinput !== "undefined" && my_textinput ) { %>' . "\r\n";
    $cpt_info_window_template .= "\t" . '<p><%= my_textinput %></p>' . "\r\n";
    $cpt_info_window_template .= "\t" . '<% } %>' . "\r\n";

    // The phone, fax and email, if "In the marker popup on the landing page" is selected for the contact details.
    if ( in_array( 'landing_page_marker_popup', $contact_details, true ) ) {
        $cpt_info_window_template .= $sections->contact_details();
    }

    // The short open / closed status, if it's selected for the landing page marker popup and the status is enabled.
    if ( in_array( 'landing_page_marker_popup', $hours, true ) && $settings->get( 'ux', 'show_hour_status' ) ) {
        $cpt_info_window_template .= "\t" . '<% if ( typeof hours_status !== "undefined" && hours_status ) { %>' . "\r\n";

        if ( $icons_enabled ) {
            $cpt_info_window_template .= "\t" . '<div class="wpsl-icon-hours"><%= hours_status %></div>' . "\r\n";
        } else {
            $cpt_info_window_template .= "\t" . '<%= hours_status %>' . "\r\n";
        }

        $cpt_info_window_template .= "\t" . '<% } %>' . "\r\n";
    }

    // The post content, if it's selected for the landing page marker popup.
    if ( in_array( 'landing_page_marker_popup', $description, true ) ) {
        $cpt_info_window_template .= "\t" . '<% if ( typeof description !== "undefined" && description ) { %>' . "\r\n";
        $cpt_info_window_template .= "\t" . '<p><%= description %></p>' . "\r\n";
        $cpt_info_window_template .= "\t" . '<% } %>' . "\r\n";
    }

    $cpt_info_window_template .= '</div>';

    return $cpt_info_window_template;
}
