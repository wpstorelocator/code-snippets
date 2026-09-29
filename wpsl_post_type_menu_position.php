add_filter( 'wpsl_post_type_menu_position', 'custom_post_type_menu_position' );

function custom_post_type_menu_position() {
    return 5; // The higher the number the lower the position in the menu.
}
