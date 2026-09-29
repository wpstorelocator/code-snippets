add_filter( 'wpsl_admin_js_settings', 'custom_admin_js_settings' );

function custom_admin_js_settings( $js_settings ) {

    $js_settings['defaultLatLng'] = '51.507351, -0.127758';
    $js_settings['defaultZoom']   = 8;

    return $js_settings;
}
