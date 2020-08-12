<?php

class UnityAccordionModule extends FLBuilderModule {

    public function __construct() {
        parent::__construct([
            'name'        => __( 'Accordion', 'unity-a11y-bb' ),
            'description' => __( 'A collapseable accordion.', 'unity-a11y-bb' ),
            'icon'        => 'button.svg',
            'category'    => __( 'Unity', 'unity-a11y-bb' ),
            'dir'         => UNITY_A11Y_BB_DIR . 'modules/unity-accordion/',
            'url'         => UNITY_A11Y_BB_URL . 'modules/unity-accordion/',
        ]);
    }

}

FLBuilder::register_module('UnityAccordionModule', [
    'unity-accordion-general' => [
        'title'    => __( 'General', 'unity-a11y-bb' ),
        'sections' => [
            'content' => [
                'title'  => __( 'Content', 'unity-a11y-bb' ),
                'fields' => [
                ],
            ],
        ],
    ],
]);
