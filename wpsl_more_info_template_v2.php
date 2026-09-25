add_filter( 'wpsl_more_info_template', 'custom_more_info_template' );

function custom_more_info_template() {

    global $wpsl_settings, $wpsl;

    $more_info_url = '#';

    if ( $wpsl_settings['template_id'] == 'default' && $wpsl_settings['more_info_location'] == 'info window' ) {
        $more_info_url = '#wpsl-search-wrap';
    }

    if ( $wpsl_settings['more_info_location'] == 'store listings' ) {
        $more_info_template = '<% if ( !_.isEmpty( phone ) || !_.isEmpty( fax ) || !_.isEmpty( email ) ) { %>' . "\r\n";
        $more_info_template .= "\t\t\t" . '<p><a class="wpsl-store-details wpsl-store-listing" href="#wpsl-id-<%= id %>">' . esc_html( $wpsl->i18n->get_translation( 'more_label', __( 'More info', 'wpsl' ) ) ) . '</a></p>' . "\r\n";
        $more_info_template .= "\t\t\t" . '<div id="wpsl-id-<%= id %>" class="wpsl-more-info-listings">' . "\r\n";
        $more_info_template .= "\t\t\t\t" . '<% if ( description ) { %>' . "\r\n";
        $more_info_template .= "\t\t\t\t" . '<%= description %>' . "\r\n";
        $more_info_template .= "\t\t\t\t" . '<% } %>' . "\r\n";

        if ( !$wpsl_settings['show_contact_details'] ) {
            $more_info_template .= "\t\t\t\t" . '<p>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<% if ( phone ) { %>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>: <%= formatPhoneNumber( phone ) %></span>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<% if ( fax ) { %>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'fax_label', __( 'Fax', 'wpsl' ) ) ) . '</strong>: <%= fax %></span>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<% if ( email ) { %>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'email_label', __( 'Email', 'wpsl' ) ) ) . '</strong>: <%= email %></span>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '</p>' . "\r\n";
        }

        if ( !$wpsl_settings['hide_hours'] ) {
            $more_info_template .= "\t\t\t\t" . '<% if ( hours ) { %>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<div class="wpsl-store-hours"><strong>' . esc_html( $wpsl->i18n->get_translation( 'hours_label', __( 'Hours', 'wpsl' ) ) ) . '</strong><%= hours %></div>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
        }

        $more_info_template .= '<% if ( my_textinput ) { %>' . "\r\n";
        $more_info_template .= '<p><%= my_textinput %></p>' . "\r\n";
        $more_info_template .= '<% } %>' . "\r\n";

        $more_info_template .= "\t\t\t" . '</div>' . "\r\n";
        $more_info_template .= "\t\t\t" . '<% } %>';

    } else {
        $more_info_template = '<p><a class="wpsl-store-details" href="' . $more_info_url . '">' . esc_html( $wpsl->i18n->get_translation( 'more_label', __( 'More info', 'wpsl' ) ) ) . '</a></p>';
    }

    return $more_info_template;
}
