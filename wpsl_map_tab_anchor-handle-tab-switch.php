add_action( 'wp_enqueue_scripts', 'custom_wpsl_tab_switch' );

function custom_wpsl_tab_switch() {

    /*
     * Redraw the store locator map after the tab that holds it is opened.
     *
     * Replace .my-tabs with a selector for the tab links of your theme or tab plugin.
     * A tab link must point to its panel with href="#panel-id" or aria-controls="panel-id".
     */
    $script = "
        document.addEventListener( 'click', function( event ) {
            var tab = event.target.closest( '.my-tabs [href^=\"#\"], .my-tabs [aria-controls]' );

            if ( ! tab || ! window.wpsl || ! window.wpsl.api ) {
                return;
            }

            var panelId = tab.getAttribute( 'aria-controls' ) || tab.getAttribute( 'href' ).slice( 1 );
            var panel   = document.getElementById( panelId );

            if ( panel ) {
                // Give the tab plugin time to show the panel before the map is redrawn.
                setTimeout( function() {
                    window.wpsl.api.handleTabSwitch( panel );
                }, 150 );
            }
        } );
    ";

    wp_add_inline_script( 'wp-hooks', $script );
}
