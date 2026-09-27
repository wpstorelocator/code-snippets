// v2
global $wpsl_settings;

$hide_country = $wpsl_settings['hide_country'];

// v3
$settings = wpsl_get_service( 'wpsl_settings' );

$hide_country = $settings->get( 'ux', 'hide_country' );
