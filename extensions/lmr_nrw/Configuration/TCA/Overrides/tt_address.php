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
    },
    'lmr_nrw'
);