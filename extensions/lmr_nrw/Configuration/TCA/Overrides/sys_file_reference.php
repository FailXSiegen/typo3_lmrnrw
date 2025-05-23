<?php

if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(
    function ($extKey, $table) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns($table, [
            'image_style' => [
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        0 => [
                            0 => 'Graustufen (Standard)',
                            1 => \Failx\LmrNrw\Enumeration\ImageStyleEnumeration::DEFAULT,
                        ],
                        1 => [
                            0 => 'Ohne Modifikation',
                            1 => \Failx\LmrNrw\Enumeration\ImageStyleEnumeration::NO_MODIFICATION,
                        ]
                    ],
                    'maxitems' => '1',
                ],
                'exclude' => '1',
                'label' => 'Bild-Stil'
            ],
            'showinpreview' => [
                'exclude' => true,
                'label' => 'Bildposition',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['Gallerie neben News', 0, ''],
                        ['Bühnen-Bild', 2, ''],
                    ],
                    'default' => 0,
                ]
            ],
        ]);
        $GLOBALS['TCA']['sys_file_reference']['palettes']['imageoverlayPalette']['showitem'] = '
            title,alternative,
            --linebreak--,
            image_style,
            --linebreak--,
            description,
            --linebreak--,
            crop
            ';
    },
    'lmr_nrw',
    'sys_file_reference'
);
