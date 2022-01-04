<?php

class UnitySliderModule extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct([
            'name'            => __( 'Slider', 'unity-a11y-bb' ),
            'description'     => __( '', 'unity-a11y-bb' ),
            'icon'            => 'unity.svg',
            'category'        => __( 'Unity', 'unity-a11y-bb' ),
            'partial_refresh' => true,
            'dir'             => UNITY_A11Y_BB_DIR . 'modules/unity-slider/',
            'url'             => UNITY_A11Y_BB_URL . 'modules/unity-slider/',
        ]);

        /**
         * CSS
         */
        $this->add_css('slick', 'https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.css');
        $this->add_css('slick-a11y-theme', 'https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/accessible-slick-theme.min.css');
        $this->add_css('unity-slider-css', asset_path('styles/unity-slider.css'));

        /**
         * JS
         */
        $this->add_js('unity-slider-js', asset_path('scripts/unity-slider.js'), ['jquery'], null, true);
    }

    /**
     *
     *
     * @param array $settings
     *
     * @return array slides
     */
    public function get_slider_items($settings)
    {
        return $settings->add_slider_item;
    }
}

FLBuilder::register_module('UnitySliderModule', [
    'unity-slider-general' => [
        'title'    => __( 'General', 'unity-a11y-bb' ),
        'sections' => [
            'general' => [
                'title'  => '',
                'fields' => [
                    'add_slider_item' => [
                        'type'         => 'form',
                        'label'        => __( 'Slider Item', '' ),
                        'form'         => 'slider_item_form',
                        'preview_text' => 'slider_item_title',
                        'multiple'     => true,
                    ],
                ],
            ],
            'layout' => [
                'title' => '',
                'fields' => [
                    'slider_responsive' => [
                        'type'        => 'unit',
                        'label'       => __( 'Responsive Settings', '' ),
                        'description' => '',
                        'responsive'  => [
                            'placeholder' => [
                                'default'    =>  3,
                                'medium'     =>  2,
                                'responsive' =>  1,
                            ],
                        ],
                    ],
                ],
            ]
        ],
    ],
]);

FLBuilder::register_settings_form('slider_item_form', [
    'title' => __( 'Add Slider Item', '' ),
    'tabs' => [
        'slider_item_general' => [
            'title' => __( 'General', '' ),
            'sections' => [
                'content' => [
                    'title' => __( 'Item', '' ),
                    'fields' => [
                        'slider_item_title' => [
                            'type' => 'text',
                            'label' => __( 'Title', '' ),
                        ],
                        'slider_item_image' => [
                            'type' => 'photo',
                            'label' => __( 'Background Image', '' ),
                        ],
                    ],
                ],
                // 'link' => [
                //     'title' => __( 'Link', '' ),
                //     'fields' => [
                //         'slider_item_link' => [
                //             'type' => 'link',
                //             'label' => __( 'Link', '' ),
                //         ],
                //     ],
                // ],
            ],
        ],
    ],
]);
