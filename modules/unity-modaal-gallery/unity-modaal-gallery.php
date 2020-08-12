<?php

class UnityModaalGalleryModule extends FLBuilderModule {

    public function __construct() {
        parent::__construct([
            'name'        => __( 'Modaal Gallery', 'unity-a11y-bb' ),
            'description' => __( 'A button that opens an accessible Modaal dialog window with multiple images.', 'unity-a11y-bb' ),
            'icon'        => 'button.svg',
            'category'    => __( 'Unity', 'unity-a11y-bb' ),
            'dir'         => UNITY_A11Y_BB_DIR . 'modules/unity-modaal-gallery/',
            'url'         => UNITY_A11Y_BB_URL . 'modules/unity-modaal-gallery/',
        ]);
    }

}

FLBuilder::register_module( 'UnityModaalGalleryModule', [
    'unity-modaal-gallery-general' => [
        'title'    => __( 'General', 'unity-a11y-bb' ),
        'sections' => [
            'content' => [
                'title'  => __( 'Content', 'unity-a11y-bb' ),
                'fields' => [
                    'modaal_images' => [
                        'type'          => 'multiple-photos',
                        'label'         => __( 'Gallery', 'unity-a11y-bb' ),
                    ],
                ],
            ],
        ],
    ],
] );
