<?php

class UnityImageCarouselModule extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct([
            'name'            => __( 'Image Carousel', 'bb-a11y-unity' ),
            'description'     => __( '', 'bb-a11y-unity' ),
            'icon'            => 'slides.svg',
            'category'        => __( 'Accessible', 'bb-a11y-unity' ),
            'partial_refresh' => true,
            'dir'             => BB_A11Y_UNITY_DIR . 'modules/unity-image-carousel/',
            'url'             => BB_A11Y_UNITY_URL . 'modules/unity-image-carousel/',
        ]);

        /**
         * CSS
         */
        $this->add_css('slick', 'https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.css');
        $this->add_css('slick-a11y-theme', 'https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/accessible-slick-theme.min.css');
        $this->add_css('unity-image-carousel-css', Unity\A11Y\asset_path('styles/unity-image-carousel.css'));

        /**
         * JS
         */
        $this->add_js('unity-image-carousel-js', Unity\A11Y\asset_path('scripts/unity-image-carousel.js'), ['jquery'], null, true);
    }

    /**
     * Return all items for a slider.
     *
     * @param  array $settings
     * @return array
     */
    public function getSliderItems($settings)
    {
        return $settings->add_slider_item;
    }
}

FLBuilder::register_module('UnityImageCarouselModule', [
    'unity-image-carousel-general' => [
        'title'    => __('General', 'bb-a11y-unity'),
        'sections' => [
            'general' => [
                'title'  => '',
                'fields' => [
                    'image_carousel_images' => [
                        'type'         => 'multiple-photos',
                        'label'        => __('Images', ''),
                    ],
                ],
            ],
            'layout' => [
                'title' => '',
                'fields' => [
                    'image_carousel_image_size' => [
                        'type'    => 'photo-sizes',
                        'label'   => __('Image Size', ''),
                        'default' => 'large',
                    ],
                ],
            ]
        ],
    ],
]);
