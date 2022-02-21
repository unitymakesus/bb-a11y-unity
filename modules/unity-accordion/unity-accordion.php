<?php

use Spatie\Color\Hex;

class UnityAccordionModule extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct([
            'name'            => __( 'Accordion', 'bb-a11y-unity' ),
            'description'     => __( 'An accessible accordion pattern.', 'bb-a11y-unity' ),
            'icon'            => 'layout.svg',
            'category'        => __( 'Unity', 'bb-a11y-unity' ),
            'partial_refresh' => false,
            'dir'             => BB_A11Y_UNITY_DIR . 'modules/unity-accordion/',
            'url'             => BB_A11Y_UNITY_URL . 'modules/unity-accordion/',
        ]);

        /**
         * CSS
         */
        $this->add_css('unity-accordion-css', asset_path('styles/unity-accordion.css'));

        /**
         * JS
         */
        $this->add_js('unity-accordion-js', asset_path('scripts/unity-accordion.js'), [], null, true);
    }

    /**
     * Retrieve attributes for accordion trigger.
     *
     * @param  int $index
     * @return array
     */
    public function get_trigger_attributes($index)
    {
        return [
            'id'       => "{$this->node}-trigger-{$index}",
            'controls' => "{$this->node}-panel-{$index}",
            'expanded' => $index === 0 ? 'true' : 'false',
        ];
    }

    /**
     * Retrieve attributes for accordion panel.
     *
     * @param  int $index
     * @return array
     */
    public function get_panel_attributes($index)
    {
        return [
            'id'         => "{$this->node}-panel-{$index}",
            'labelledby' => "{$this->node}-trigger-{$index}",
            'hidden'     => $index > 0 ? 'hidden' : '',
        ];
    }

    /**
     * Process a Hex color value into an RGB object for the accessible color calc() function in the module's CSS.
     *
     * @param string $str
     * @return Spatie\Color\Hex
     */
    public function processHexToRgb($str)
    {
        return Hex::fromString('#' . $str)->toRgb();
    }
}

FLBuilder::register_module('UnityAccordionModule', [
    'unity-accordion-general' => [
        'title'    => __( 'General', 'bb-a11y-unity' ),
        'sections' => [
            'general' => [
                'title'  => '',
                'fields' => [
                    'panels' => [
                        'type'         => 'form',
                        'label'        => __( 'Item', '' ),
                        'form'         => 'accordion_form',
                        'preview_text' => 'title',
                        'multiple'     => true,
                    ],
                ],
            ],
        ],
    ],
    'unity-accordion-style' => [
        'title'    => __('Style', ''),
        'sections' => [
            'style' => [
                'title'  => '',
                'fields' => [
                    'accent_color' => [
                        'type'       => 'color',
                        'label'      => __('Accent Color', ''),
                        'help'       => __('By selecting the accent color, any text color will automatically update in order to meet WCAG 2.1 Level AA guidelines for color contrast ratios.', ''),
                        'show_reset' => true,
                        'show_alpha' => false,
                    ],
                ],
            ],
        ],
    ],
]);

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('accordion_form', [
    'title' => __( 'Add Accordion Item', '' ),
    'tabs'  => [
        'general' => [
            'title'    => __( 'General', '' ),
            'sections' => [
                'content' => [
                    'title'  => '',
                    'fields' => [
                        'title' => [
                            'type'  => 'text',
                            'label' => __( 'Title', '' ),
                        ],
                        'content' => [
                            'type'          => 'editor',
                            'label'         => __( 'Content', '' ),
                            'media_buttons' => false,
                            'wpautop'       => true,
                        ],
                    ],
                ],
            ],
        ],
    ],
]);
