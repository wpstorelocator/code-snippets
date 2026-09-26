add_filter( 'wpsl_cluster_marker_shapes', 'my_cluster_marker_shapes' );

function my_cluster_marker_shapes( $shapes ) {
    $shapes['outlined'] = [
        'label' => 'Outlined circle',
        'svg'   => '<svg fill="${color}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240"><circle cx="120" cy="120" r="100" stroke="#ffffff" stroke-width="16" opacity=".9" /><text x="50%" y="50%" style="fill:${labelColor}" text-anchor="middle" font-size="${labelSize}" dominant-baseline="middle" font-family="roboto,arial,sans-serif">${count}</text></svg>',
        'size'  => 55,
    ];

    return $shapes;
}
