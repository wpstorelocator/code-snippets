add_filter( 'wpsl_cluster_marker_shapes', 'my_cluster_image_shape' );

function my_cluster_image_shape( $shapes ) {
    $file = get_stylesheet_directory() . '/wpsl-markers/cluster.png';

    if ( ! file_exists( $file ) ) {
        return $shapes;
    }

    $image = 'data:image/png;base64,' . base64_encode( file_get_contents( $file ) );

    $shapes['my-image'] = [
        'label' => 'Custom image',
        'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240"><image href="' . $image . '" width="240" height="240" /><text x="50%" y="50%" style="fill:${labelColor}" text-anchor="middle" font-size="${labelSize}" dominant-baseline="middle" font-family="roboto,arial,sans-serif">${count}</text></svg>',
        'size'  => 50,
    ];

    return $shapes;
}
