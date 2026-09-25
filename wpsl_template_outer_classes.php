add_filter( 'wpsl_template_outer_classes', 'my_wpsl_template_classes' );

function my_wpsl_template_classes( $classes ) {
    if ( in_array( 'wpsl-my-custom-template-template', $classes, true ) ) {
        $classes[] = 'wpsl-vertical-template'; // or wpsl-horizontal-template
    }

    return $classes;
}
