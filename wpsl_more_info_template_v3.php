add_filter( 'wpsl_more_info_template', 'custom_more_info_template' );

function custom_more_info_template( $more_info_template ) {

    $sections = wpsl_get_service( 'template_sections' );
    $ux       = wpsl_get_service( 'wpsl_settings' )->get_group( 'ux' );

    // hasMoreInfoData only looks at the built-in fields, so include the custom field in the check.
    $more_info_template = '<% if ( hasMoreInfoData || ( typeof my_textinput !== "undefined" && my_textinput ) ) { %>' . "\r\n";
    $more_info_template .= "\t" . '<p class="wpsl-more-info"><a class="wpsl-store-details wpsl-store-listing" aria-expanded="false" href="#wpsl-id-<%= id %>">{{wpsl_label( \'more_label\' )}}</a></p>' . "\r\n";
    $more_info_template .= "\t" . '<div id="wpsl-id-<%= id %>" class="wpsl-more-info-listings">' . "\r\n";

    if ( in_array( 'more_info', (array) $ux['description'], true ) ) {
        $more_info_template .= "\t\t" . '<% if ( typeof description !== "undefined" && description ) { %>' . "\r\n";
        $more_info_template .= "\t\t" . '<%= description %>' . "\r\n";
        $more_info_template .= "\t\t" . '<% } %>' . "\r\n";
    }

    if ( in_array( 'more_info', (array) $ux['contact_details'], true ) ) {
        $more_info_template .= $sections->contact_details();
    }

    if ( in_array( 'more_info', (array) $ux['hours'], true ) ) {
        $more_info_template .= "\t\t" . '<% if ( typeof hours !== "undefined" && hours ) { %>' . "\r\n";
        $more_info_template .= "\t\t" . '<div class="wpsl-store-hours"><strong>{{wpsl_label( \'hours_label\' )}}</strong><%= hours %></div>' . "\r\n";
        $more_info_template .= "\t\t" . '<% } %>' . "\r\n";
    }

    $more_info_template .= "\t\t" . '<% if ( typeof my_textinput !== "undefined" && my_textinput ) { %>' . "\r\n";
    $more_info_template .= "\t\t" . '<p><%= my_textinput %></p>' . "\r\n";
    $more_info_template .= "\t\t" . '<% } %>' . "\r\n";

    $more_info_template .= "\t" . '</div>' . "\r\n";
    $more_info_template .= '<% } %>';

    return $more_info_template;
}
