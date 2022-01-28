<?php

class UnityNumbersModule extends FLBuilderModule {
    public function __construct() {
        parent::__construct([
            'name'            => __( 'Numbers', '' ),
            'description'     => __( '' ),
            'icon'            => 'button.svg',
            'category'        => __( 'Unity', '' ),
            'partial-refresh' => true,
            'dir'             => UNITY_A11Y_BB_DIR . 'modules/unity-numbers/',
            'url'             => UNITY_A11Y_BB_DIR . 'modules/unity-numbers/',
        ]);

        /**
         * CSS
         */
        $this->add_css('unity-numbers-css', asset_path('styles/unity-numbers.css'));

        /**
         * JS
         */
        $this->add_js('unity-numbers-js', asset_path('scripts/unity-numbers.js'), [], '', true);
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

FLBuilder::register_module('UnityNumbersModule', [
    'unity-numbers-general' => [
        'title'    => __( 'General', '' ),
        'sections' => [
            'content' => [
                'title'  => '',
                'fields' => [
                    'numbers' => [
                        'type'         => 'form',
                        'label'        => __( 'Number', '' ),
                        'form'         => 'unity_numbers_form',
                        'preview_text' => '',
                        'multiple'     => true,
                    ],
                ],
            ],
        ],
    ],
]);

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('unity_numbers_form', [
    'title' => __( 'Add Number', '' ),
    'tabs'  => [
        'general' => [
            'title'    => __( 'General', '' ),
            'sections' => [
                'content' => [
                    'title'  => '',
                    'fields' => [
                        'number' => [
                            'type'        => 'unit',
                            'label'       => __( 'Number', '' ),
                            'size'        => '1',
                            'default'     => '100',
                            'placeholder' => '100',
                            'connections' => ['custom_field'],
                        ],
                        'aria_label' => [
                            'type' => 'text',
                            'label' => __( 'Accessible Text', '' ),
                        ],
                    ],
                ],
            ],
        ],
    ],
]);
