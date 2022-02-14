<?php

class UnityBlockquoteModule extends FLBuilderModule {
    public function __construct() {
        parent::__construct([
            'name'        => __( 'Blockquote', 'unity-a11y-bb' ),
            'description' => __( 'A semantic blockquote module.', 'unity-a11y-bb' ),
            'icon'        => 'button.svg',
            'category'    => __( 'Unity', 'unity-a11y-bb' ),
            'dir'         => UNITY_A11Y_BB_DIR . 'modules/unity-blockquote/',
            'url'         => UNITY_A11Y_BB_URL . 'modules/unity-blockquote/',
        ]);

        /**
         * CSS
         */
        $this->add_css('unity-blockquote-css', asset_path('styles/unity-blockquote.css'));
    }

    /**
     * Set a custom icon for the module.
     *
     * @param  mixed $icon
     * @return string
     */
    public function get_icon($icon = '')
    {
        return fl_builder_filesystem()->file_get_contents(UNITY_A11Y_BB_DIR . 'assets/src/icons/unity.svg');
    }
}

FLBuilder::register_module('UnityBlockquoteModule', [
    'unity-blockquote-general' => [
        'title'    => __( 'General', 'unity-a11y-bb' ),
        'sections' => [
            'general' => [
                'title'  => '',
                'fields' => [
                    'blockquote' => [
                        'type'  => 'textarea',
                        'label' => __( 'Blockquote', 'unity-a11y-bb' ),
                        'rows'  => '6'
                    ],
                    'cite' => [
                        'type'  => 'text',
                        'label' => __( 'Cite', 'unity-a11y-bb' ),
                    ]
                ],
            ],
        ],
    ],
    // 'unity-blockquote-style' => [
    //     'title'    => __( 'Style', 'unity-a11y-bb' ),
    //     'sections' => [
    //         'style'  => [
    //             'title'  => '',
    //             'fields' => [
    //                 'align'        => [
    //                     'type'       => 'align',
    //                     'label'      => __( 'Align', 'unity-a11y-bb' ),
    //                     'default'    => 'left',
    //                 ],
    //             ],
    //         ],
    //     ],
    // ],
]);
