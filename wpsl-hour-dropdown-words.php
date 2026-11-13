add_filter( 'wpsl_hour_dropdown_words', 'custom_hour_dropdown_words' );

function custom_hour_dropdown_words( $words ) {

    // The key is saved with the location, the value is shown in the dropdown and the opening hours.
    $words['open']['sunrise'] = __( 'Sunrise', 'wp-store-locator' );
    $words['close']['sunset'] = __( 'Sunset', 'wp-store-locator' );

    return $words;
}
