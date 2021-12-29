<?php

/*
 *
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 *
 */

$tempColumns = [
  'tx_lmrcontentprovider_brow' =>
  [
    'config' =>
    [
      'type' => 'input',
      'eval' => 'trim',
    ],
    'exclude' => '1',
    'label' => 'LLL:EXT:lmr_contentprovider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_lmrcontentprovider_brow',
  ],
];
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
    'LLL:EXT:lmr_contentprovider/Resources/Private/Language/locallang_db.xlf:tt_content.CType.div._lmrcontentprovider_',
    '--div--',
];
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
    'LLL:EXT:lmr_contentprovider/Resources/Private/Language/locallang_db.xlf:tt_content.CType.lmrcontentprovider_header_image',
    'lmrcontentprovider_header_image',
    'tx_lmrcontentprovider_header_image',
];
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
    'LLL:EXT:lmr_contentprovider/Resources/Private/Language/locallang_db.xlf:tt_content.CType.lmrcontentprovider_teaser',
    'lmrcontentprovider_teaser',
    'tx_lmrcontentprovider_teaser',
];
$tempTypes = [
  'lmrcontentprovider_header_image' =>
  [
    'columnsOverrides' =>
    [
      'bodytext' =>
      [
        'config' =>
        [
          'richtextConfiguration' => 'default',
          'enableRichtext' => 1,
        ],
      ],
    ],
    'showitem' => '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,tx_lmrcontentprovider_brow,header,bodytext,header_link,image,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,--palette--;;language,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,--palette--;;hidden,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,--div--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,categories,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,rowDescription,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,tx_gridelements_container,tx_gridelements_columns, --div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements',
  ],
  'lmrcontentprovider_teaser' =>
  [
    'columnsOverrides' =>
    [
      'bodytext' =>
      [
        'config' =>
        [
          'richtextConfiguration' => 'default',
          'enableRichtext' => 1,
        ],
      ],
    ],
    'showitem' => '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,tx_lmrcontentprovider_brow,header,subheader,bodytext,header_link,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,--palette--;;language,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,--palette--;;hidden,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,--div--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,categories,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,rowDescription,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,tx_gridelements_container,tx_gridelements_columns, --div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements',
  ],
];
$GLOBALS['TCA']['tt_content']['types'] += $tempTypes;
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'lmr_contentprovider',
    'Configuration/TypoScript/',
    'lmr_contentprovider'
);
