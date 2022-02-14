<?php

class UnityPostsModule extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct([
            'name'            => __( 'Posts', 'unity-a11y-bb' ),
            'description'     => __( 'A feed of posts.', 'unity-a11y-bb' ),
            'icon'            => 'button.svg',
            'category'        => __( 'Unity', 'unity-a11y-bb' ),
            'partial_refresh' => true,
            'dir'             => UNITY_A11Y_BB_DIR . 'modules/unity-posts/',
            'url'             => UNITY_A11Y_BB_URL . 'modules/unity-posts/',
        ]);

        /**
         * CSS
         */
        $this->add_css('unity-posts-css', asset_path('styles/unity-posts.css'));
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

FLBuilder::register_module('UnityPostsModule', [
    'unity-posts-general' => [
        'title'    => __( 'General', 'unity-a11y-bb' ),
        'sections' => [
            'general' => [
                'title'  => __('Options', ''),
                'fields' => [
                    'display_excerpt' => [
                        'type'    => 'button-group',
                        'label'   => __('Display Excerpt', ''),
                        'default' => 'show',
                        'options' => [
                            'show' => __('Show Excerpt', ''),
                            'hide' => __('Hide Excerpt', ''),
                        ],
                    ],
                    'display_author' => [
                        'type'    => 'button-group',
                        'label'   => __('Display Author', ''),
                        'default' => 'show',
                        'options' => [
                            'show' => __('Show Author', ''),
                            'hide' => __('Hide Author', ''),
                        ],
                    ],
                    'display_date' => [
                        'type'    => 'button-group',
                        'label'   => __('Display Date', ''),
                        'default' => 'show',
                        'options' => [
                            'show' => __('Show Date', ''),
                            'hide' => __('Hide Date', ''),
                        ],
                    ],
                    'display_thumbnail' => [
                        'type'    => 'button-group',
                        'label'   => __('Display Thumbnail', ''),
                        'default' => 'show',
                        'options' => [
                            'show' => __('Show Thumbnail', ''),
                            'hide' => __('Hide Thumbnail', ''),
                        ],
                    ],
                    'thumbnail_size' => [
                        'type'    => 'button-group',
                        'label'   => __('Thumbnail Size', ''),
                        'default' => 'thumbnail',
                        'options' => [
                            'full'      => __('Full', ''),
                            'large'     => __('Large', ''),
                            'medium'    => __('Medium', ''),
                            'thumbnail' => __('Thumbnail', ''),
                        ],
                    ],
                ],
            ],
        ],
    ],
    'settings' => [
        'title' => __( 'Loop Settings', '' ),
        'file'  => FL_BUILDER_DIR . 'includes/loop-settings.php',
    ],
]);
