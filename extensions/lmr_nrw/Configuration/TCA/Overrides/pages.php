<?php
/***************************************************************
  *  Copyright notice
  *
  *  (c) 2019 Felix Herrmann <info@failx.de>
  *      Created on: 28.09.17 15:23
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
        // get absolute path the PageTSconfig directory.
        $path = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'Configuration/PageTSconfig/';
        // Collect .ts files.
        $filesTS = \TYPO3\CMS\Core\Utility\GeneralUtility::getFilesInDir($path, 'ts');
        // Collect .txt files
        $filesTXT = \TYPO3\CMS\Core\Utility\GeneralUtility::getFilesInDir($path, 'typoscript');
        // Merge collected files.
        $files = array_merge($filesTS, $filesTXT);
        foreach ($files as $fileKey => $fileValue) {
            // Register all files under PageTS
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
                $_EXTKEY,
                'Configuration/PageTSconfig/'.$fileValue,
                $fileValue
            );
        }

        $columns = [
            'subtitle' => [
                'exclude' => true,
                'l10n_mode' => 'prefixLangTitle',
                'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.subtitle',
                'description' => 'optionale Bezeichnung für Kachel-Boxen',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'max' => 255,
                    'eval' => 'trim'
                ]
            ],
            'menu_highlight' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:menu.highlight',
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
            ]
        ];

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
            'pages',
            $columns
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
            'pages',
            'visibility',
            'menu_highlight',
            'after:nav_hide'
        );
    },
    'lmr_nrw'
);
