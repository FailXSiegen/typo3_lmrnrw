<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}



call_user_func(
    function ($_EXTKEY) {
        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->registerContainer(
            'bgcontainer',
            'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:bgcontainer.title',
            'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:bgcontainer.description',
            'content-image',
            [
                [
                    ['name' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:content', 'colPos' => 103]
                ]
            ]
        );
        $GLOBALS['TCA']['tt_content']['types']['slider']['showitem'] =  '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            header,--palette--;;carousel,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;;frames,
            --palette--;;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
            --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;;access,';


        $GLOBALS['TCA']['tt_content']['types']['bgcontainer']['showitem'] =  '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            header; Internal title (not displayed),image, bgimage_position,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;;frames,
            --palette--;;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
            --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;;access,';

        $GLOBALS['TCA']['tt_content']['palettes']['carousel'] = [
            'label' => 'Slider',
            'description' => 'Slider Properties',
            'showitem' => 'carousel_controls, carousel_indicators, carousel_captions, --linbreak---, carousel_crossfade, carousel_intervall'
        ];
        $columns = [
            'header' => [
                'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header',
                'config' => [
                    'type' => 'text',
                    'cols' => 40,
                    'rows' => 3,
                    'eval' => 'required',
                ],
            ],
            'parallax' => [
                'label' => 'Bild mit Parallax',
                'exclude' => 0,
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'items' => [
                        [
                            0 => '',
                            1 => '',
                        ]
                    ],
                ],
            ],
            'parallaxoption' => [
                'label' => 'Parallax-Optionen',
                'description' => 'Positive Zahl für Bewegung von unten nach oben; Negative Zahl für Bewegung von oben nach unten; Default: -0.15',
                'exclude' => 0,
                'config' => [
                    'type' => 'input',
                    'eval' => 'trim',
                    'default' => '-0.15',
                ],
            ],
            'animatecss' => [
                'label' => 'Zusätzliche Animationsklassen',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['Keine', ''],
                        ['FadeIn', 'fadeIn'],
                        ['FadeInDown', 'fadeInDown'],
                        ['FadeInLeft', 'fadeInLeft'],
                        ['FadeInRight', 'fadeInRight'],
                        ['FadeInUp', 'fadeInUp'],
                        ['SlideIn', 'slideIn'],
                        ['SlideInDown', 'slideInDown'],
                        ['SlideInLeft', 'slideInLeft'],
                        ['SlideInRight', 'slideInRight'],
                        ['SlideInUp', 'slideInUp'],
                    ],
                ],
            ],
            'opacity' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:opacity',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:opacity.description',
                'config' => [
                    'type' => 'input',
                    'size' => 10,
                    'eval' => 'trim,int',
                    'range' => [
                        'lower' => 20,
                        'upper' => 100,
                    ],
                    'default' => 100,
                    'slider' => [
                        'step' => 20,
                        'width' => 200,
                    ],
                ],
            ],
            'counter_start' => [
                'label' => 'Counter start',
                'description'=> 'If start is bigger than end it counts backwards',
                'config' => [
                    'type' => 'input',
                    'default' => '0'
                ],
            ],
            'counter_end' => [
                'label' => 'Counter end',
                'config' => [
                    'type' => 'input',
                    'default' => '9001'
                ],
            ],
            'counter_duration' => [
                'label' => 'Counter duration',
                'config' => [
                    'type' => 'input',
                    'default' => '2'
                ],
            ],
            'counter_delay' => [
                'label' => 'Counter delay',
                'config' => [
                    'type' => 'input',
                    'default' => '10'
                ],
            ],
            'counter_once' => [
                'label' => 'Counter once',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 1
                ],
            ],
            'counter_decimals' => [
                'label' => 'Counter decimals',
                'config' => [
                    'type' => 'input',
                    'default' => '0'
                ],
            ],
            'counter_decimalseparatorsymbol' => [
                'label' => 'Counter decimal separator symbl',
                'config' => [
                    'type' => 'input',
                    'default' => ','
                ],
            ],
            'counter_currency' => [
                'label' => 'Counter currency',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 0
                ],
            ],
            'counter_currencyposition' => [
                'label' => 'Counter currency position',
                'config' => [
                    'type' => 'radio',
                    'items' => [
                        ['left', 'left'],
                        ['right', 'right'],
                    ],
                    'default' => 'left'
                ],
            ],
            'counter_currencysymbol' => [
                'label' => 'Counter currency symbol',
                'config' => [
                    'type' => 'input',
                    'default' => '€'
                ],
            ],
            'counter_separator' => [
                'label' => 'Counter separator',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 1
                ],
            ],
            'counter_separatorsymbol' => [
                'label' => 'Counter separator symbol',
                'config' => [
                    'type' => 'input',
                    'default' => ','
                ],
            ],
            'carousel_controls' => [
                'label' => 'Slider Controls',
                'description' => 'Adds arrows left and right',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 0
                ],
            ],
            'carousel_indicators' => [
                'label' => 'Slider Indicators',
                'description' => 'Adds bars to the bottom of the slides',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 0
                ],
            ],
            'carousel_captions' => [
                'label' => 'Slider Captions',
                'description' => 'Set header and optional subheader from slide element as content overlay. Useful for Images. No HTML interpreted!',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 0
                ],
            ],
            'carousel_crossfade' => [
                'label' => 'Slider Fade',
                'description' => 'Set fade transition effect instead of movement',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 0
                ],
            ],
            'carousel_intervall' => [
                'label' => 'Slider Intervall',
                'description' => 'Empty to set autoplay to false; Set in ms (1000 for 1 sec)',
                'config' => [
                    'type' => 'input',
                    'default' => 4000
                ],
            ],
        ];
        $GLOBALS['TCA']['tt_content']['columns']['frame_class']['config']['fieldWizard']['selectIcons']['disabled'] = '0';
        // Add TCA columns.
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
            'tt_content',
            $columns
        );

        $container_columns = [
            'bgimage_class' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:bgimage.class',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:bgimage.class.description',
                'config' => [
                    'renderType' => 'selectMultipleSideBySide',
                    'type' => 'select',
                    'items' => [
                        ['---',''],
                    ],
                ],
            ],
            'bgimage_position' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:bgcontainer.position',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:bgcontainer.position.description',
                'config' => [
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                    'items' => [
                        ['---',''],
                        ['Top Left','position-absolute top-0 start-0','EXT:lmr_nrw/Resources/Public/Icons/top-left.png'],
                        ['Top Center','position-absolute top-0 start-50 translate-middle-x','EXT:lmr_nrw/Resources/Public/Icons/top-center.png'],
                        ['Top Right','position-absolute top-0 end-0','EXT:lmr_nrw/Resources/Public/Icons/top-right.png'],
                        ['Center Left','position-absolute top-50 start-0 translate-middle-y','EXT:lmr_nrw/Resources/Public/Icons/center-left.png'],
                        ['Center Center','position-absolute top-50 start-50 translate-middle','EXT:lmr_nrw/Resources/Public/Icons/center-center.png'],
                        ['Center Right','position-absolute top-50 end-0 translate-middle-y','EXT:lmr_nrw/Resources/Public/Icons/center-right.png'],
                        ['Bottom Left','position-absolute bottom-0 start-0','EXT:lmr_nrw/Resources/Public/Icons/bottom-left.png'],
                        ['Bottom Center','position-absolute bottom-0 start-50 translate-middle-x','EXT:lmr_nrw/Resources/Public/Icons/bottom-center.png'],
                        ['Bottom Right','position-absolute bottom-0 end-0','EXT:lmr_nrw/Resources/Public/Icons/bottom-right.png']
                    ],
                    'fieldWizard' => [
                        'selectIcons' => [
                            'disabled' => false,
                        ],
                    ],
                ],
            ],
            'space_start_class' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:space.start',
                'config' => [
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                    'items' => [
                        ['Default',''],
                        ['0','ps-0'],
                        ['1','ps-1'],
                        ['2','ps-2'],
                        ['3','ps-3'],
                        ['4','ps-4'],
                        ['5','ps-5'],
                        ['6','ps-2 ps-md-4 ps-xl-6'],
                        ['7','ps-2 ps-md-4 ps-xl-7'],
                        ['8','ps-2 ps-md-5 ps-xl-8'],
                        ['9','ps-2 ps-md-5 ps-xl-9'],
                        ['10','ps-2 ps-md-5 ps-xl-10'],
                        ['Auto','ms-auto'],
                    ],
                ],
            ],
            'space_end_class' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:space.end',
                'config' => [
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                    'items' => [
                        ['Default',''],
                        ['0','pe-0'],
                        ['1','pe-1'],
                        ['2','pe-2'],
                        ['3','pe-3'],
                        ['4','pe-4'],
                        ['5','pe-5'],
                        ['6','pe-2 pe-md-4 pe-xl-6'],
                        ['7','pe-2 pe-md-4 pe-xl-7'],
                        ['8','pe-2 pe-md-5 pe-xl-8'],
                        ['9','pe-2 pe-md-5 pe-xl-9'],
                        ['10','pe-2 pe-md-5 pe-xl-10'],
                        ['Auto','me-auto'],
                    ],
                ],
            ],
            'circle_active' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.active',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.active.description',
                'onChange' => 'reload',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'items' => [
                        [
                           0 => '',
                           1 => '',
                        ]
                     ],
                ],
            ],
            'circle_color' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.color',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.color.description',
                'displayCond' => [
                    'OR' => [
                        'FIELD:circle_active:REQ:true',
                        'FIELD:CType:=:trust',
                    ]
                ],
                'config' => [
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                    'items' => [
                        ['Default',''],
                        ['LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:color.white','white','EXT:lmr_nrw/Resources/Public/Icons/color-white.png'],
                        ['LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:color.grey','grey','EXT:lmr_nrw/Resources/Public/Icons/color-grey.png'],
                        ['LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:color.darkgrey','darkgrey','EXT:lmr_nrw/Resources/Public/Icons/color-darkgrey.png'],
                        ['LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:color.lightgrey','lightgrey','EXT:lmr_nrw/Resources/Public/Icons/color-lightgrey.png'],
                        ['LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:color.red','darkred','EXT:lmr_nrw/Resources/Public/Icons/color-red.png'],
                        ['LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:color.darkred','red','EXT:lmr_nrw/Resources/Public/Icons/color-darkred.png'],
                    ],
                    'fieldWizard' => [
                        'selectIcons' => [
                            'disabled' => false,
                        ],
                    ],
                ],
            ],
            'circle_opacity' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:opacity',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:opacity.description',
                'displayCond' => [
                    'OR' => [
                        'FIELD:circle_active:REQ:true',
                        'FIELD:CType:=:trust',
                    ]
                ],
                'config' => [
                    'type' => 'input',
                    'size' => 10,
                    'eval' => 'trim,int',
                    'range' => [
                        'lower' => 20,
                        'upper' => 100,
                    ],
                    'default' => 100,
                    'slider' => [
                        'step' => 20,
                        'width' => 200,
                    ],
                ],
            ],
            'circle_position' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.position',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.position.description',
                'displayCond' => 'FIELD:circle_active:REQ:true',
                'config' => [
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                    'items' => [
                        ['---',''],
                        ['Top Left','position-absolute top-0 start-0','EXT:lmr_nrw/Resources/Public/Icons/top-left.png'],
                        ['Top Center','position-absolute top-0 start-50 translate-middle-x','EXT:lmr_nrw/Resources/Public/Icons/top-center.png'],
                        ['Top Right','position-absolute top-0 end-0','EXT:lmr_nrw/Resources/Public/Icons/top-right.png'],
                        ['Center Left','position-absolute top-50 start-0 translate-middle-y','EXT:lmr_nrw/Resources/Public/Icons/center-left.png'],
                        ['Center Center','position-absolute top-50 start-50 translate-middle','EXT:lmr_nrw/Resources/Public/Icons/center-center.png'],
                        ['Center Right','position-absolute top-50 end-0 translate-middle-y','EXT:lmr_nrw/Resources/Public/Icons/center-right.png'],
                        ['Bottom Left','position-absolute bottom-0 start-0','EXT:lmr_nrw/Resources/Public/Icons/bottom-left.png'],
                        ['Bottom Center','position-absolute bottom-0 start-50 translate-middle-x','EXT:lmr_nrw/Resources/Public/Icons/bottom-center.png'],
                        ['Bottom Right','position-absolute bottom-0 end-0','EXT:lmr_nrw/Resources/Public/Icons/bottom-right.png']
                    ],
                    'fieldWizard' => [
                        'selectIcons' => [
                            'disabled' => false,
                        ],
                    ],
                ],
            ],
            'circle_width' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.width',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.width.description',
                'displayCond' => 'FIELD:circle_active:REQ:true',
                'config' => [
                    'type' => 'input',
                    'size' => 10,
                    'eval' => 'trim,int',
                    'range' => [
                        'lower' => 0,
                        'upper' => 100,
                    ],
                    'default' => 0,
                    'slider' => [
                        'step' => 1,
                        'width' => 200,
                    ],
                ],
            ],
            'circle_height' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.height',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.height.description',
                'displayCond' => 'FIELD:circle_active:REQ:true',
                'config' => [
                    'type' => 'input',
                    'size' => 10,
                    'eval' => 'trim,int',
                    'range' => [
                        'lower' => 0,
                        'upper' => 100,
                    ],
                    'default' => 0,
                    'slider' => [
                        'step' => 1,
                        'width' => 200,
                    ],
                ],
            ],
            'circle_offset_x' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.offsetx',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.offsetx.description',
                'displayCond' => 'FIELD:circle_active:REQ:true',
                'config' => [
                    'type' => 'input',
                    'size' => 10,
                    'eval' => 'trim,int',
                    'range' => [
                        'lower' => -100,
                        'upper' => 100,
                    ],
                    'default' => 0,
                    'slider' => [
                        'step' => 1,
                        'width' => 200,
                    ],
                ],
            ],
            'circle_offset_y' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.offsety',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:circle.offsety.description',
                'displayCond' => 'FIELD:circle_active:REQ:true',
                'config' => [
                    'type' => 'input',
                    'size' => 10,
                    'eval' => 'trim,int',
                    'range' => [
                        'lower' => -100,
                        'upper' => 100,
                    ],
                    'default' => 0,
                    'slider' => [
                        'step' => 1,
                        'width' => 200,
                    ],
                ],
            ],
            'overflow_hidden' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:overflow.hidden',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:overflow.hidden.description',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'items' => [
                        [
                           0 => '',
                           1 => '',
                        ]
                     ],
                ],
            ],
            'text_columns' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:text_columns',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:text_columns.description',
                'config' => [
                    'type' => 'input',
                    'size' => 2,
                    'eval' => 'trim,int',
                    'range' => array(
                        'lower' => 0,
                        'upper' => 4
                     ),
                    'max' => 1,
                    'default' => 1
                ],
            ],
        ];
        // Add TCA columns.
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
            'tt_content',
            $container_columns
        );
       
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
            'tt_content',
            'text_columns, --linebreak--',
            '',
            'before:bodytext'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
            'tt_content',
            'frames',
            'space_start_class, space_end_class, --linebreak--,
            overflow_hidden, --linebreak--,
            circle_active, --linebreak--,
            circle_position, circle_color, circle_opacity, --linebreak--,
            circle_width, circle_height, --linebreak--,
            circle_offset_x, circle_offset_y',
            'after:space_after_class,'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
            'tt_content',
            'frames',
            'opacity, --linebreak--,',
            'after:frame_class'
        );
        ;

        $GLOBALS['TCA']['tt_content']['palettes']['counter_config'] = [
            'label' => 'Counter config',
            'showitem' => 'frame_class;Counter-Schriftgröße,--linebreak--,
                counter_start, counter_end,--linebreak--,
                counter_duration, counter_delay,--linebreak--,
                counter_decimals, counter_decimalseparatorsymbol, --linebreak--,
                counter_once,--linebreak--,
                counter_currency, counter_currencyposition, counter_currencysymbol,--linebreak--,
                counter_separator, counter_separatorsymbol,'
        ];

        $GLOBALS['TCA']['tt_content']['types']['counter'] = [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;;general,
                header,
                --palette--;;counter_config,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;;access,
            ',
        ];

        $GLOBALS['TCA']['tt_content']['types']['tilebox'] = [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    --palette--;;headers,
                    pages;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:pages.ALT.menu_formlabel,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                    --palette--;;frames,
                    --palette--;;appearanceLinks,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.accessibility,
                    --palette--;;menu_accessibility,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
            ',
        ];

        $GLOBALS['TCA']['tt_content']['types']['trust'] = [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    --palette--;;headers,
                    bodytext,--linebreak--, layout, frame_class, opacity,--linebreak--, circle_color, circle_opacity,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.accessibility,
                    --palette--;;menu_accessibility,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
            ',
        ];

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
            'tt_content',
            'CType',
            [
                 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:counter',
                 'counter',
                 'content-script',
             ],
            'textmedia',
            'after'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
            'tt_content',
            'CType',
            [
                 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:tilebox',
                 'tilebox',
                 'content-menu-pages',
             ],
            'textmedia',
            'after'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
            'tt_content',
            'CType',
            [
                 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:trust',
                 'trust',
                 'content-bullets',
             ],
            'tilebox',
            'after'
        );
    },
    'lmr_nrw'
);
