// The contact details block, written out so you can change the order or add fields.
// Each row: the field name, the label, the icon class and the function that formats the value.
$rows = [
    [ 'email', "{{wpsl_label( 'email_label' )}}", 'wpsl-icon-' . ( isset( $icons['email'] ) ? $icons['email'] : 'email' ), 'formatEmail' ],
    [ 'phone', "{{wpsl_label( 'phone_label' )}}", 'wpsl-icon-' . ( isset( $icons['phone'] ) ? $icons['phone'] : 'phone' ), 'formatPhoneNumber' ],
    [ 'mobile', esc_html__( 'Mobile', 'your-textdomain' ), 'wpsl-icon-mobile-phone', 'formatPhoneNumber' ], // A custom field
    [ 'fax', "{{wpsl_label( 'fax_label' )}}", 'wpsl-icon-fax', 'formatPhoneNumber' ],
];

$contact_details = '<p class="wpsl-contact-details">' . "\r\n";

foreach ( $rows as $row ) {
    list( $field, $label, $icon_class, $format ) = $row;

    $contact_details .= '<% if ( typeof ' . $field . ' !== "undefined" && ' . $field . ' ) { %>' . "\r\n";

    // With icons enabled the icon replaces the label, like the plugin's own block.
    if ( $icons_enabled ) {
        $contact_details .= '<span class="' . esc_attr( $icon_class ) . '"><%= ' . $format . '( ' . $field . ' ) %></span>' . "\r\n";
    } else {
        $contact_details .= '<span><strong>' . $label . '</strong>: <%= ' . $format . '( ' . $field . ' ) %></span>' . "\r\n";
    }

    $contact_details .= '<% } %>' . "\r\n";
}

$contact_details .= '</p>' . "\r\n";
