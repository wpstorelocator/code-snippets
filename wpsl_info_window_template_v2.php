add_filter( 'wpsl_info_window_template', 'custom_info_window_template' );

function custom_info_window_template() {

    global $wpsl_settings, $wpsl;

    $info_window_template = '<div data-store-id="<%= id %>" class="wpsl-info-window">' . "\r\n";
    $info_window_template .= "\t\t" . '<p>' . "\r\n";
    $info_window_template .= "\t\t\t" .  wpsl_store_header_template() . "\r\n";
    $info_window_template .= "\t\t\t" . '<span><%= address %></span>' . "\r\n";
    $info_window_template .= "\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $info_window_template .= "\t\t\t" . '<span><%= address2 %></span>' . "\r\n";
    $info_window_template .= "\t\t\t" . '<% } %>' . "\r\n";
    $info_window_template .= "\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n";
    $info_window_template .= "\t\t" . '</p>' . "\r\n";

    $info_window_template .= "\t\t" . '<% if ( phone ) { %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>: <%= formatPhoneNumber( phone ) %></span>' . "\r\n";
    $info_window_template .= "\t\t" . '<% } %>' . "\r\n";
    $info_window_template .= "\t\t" . '<% if ( fax ) { %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'fax_label', __( 'Fax', 'wpsl' ) ) ) . '</strong>: <%= fax %></span>' . "\r\n";
    $info_window_template .= "\t\t" . '<% } %>' . "\r\n";
    $info_window_template .= "\t\t" . '<% if ( email ) { %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'email_label', __( 'Email', 'wpsl' ) ) ) . '</strong>: <%= formatEmail( email ) %></span>' . "\r\n";
    $info_window_template .= "\t\t" . '<% } %>' . "\r\n";

    $info_window_template .= "\t\t" . '<% if ( my_textinput ) { %>' . "\r\n";
    $info_window_template .= "\t\t" . '<p><%= my_textinput %></p>' . "\r\n";
    $info_window_template .= "\t\t" . '<% } %>' . "\r\n";

    $info_window_template .= "\t\t" . '<%= createInfoWindowActions( id ) %>' . "\r\n";
    $info_window_template .= "\t" . '</div>' . "\r\n";

    return $info_window_template;
}
