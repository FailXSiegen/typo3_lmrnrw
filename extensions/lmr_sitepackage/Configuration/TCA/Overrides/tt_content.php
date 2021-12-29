<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$cropVariants['lmrcontentprovider_header_image'] = [
    'image' => [
        'desktop' => [
            'coverAreas' => [
                [
                    'x' => 0,
                    'y' => 0.3,
                    'width' => 0.5,
                    'height' => 0.7,
                ],
            ],
            'resolutions' => [
                '1024x480',
            ],
            'aspectRatios' => [
                '1024x480',
            ],
        ],
        'tablet-large' => [
            'coverAreas' => [
                [
                    'x' => 0,
                    'y' => 0.3,
                    'width' => 0.5,
                    'height' => 0.7,
                ],
            ],
            'resolutions' => [
                '800x480',
            ],
            'aspectRatios' => [
                '800x480',
            ],
        ],
        'tablet-small' => [
            'coverAreas' => [
                [
                    'x' => 0,
                    'y' => 0.45,
                    'width' => 0.8,
                    'height' => 0.55,
                ],
            ],
            'resolutions' => [
                '600x600',
            ],
            'aspectRatios' => [
                '600x600',
            ],
        ],
        'phone' => [
            'coverAreas' => [
                [
                    'x' => 0,
                    'y' => 0.45,
                    'width' => 0.8,
                    'height' => 0.55,
                ],
            ],
            'resolutions' => [
                '375x525',
            ],
            'aspectRatios' => [
                '375x525',
            ],
        ],
    ],
];

//\Smichaelsen\MelonImages\TcaUtility::writeCropVariantsConfigurationToTca($cropVariants);
//
//call_user_func(
//    function ($extKey, $table) {
//        $temporaryColumns = [
//            'image_layout' => [
//                'exclude' => 1,
//                'label' => 'Bildrendering',
//                'config' => [
//                    'type' => 'select',
//                    'renderType' => 'selectSingle',
//                    'items' => [
//
//                    ],
//                ]
//            ]
//        ];
//
//        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
//            $table,
//            $temporaryColumns
//        );
//
//        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
//            $table,
//            'image_layout',
//            '',
//            'before:image'
//        );
//    },
//    'mf_sitepackage',
//    'tt_content'
//);
