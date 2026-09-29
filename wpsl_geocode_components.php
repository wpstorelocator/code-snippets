add_filter( 'wpsl_geocode_components', 'custom_geocode_components' );

function custom_geocode_components( $geocode_components ) {

    $geocode_components['administrativeArea'] = 'Illinois';

    return $geocode_components;
}
