/**
 * Get the country code of the current visitor.
 *
 * @return string The country code, for example 'US', or an empty string.
 */
function custom_get_user_country() {

    // Cloudflare can add the visitor's country itself, then no API request is needed.
    if ( ! empty( $_SERVER['HTTP_CF_IPCOUNTRY'] ) ) {
        return strtoupper( sanitize_text_field( wp_unslash( $_SERVER['HTTP_CF_IPCOUNTRY'] ) ) );
    }

    // The API key from https://ipstack.com/.
    $api_key = '';

    // How long the country is cached, in seconds ( 1800 = 30 minutes ).
    $cache_expires = 1800;

    $user_ip = custom_get_user_ip();

    // Uncomment the line below to test it with a US based IP.
    // $user_ip = '54.239.17.6';

    if ( ! $user_ip || ! $api_key ) {
        return '';
    }

    $transient_name = 'custom_user_country_' . md5( $user_ip );
    $user_country   = get_transient( $transient_name );

    if ( false === $user_country ) {
        $user_country = '';

        $api_url = add_query_arg(
            [
                'access_key' => rawurlencode( $api_key ),
                'fields'     => 'country_code',
            ],
            'http://api.ipstack.com/' . rawurlencode( $user_ip )
        );

        $response = wp_remote_get( $api_url );

        if ( ! is_wp_error( $response ) ) {
            $user_location = json_decode( wp_remote_retrieve_body( $response ) );

            if ( ! empty( $user_location->country_code ) ) {
                $user_country = $user_location->country_code;
            }
        }

        // Cache a failed lookup for 5 minutes, so the API isn't called on every page load.
        set_transient( $transient_name, $user_country, $user_country ? $cache_expires : 300 );
    }

    return $user_country;
}
