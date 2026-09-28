add_filter( 'wpsl_more_info_template', 'custom_more_info_clickable_email' );

function custom_more_info_clickable_email( $more_info_template ) {

    // Always link the email address, whatever the clickable setting is.
    $more_info_template = str_replace(
        '<%= formatEmail( email ) %>',
        '<a href="mailto:<%= email %>"><%= email %></a>',
        $more_info_template
    );

    return $more_info_template;
}
