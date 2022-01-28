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
    'settings' => [
        'title' => __( 'Loop Settings', '' ),
        'file'  => FL_BUILDER_DIR . 'includes/loop-settings.php',
    ],
]);
