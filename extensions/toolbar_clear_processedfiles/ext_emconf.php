<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Clear processed files TYPO3 backend toolbar button',
    'description' => 'TYPO3 backend toolbar button to clear processed files on local storages',
    'version' => '2.0.0',
    'state' => 'stable',
    'author' => 'Josef Glatz',
    'author_email' => 'josefglatz@gmailcom',
    'clearCacheOnLoad' => true,
    'category' => 'be',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.4.99',
            'php' => '7.2.0-0.0.0'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
