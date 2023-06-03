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

$EM_CONF['lmr_contentprovider'] = [
    'title' => 'lmr_contentprovider',
    'description' => '',
    'category' => 'fe',
    'author' => '',
    'author_email' => '',
    'author_company' => '',
    'state' => 'stable',
    'version' => '0.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
