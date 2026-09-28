/**
 * Get the IP of the current visitor.
 *
 * @return string The IP, or an empty string if no valid IP is found.
 */
function custom_get_user_ip() {

    $headers = [ 'HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR' ];

    foreach ( $headers as $header ) {
        if ( empty( $_SERVER[ $header ] ) ) {
            continue;
        }

        // X-Forwarded-For can hold a list of IPs, the first one is the visitor.
        $ips = array_map( 'trim', explode( ',', wp_unslash( $_SERVER[ $header ] ) ) );

        if ( filter_var( $ips[0], FILTER_VALIDATE_IP ) ) {
            return $ips[0];
        }
    }

    return '';
}
