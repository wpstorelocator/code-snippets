$settings      = wpsl_get_service( 'wpsl_settings' );
$icons         = $settings->get( 'appearance', 'icons', [] );
$icons_enabled = ! empty( $icons['enabled'] );
