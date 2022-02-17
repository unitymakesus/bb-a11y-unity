<?php

class UnityModaalGalleryModule extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct([
            'name'        => __( 'Modaal Gallery', 'unity-a11y-bb' ),
            'description' => __( 'A button that opens an accessible Modaal dialog window with multiple images.', 'unity-a11y-bb' ),
            'icon'        => 'format-gallery.svg',
            'category'    => __( 'Unity', 'unity-a11y-bb' ),
            'dir'         => UNITY_A11Y_BB_DIR . 'modules/unity-modaal-gallery/',
            'url'         => UNITY_A11Y_BB_URL . 'modules/unity-modaal-gallery/',
        ]);

        /**
         * CSS
         */
        $this->add_css('modaal-css', 'https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css');
        $this->add_css('unity-modaal-gallery-css', asset_path('styles/unity-modaal-gallery.css'));

        /**
         * JS
         */
        $this->add_js('modaal-js', 'https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js', ['jquery']);
        $this->add_js('unity-modaal-gallery-js', asset_path('scripts/unity-modaal-gallery.js'), ['jquery', 'modaal-js'], null, true);
    }
}

FLBuilder::register_module('UnityModaalGalleryModule', [
    'unity-modaal-gallery-general' => [
        'title'    => __('General', ''),
        'sections' => [
            'content' => [
                'title'  => '',
                'fields' => [
                    'images' => [
                        'type'  => 'multiple-photos',
                        'help'  => __('Be sure to add alt text to your images!', ''),
                        'label' => __('Gallery', ''),
                    ],
                ],
            ],
        ],
    ],
    'unity-modaal-gallery-style' => [
        'title'    => __('Style', ''),
        'sections' => [
            'style' => [
                'title'  => '',
                'fields' => [
                    'layout_grid' => [
                        'type'        => 'unit',
                        'label'       => __('Layout Grid', ''),
                        'responsive'  => [
                            'placeholder' => [
                                'default'    =>  3,
                                'medium'     =>  2,
                                'responsive' =>  1,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
] );
