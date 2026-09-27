add_filter( 'wpsl_meta_box_fields', 'custom_meta_box_fields' );

function custom_meta_box_fields( $meta_fields ) {

    // Add a field to the existing "Additional Information" tab.
    $meta_fields[ esc_html__( 'Additional Information', 'wp-store-locator' ) ]['mobile'] = [
        'label' => esc_html__( 'Mobile', 'your-textdomain' ),
        'type'  => 'tel',
    ];

    // Add a new tab with the other field types.
    $meta_fields[ esc_html__( 'Extra Details', 'your-textdomain' ) ] = [
        'my_textinput' => [
            'label' => esc_html__( 'Text input', 'your-textdomain' ),
        ],
        'my_checkbox' => [
            'label' => esc_html__( 'Checkbox', 'your-textdomain' ),
            'type'  => 'checkbox',
        ],
        'my_textarea' => [
            'label' => esc_html__( 'Textarea', 'your-textdomain' ),
            'type'  => 'textarea',
        ],
        'my_dropdown' => [
            'label'   => esc_html__( 'Dropdown', 'your-textdomain' ),
            'type'    => 'dropdown',
            'options' => [
                'option1' => esc_html__( 'Option 1', 'your-textdomain' ),
                'option2' => esc_html__( 'Option 2', 'your-textdomain' ),
            ],
        ],
        'my_editor' => [
            'label' => esc_html__( 'Description', 'your-textdomain' ),
            'type'  => 'wp_editor',
        ],
    ];

    return $meta_fields;
}
