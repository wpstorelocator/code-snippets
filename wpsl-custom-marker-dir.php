add_filter( 'wpsl_admin_marker_dir', 'custom_admin_marker_dir' );

function custom_admin_marker_dir() {

    // The 'wpsl-markers' folder inside your active theme.
    return get_stylesheet_directory() . '/wpsl-markers/';
}
