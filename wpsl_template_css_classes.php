add_filter( 'wpsl_template_css_classes', 'custom_template_css_classes' );

function custom_template_css_classes( $classes ) {

    // Only add the class on the page with the 'your-page-slug' permalink.
    if ( is_page( 'your-page-slug' ) ) {
        $classes[] = 'wpsl-custom-css';
    }

    return $classes;
}
