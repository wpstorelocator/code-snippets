// The icon names from the icon setting, or the plugin's defaults.
$phone_icon = isset( $icons['phone'] ) ? $icons['phone'] : 'phone';
$email_icon = isset( $icons['email'] ) ? $icons['email'] : 'email';

// The contact details, in the order they're shown.
// Change the order, remove a row, or add your own fields.
$rows = [
    [
        'field'  => 'email',
        'label'  => "{{wpsl_label( 'email_label' )}}",
        'icon'   => 'wpsl-icon-' . $email_icon,
        'format' => 'formatEmail',
    ],
    [
        'field'  => 'phone',
        'label'  => "{{wpsl_label( 'phone_label' )}}",
        'icon'   => 'wpsl-icon-' . $phone_icon,
        'format' => 'formatPhoneNumber',
    ],
    [
        // A custom field
        'field'  => 'mobile',
        'label'  => esc_html__( 'Mobile', 'your-textdomain' ),
        'icon'   => 'wpsl-icon-mobile-phone',
        'format' => 'formatPhoneNumber',
    ],
    [
        'field'  => 'fax',
        'label'  => "{{wpsl_label( 'fax_label' )}}",
        'icon'   => 'wpsl-icon-fax',
        'format' => 'formatPhoneNumber',
    ],
];

// Not $contact_details: the v3 templates use 
// that name for the contact details setting.
$contact_block = '<p class="wpsl-contact-details">' . "\r\n";

foreach ( $rows as $row ) {
    $field = $row['field'];
    $value = '<%= ' . $row['format'] . '( ' . $field . ' ) %>';

    $contact_block .= '<% if ( typeof ' . $field . ' !== "undefined" && ' . $field . ' ) { %>' . "\r\n";

    // With icons enabled the icon replaces the label, like the plugin's own block.
    if ( $icons_enabled ) {
        $contact_block .= '<span class="' . esc_attr( $row['icon'] ) . '">' . $value . '</span>' . "\r\n";
    } else {
        $contact_block .= '<span><strong>' . $row['label'] . '</strong>: ' . $value . '</span>' . "\r\n";
    }

    $contact_block .= '<% } %>' . "\r\n";
}

$contact_block .= '</p>' . "\r\n";
