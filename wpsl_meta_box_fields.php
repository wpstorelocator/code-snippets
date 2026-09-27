add_filter( 'wpsl_meta_box_fields', 'custom_meta_box_fields' );

function custom_meta_box_fields( $meta_fields ) {

    // Add a field to the existing "Additional Information" tab.
    $meta_fields[ esc_html__( 'Additional Information', 'wp-store-locator' ) ]['mobile'] = [
        'label' => esc_html__( 'Mobile', 'wp-store-locator' ),
        'type'  => 'tel',
    ];

    // Add a new tab with the other field types.
    $meta_fields[ esc_html__( 'Extra Details', 'wp-store-locator' ) ] = [
        'my_textinput' => [
            'label' => esc_html__( 'Text input', 'wp-store-locator' ),
        ],
        'my_checkbox' => [
            'label' => esc_html__( 'Checkbox', 'wp-store-locator' ),
            'type'  => 'checkbox',
        ],
        'my_textarea' => [
            'label' => esc_html__( 'Textarea', 'wp-store-locator' ),
            'type'  => 'textarea',
        ],
        'my_dropdown' => [
            'label'   => esc_html__( 'Dropdown', 'wp-store-locator' ),
            'type'    => 'dropdown',
            'options' => [
                'option1' => esc_html__( 'Option 1', 'wp-store-locator' ),
                'option2' => esc_html__( 'Option 2', 'wp-store-locator' ),
            ],
        ],
        'my_editor' => [
            'label' => esc_html__( 'Description', 'wp-store-locator' ),
            'type'  => 'wp_editor',
        ],
    ];

    return $meta_fields;
}
