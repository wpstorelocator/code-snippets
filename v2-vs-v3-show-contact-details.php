// v2
$show_contact_details = $wpsl_settings['show_contact_details'];

// v3: true when "Below the address in the search results" 
// is selected for the contact details
$show_contact_details = in_array( 'search_results', (array) $settings->get( 'ux', 'contact_details', [] ), true );
