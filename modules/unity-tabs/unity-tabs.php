<?php

class UnityTabsModule extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct([
            'name'            => __( 'Tabs', 'unity-a11y-bb' ),
            'description'     => __( 'An accessible tabs pattern.', 'unity-a11y-bb' ),
            'icon'            => 'button.svg',
            'category'        => __( 'Unity', 'unity-a11y-bb' ),
            'partial_refresh' => true,
            'dir'             => UNITY_A11Y_BB_DIR . 'modules/unity-tabs/',
            'url'             => UNITY_A11Y_BB_URL . 'modules/unity-tabs/',
        ]);

        /**
         * CSS
         */
        $this->add_css('unity-tabs-css', asset_path('styles/unity-tabs.css'));

        /**
         * JS
         */
        $this->add_js('unity-tabs-js', asset_path('scripts/unity-tabs.js'), [], null, true);
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
     * Retrieve attributes for tab.
     *
     * @param  int $index
     * @return array
     */
    public function get_tab_attributes($index)
    {
        return [
            'id'       => "{$this->node}-tab-{$index}",
            'controls' => "{$this->node}-panel-{$index}",
            'selected' => $i === 0 ? 'true' : 'false',
            'tabindex' => $index > 0 ? 'tabindex=-1' : '',
        ];
    }

    /**
     * Retrieve attributes for tabpanel.
     *
     * @param  int $index
     * @return array
     */
    public function get_tabpanel_attributes($index)
    {
        return [
            'id'         => "{$this->node}-panel-{$index}",
            'labelledby' => "{$this->node}-tab-{$index}",
            'hidden'     => $index > 0 ? 'hidden' : '',
        ];
    }
}

FLBuilder::register_module('UnityTabsModule', [
    'transloc-tabs-general' => [
        'title'    => __( 'General', '' ),
        'sections' => [
            'content' => [
                'title'  => '',
                'fields' => [
                    'title' => [
                        'type'  => 'text',
                        'label' => __( 'Title', '' ),
                    ],
                    'description' => [
                        'type'  => 'textarea',
                        'label' => __( 'Description', '' ),
                    ],
                    'tabs' => [
                        'type'         => 'form',
                        'label'        => __( 'Tab', '' ),
                        'form'         => 'tabs_form',
                        'preview_text' => 'title',
                        'multiple'     => true,
                    ],
                    'aria_label' => [
                        'type'        => 'text',
                        'label'       => __( 'Label', '' ),
                        'description' => __( 'Provide an accessible text label to group these tabs. Screen readers will utilize this label.', '' ),
                    ],
                    'aria_orientation' => [
                        'type'    => 'select',
                        'label'   => __( 'Orientation', '' ),
                        'default' => 'horizontal',
                        'options' => [
                            'horizontal' => __( 'Horizontal', '' ),
                            'vertical'   => __( 'Vertical', '' ),
                        ],
                        'description' => __( 'Display the tabs in vertical or horizontal format.', '' ),
                    ],
                ],
            ],
        ],
    ],
]);

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('tabs_form', [
    'title' => __( 'Add Tab', '' ),
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
