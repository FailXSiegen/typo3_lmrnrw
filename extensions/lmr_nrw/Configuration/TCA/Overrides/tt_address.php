<?php
/***************************************************************
  *  Copyright notice
  *
  *  (c) 2019 Felix Herrmann <info@failx.de>
  *      Created on: 27.09.17 14:58
  *
  *  All rights reserved
  *
  *  This script is part of the TYPO3 project. The TYPO3 project is
  *  free software; you can redistribute it and/or modify
  *
  *  it under the terms of the GNU General Public License as published by
  *  the Free Software Foundation; either version 3 of the License, or
  *  (at your option) any later version.
  *
  *  The GNU General Public License can be found at
  *  http://www.gnu.org/copyleft/gpl.html.
  *
  *  This script is distributed in the hope that it will be useful,
  *  but WITHOUT ANY WARRANTY; without even the implied warranty of
  *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  *  GNU General Public License for more details.
  *
  *  This copyright notice MUST APPEAR in all copies of the script!
  ***************************************************************/

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(
    function ($_EXTKEY) {
        $version9 = \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch) >= \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger('9.3');

        $generalLanguageFilePrefix = $version9 ? 'LLL:EXT:core/Resources/Private/Language/' : 'LLL:EXT:lang/Resources/Private/Language/';


        $columns = [
            'company' => [
                'exclude' => true,
                'label' => 'LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address.organization',
                'config' => [
                    'type' => 'text',
                    'cols' => 40,
                    'rows' => 3,
                ]
            ],
        ];
        // Add TCA columns.
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
            'tt_address',
            $columns
        );
        $GLOBALS['TCA']['tt_address']['ctrl']['label_alt'] = 'company';
        $GLOBALS['TCA']['tt_address']['ctrl']['label_alt_force'] = 1;
        $GLOBALS['TCA']['tt_address']['palettes']['name']['showitem'] = 'gender, --linebreak--, title, --linebreak--,
            first_name, middle_name, last_name,--linebreak--,name,
        ';
        $GLOBALS['TCA']['tt_address']['palettes']['organization']['showitem'] = '
            position, --linebreak--, company
        ';
        $GLOBALS['TCA']['tt_address']['palettes']['address']['showitem'] = '
            address, --linebreak--,
            zip, city,  region, --linebreak--,
            country,  --linebreak--,';
        $GLOBALS['TCA']['tt_address']['types'] = [
            '0' => [
                'showitem' => '
                    --palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.name;name,
                    image, 
                    --palette--;LLL:EXT:t_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.organization;organization,
                    --palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.contact;contact,
                    
                    description,
                --div--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_tab.address,
                    --palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.address;address,
                --div--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_tab.contact,
                    --palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.social;social,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;paletteHidden,
                    --palette--;;paletteAccess,
                --div--;' . $generalLanguageFilePrefix . 'locallang_tca.xlf:sys_category.tabs.category, categories
                '
            ]
            ];
    },
    'lmr_nrw'
);
