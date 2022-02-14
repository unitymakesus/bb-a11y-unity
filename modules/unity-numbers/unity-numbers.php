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
    'unity-numbers-style' => [
        'title' => __('Style', ''),
        'sections' => [
            'style' => [
                'title'  => '',
                'fields' => [
                    'align' => [
                        'type'       => 'align',
                        'label'      => __('Align', ''),
                        'default'    => 'left',
                        'preview'    => [
                            'type' => 'css',
                            'selector' => '.unity-numbers',
                            'property' => 'text-align',
                        ],
                    ],
                    'font_size' => [
                        'type'        => 'unit',
                        'label'       => __('Font Size', ''),
                        'units'       => ['px', 'vw', 'em', 'rem'],
                        'preview'    => [
                            'type' => 'css',
                            'selector' => '.unity-numbers__count',
                            'property' => 'font-size',
                        ],
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
                        'text' => [
                            'type' => 'text',
                            'label' => __( 'Text', '' ),
                        ],
                        'prefix' => [
                            'type' => 'text',
                            'label' => __( 'Prefix', '' ),
                        ],
                        'suffix' => [
                            'type' => 'text',
                            'label' => __( 'Suffix', '' ),
                        ],
                        'decimal_places' => [
                            'type'        => 'unit',
                            'label'       => __( 'Decimal Places', '' ),
                            'size'        => '1',
                            'default'     => '0',
                            'placeholder' => '1',
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
