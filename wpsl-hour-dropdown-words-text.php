add_filter( 'wpsl_hour_dropdown_words', 'custom_hour_dropdown_text_words' );

function custom_hour_dropdown_text_words( $words ) {

    // Only shows as text, on these days no open / closed status is shown.
    $words['close']['last_ferry'] = __( 'Last ferry', 'your-textdomain' );

    return $words;
}
