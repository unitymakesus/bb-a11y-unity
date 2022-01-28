<?php

class UnityAudioModule extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct([
            'name'            => __( 'Audio', 'unity-a11y-bb' ),
            'description'     => __( 'An accessible audio player powered by Plyr.', 'unity-a11y-bb' ),
            'icon'            => 'button.svg',
            'category'        => __( 'Unity', 'unity-a11y-bb' ),
            'partial_refresh' => true,
            'dir'             => UNITY_A11Y_BB_DIR . 'modules/unity-audio/',
            'url'             => UNITY_A11Y_BB_URL . 'modules/unity-audio/',
        ]);

        /**
         * CSS
         */
        $this->add_css('unity-audio-css-plyr', 'https://cdn.plyr.io/3.6.8/plyr.css');
        $this->add_css('unity-audio-css', asset_path('styles/unity-audio.css'));

        /**
         * JS
         */
        $this->add_js('unity-audio-js', asset_path('scripts/unity-audio.js'), [], null, true);
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

FLBuilder::register_module('UnityAudioModule', [
    'unity-audio-general' => [
        'title'    => __( 'General', 'unity-a11y-bb' ),
        'sections' => [
            'general' => [
                'title'  => '',
                'fields' => [
                    'audio_mp3' => [
                        'type'        => 'text',
                        'label'       => __( 'MP3 URL', 'unity-a11y-bb' ),
                        'connections' => ['url'],
                    ],
                    'transcript_text' => [
                        'type' => 'editor',
                        'label' => __( 'Transcript Text', 'unity-a11y-bb' ),
                    ],
                ],
            ],
        ],
    ],
]);
