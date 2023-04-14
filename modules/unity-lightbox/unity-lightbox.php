<?php

use Spatie\Color\Hex;

class UnityLightboxModule extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct([
            'name'        => __( 'Lightbox', 'bb-a11y-unity' ),
            'description' => __( 'Display content in an accessible lightbox.', 'bb-a11y-unity' ),
            'icon'        => 'info.svg',
            'category'    => __( 'Accessible', 'bb-a11y-unity' ),
            'dir'         => BB_A11Y_UNITY_DIR . 'modules/unity-lightbox/',
            'url'         => BB_A11Y_UNITY_URL . 'modules/unity-lightbox/',
        ]);

        /**
         * CSS
         */
        $this->add_css('modaal-css', 'https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css');
        $this->add_css('unity-lightbox-css', Unity\A11Y\asset_path('styles/unity-lightbox.css'));

        /**
         * JS
         */
        $this->add_js('modaal-js', 'https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js', ['jquery']);
        $this->add_js('unity-lightbox-js', Unity\A11Y\asset_path('scripts/unity-lightbox.js'), ['jquery', 'modaal-js'], null, true);
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

FLBuilder::register_module('UnityLightboxModule', [
    'unity-lightbox-general' => [
        'title'    => __( 'General', 'bb-a11y-unity' ),
        'sections' => [
            'content' => [
                'title'  => __( 'Content', 'bb-a11y-unity' ),
                'fields' => [
                    'lightbox_button_text' => [
                        'type'  => 'text',
                        'label' => __( 'Button Text', 'bb-a11y-unity' ),
                    ],
                    'lightbox_button_icon' => [
                        'type'        => 'icon',
                        'label'       => __( 'Button Icon', 'bb-a11y-unity' ),
                        'show_remove' => true,
                    ],
                    'lightbox_content' => [
                        'type'          => 'editor',
                        'label'         => __( 'Modaal Content', 'bb-a11y-unity' ),
                        'media_buttons' => false,
                        'wpautop'       => true,
                    ],
                ],
            ],
        ],
    ],
    'unity-lightbox-style' => [
        'title'    => __('Style', ''),
        'sections' => [
            'style'  => [
                'title'  => '',
                'fields' => [
                    'button_width' => [
                        'type'    => 'select',
                        'label'   => __('Button Width', ''),
                        'default' => 'auto',
                        'options' => [
                            'auto'   => __('Auto', ''),
                            'full'   => __('Full Width', ''),
                            'custom' => __('Custom', ''),
                        ],
                        'toggle' => [
                            'auto' => [
                                'fields' => ['button_align'],
                            ],
                            'full'   => [],
                            'custom' => [
                                'fields' => ['button_align', 'button_custom_width'],
                            ],
                        ],
                    ],
                    'button_custom_width' => [
                        'type'    => 'unit',
                        'label'   => __('Custom Width', ''),
                        'default' => '200',
                        'slider'  => [],
                        'px' => [
                            'min'  => 0,
                            'max'  => 1000,
                            'step' => 10,
                        ],
                        'units' => ['px', 'vw', '%'],
                        'preview' => [
                            'type'     => 'css',
                            'selector' => 'a.unity-lightbox__button',
                            'property' => 'width',
                        ],
                    ],
                    'button_align' => [
                        'type'       => 'align',
                        'label'      => __('Button Align', ''),
                        'responsive' => true,
                        'default'    => 'left',
                    ],
                    'button_padding' => [
                        'type'       => 'dimension',
                        'label'      => __('Button Padding', ''),
                        'responsive' => true,
                        'units'      => ['px', 'em', 'rem'],
                        'preview'    => [
                            'type'     => 'css',
                            'selector' => 'a.unity-lightbox__button',
                            'property' => 'padding',
                            'important' => true,
                        ],
                    ],
                    'button_background_color' => [
                        'type'       => 'color',
                        'label'      => __('Button Background Color', ''),
                        'help'       => __('By selecting the background color, the text color will automatically update in order to meet WCAG 2.1 Level AA guidelines for color contrast ratios.', ''),
                        'show_reset' => true,
                        'show_alpha' => false,
                    ],
                    'button_background_color_interact' => [
                        'type'       => 'color',
                        'label'      => __('Button Background Color (Hover / Focus)', ''),
                        'help'       => __('By selecting the background color, the text color will automatically update in order to meet WCAG 2.1 Level AA guidelines for color contrast ratios.', ''),
                        'show_reset' => true,
                        'show_alpha' => false,
                    ],
					'button_typography' => [
                        'type'       => 'typography',
                        'label'      => __('Button Typography', ''),
                        'responsive' => true,
                        'preview'    => [
                            'type'     => 'css',
                            'selector' => 'a.unity-lightbox__button',
                        ],
                    ],
                    'button_border' => [
						'type'       => 'border',
						'label'      => __('Button Border', ''),
						'responsive' => true,
						'preview'    => [
							'type'      => 'css',
							'selector' => 'a.unity-lightbox__button',
                            'property' => 'border',
							'important' => true,
                        ],
                    ],
                ],
            ],
        ],
    ],
]);
