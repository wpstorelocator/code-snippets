add_filter( 'wpsl_cluster_marker_shapes', 'custom_wpsl_cluster_marker_shapes' );

function custom_wpsl_cluster_marker_shapes( $shapes ) {

    // 1. Shield Shape
    $shapes['shield'] = array(
        'label' => __( 'Shield', 'your-textdomain' ),
        'svg'   => '<svg fill="${color}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240"><path d="M120 10 L220 45 V115 C220 178 120 230 120 230 C120 230 20 178 20 115 V45 Z" opacity=".25" /><path d="M120 28 L202 57 V115 C202 166 120 209 120 209 C120 209 38 166 38 115 V57 Z" opacity=".85" /><text x="50%" y="46%" style="fill:${labelColor}" text-anchor="middle" font-size="${labelSize}" dominant-baseline="middle" font-family="roboto,arial,sans-serif">${count}</text></svg>',
        'size'  => 60,
    );

    // 2. Map Pin / Teardrop Shape
    $shapes['pin'] = array(
        'label' => __( 'Map Pin', 'your-textdomain' ),
        'svg'   => '<svg fill="${color}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240"><path d="M120 10 C62 10 15 57 15 115 C15 175 120 230 120 230 C120 230 225 175 225 115 C225 57 178 10 120 10 Z" opacity=".25" /><path d="M120 26 C71 26 31 66 31 115 C31 163 120 210 120 210 C120 210 209 163 209 115 C209 66 169 26 120 26 Z" opacity=".85" /><text x="50%" y="44%" style="fill:${labelColor}" text-anchor="middle" font-size="${labelSize}" dominant-baseline="middle" font-family="roboto,arial,sans-serif">${count}</text></svg>',
        'size'  => 60,
    );

    // 3. Octagon Shape
    $shapes['octagon'] = array(
        'label' => __( 'Octagon', 'your-textdomain' ),
        'svg'   => '<svg fill="${color}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240"><polygon points="72,10 168,10 230,72 230,168 168,230 72,230 10,168 10,72" opacity=".25" /><polygon points="77,26 163,26 214,77 214,163 163,214 77,214 26,163 26,77" opacity=".85" /><text x="50%" y="50%" style="fill:${labelColor}" text-anchor="middle" font-size="${labelSize}" dominant-baseline="middle" font-family="roboto,arial,sans-serif">${count}</text></svg>',
        'size'  => 55,
    );

    return $shapes;
}
