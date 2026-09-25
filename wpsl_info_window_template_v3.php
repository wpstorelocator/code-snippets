add_filter( 'wpsl_info_window_template', 'custom_info_window_template' );

function custom_info_window_template( $info_window_template ) {

    $sections = wpsl_get_service( 'template_sections' );

    $info_window_template = '<div data-store-id="<%= id %>" class="wpsl-info-window">' . "\r\n";
    $info_window_template .= "\t" . '<p>' . "\r\n";
    $info_window_template .= "\t\t" . $sections->store_header() . "\r\n"; // Linked or plain store name
    $info_window_template .= "\t\t" . '<span><%= address %></span>' . "\r\n";
    $info_window_template .= "\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span><%= address2 %></span>' . "\r\n";
    $info_window_template .= "\t\t" . '<% } %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span>' . $sections->format_address() . '</span>' . "\r\n";
    $info_window_template .= "\t" . '</p>' . "\r\n";

    // Phone, fax and email with the translated labels.
    $info_window_template .= $sections->contact_details();

    // The typeof check keeps the info window working for locations without the field.
    $info_window_template .= "\t" . '<% if ( typeof my_textinput !== "undefined" && my_textinput ) { %>' . "\r\n";
    $info_window_template .= "\t" . '<p><%= my_textinput %></p>' . "\r\n";
    $info_window_template .= "\t" . '<% } %>' . "\r\n";

    $info_window_template .= "\t" . '<%= createInfoWindowActions( id, url, typeof permalink !== "undefined" ? permalink : "" ) %>' . "\r\n";
    $info_window_template .= '</div>';

    return $info_window_template;
}
