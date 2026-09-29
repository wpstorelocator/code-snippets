add_filter( 'wpsl_map_tab_anchor', 'custom_map_tab_anchor' );

function custom_map_tab_anchor( $anchors ) {

    /*
     * One href value for each [wpsl_map] on the page, in the order the maps
     * appear. Use the href of the tab link without the #. So for a tab link
     * with href="#store-map", use 'store-map'.
     */
    return array( 'store-map', 'second-store-map' );
}
