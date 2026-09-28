// v2
$listing_template .= '<strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>';

// v3: the {{...}} tag goes inside the template string, 
// the plugin replaces it with the translated label
$listing_template .= '<strong>' . "{{wpsl_label( 'phone_label' )}}" . '</strong>';
