function my_wpsl_custom_template( $templates ) {

    $templates[] = [
        'id'   => 'my-custom-template',
        'name' => 'My custom template',
        'desc' => 'Shown under the template name on the Appearance page.',
        'path' => get_stylesheet_directory() . '/wpsl-templates/custom.php',
    ];

    return $templates;
}

add_filter( 'wpsl_templates', 'my_wpsl_custom_template' );
