// v2: the phone, fax and email written out by hand
$listing_template .= '<p class="wpsl-contact-details">';
$listing_template .= '<% if ( phone ) { %>';
$listing_template .= '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>: <%= formatPhoneNumber( phone ) %></span>';
$listing_template .= '<% } %>';
// ... the same for the fax and email
$listing_template .= '</p>';

// v3: one call, with the translated labels and the icon setting
$listing_template .= $sections->contact_details();
