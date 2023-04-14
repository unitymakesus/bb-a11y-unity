<?php

class UnityLightboxGalleryModule extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct([
            'name'        => __( 'Lightbox Gallery', 'bb-a11y-unity' ),
            'description' => __( 'An accessible lightbox for image galleries.', 'bb-a11y-unity' ),
            'icon'        => 'format-gallery.svg',
            'category'    => __( 'Accessible', 'bb-a11y-unity' ),
            'dir'         => BB_A11Y_UNITY_DIR . 'modules/unity-lightbox-gallery/',
            'url'         => BB_A11Y_UNITY_URL . 'modules/unity-lightbox-gallery/',
        ]);

        /**
         * CSS
         */
        $this->add_css('modaal-css', 'https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css');
        $this->add_css('unity-lightbox-gallery-css', Unity\A11Y\asset_path('styles/unity-lightbox-gallery.css'));

        /**
         * JS
         */
        $this->add_js('modaal-js', 'https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js', ['jquery']);
        $this->add_js('unity-lightbox-gallery-js', Unity\A11Y\asset_path('scripts/unity-lightbox-gallery.js'), ['jquery', 'modaal-js'], null, true);
    }
}

FLBuilder::register_module('UnityLightboxGalleryModule', [
    'unity-lightbox-gallery-general' => [
        'title'    => __('General', ''),
        'sections' => [
            'content' => [
                'title'  => '',
                'fields' => [
                    'lightbox_images' => [
                        'type'  => 'multiple-photos',
                        'label' => __('Images', ''),
                        'help'  => __('Be sure to add alt text to your images!', ''),
                    ],
                ],
            ],
        ],
    ],
    'unity-lightbox-gallery-style' => [
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
                                'default'    =>  4,
                                'medium'     =>  2,
                                'responsive' =>  1,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
]);
