add_filter( 'wpsl_distance_unit', 'custom_distance_unit' );

/**
 * Use miles for visitors from the US, and kilometers for everyone else.
 *
 * @param  string $distance_unit The distance unit from the settings.
 * @return string Either 'mi' or 'km'.
 */
function custom_distance_unit( $distance_unit ) {

    $user_country = custom_get_user_country();

    // Keep the setting when the country is unknown.
    if ( ! $user_country ) {
        return $distance_unit;
    }

    return ( 'US' === $user_country ) ? 'mi' : 'km';
}
