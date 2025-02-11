<?php

if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(
    function ($_EXTKEY) {
        $columns = [
            'text_columns' => [
                'label' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:text_columns',
                'description' => 'LLL:EXT:lmr_nrw/Resources/Private/Language/locallang_db.xlf:text_columns.description',
                'config' => [
                    'type' => 'input',
                    'size' => 2,
                    'eval' => 'trim,int',
                    'range' => array(
                        'lower' => 1,
                        'upper' => 4
                     ),
                    'max' => 1,
                    'default' => 1
                ],
            ],
        ];
        // Add TCA columns.
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
            'tx_news_domain_model_news',
            $columns
        );
       
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
            'tx_news_domain_model_news',
            'text_columns, --linebreak--',
            '',
            'before:bodytext'
        );
    },
    'lmr_nrw'
);
