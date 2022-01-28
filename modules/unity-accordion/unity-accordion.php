<?php

class UnityAccordionModule extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct([
            'name'            => __( 'Accordion', 'unity-a11y-bb' ),
            'description'     => __( 'An accessible accordion pattern.', 'unity-a11y-bb' ),
            'icon'            => 'button.svg',
            'category'        => __( 'Unity', 'unity-a11y-bb' ),
            'partial_refresh' => true,
            'dir'             => UNITY_A11Y_BB_DIR . 'modules/unity-accordion/',
            'url'             => UNITY_A11Y_BB_URL . 'modules/unity-accordion/',
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
     * Set a custom icon for the module.
     *
     * @param  mixed $icon
     * @return string
     */
    public function get_icon($icon = '')
    {
        return fl_builder_filesystem()->file_get_contents(UNITY_A11Y_BB_DIR . 'assets/src/icons/unity.svg');
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
            'expanded' => $i === 0 ? 'true' : 'false',
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
}

FLBuilder::register_module('UnityAccordionModule', [
    'unity-accordion-general' => [
        'title'    => __( 'General', 'unity-a11y-bb' ),
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
