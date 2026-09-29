add_filter( 'wpsl_no_results', 'custom_no_results' );

function custom_no_results() {

    $output = '<h2>No results found!</h2>';
    $output .= '<p>Please contact us at <a href="tel:123456">+123456</a> or <a href="mailto:support@mydomain.com">support@mydomain.com</a>.</p>';
    $output .= '<img src="http://mydomain.com/my-logo.jpg" alt="business logo"/>';

    return $output;
}
