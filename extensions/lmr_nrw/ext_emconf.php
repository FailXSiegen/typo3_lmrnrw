<?php

$EM_CONF['lmr_nrw'] = [
    'title' => 'Landesmusikrat NRW Templates',
    'description' => 'basic template extension and configs for Landesmusikrat NRW',
    'category' => 'backend',
    'version' => '1.0.0',
    'state' => 'stable',
    'author' => 'Felix Herrmann',
    'author_email' => 'info@failx.de',
    'author_company' => 'Landesmusikrat NRW',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.4.99',
            'news' => '12.0.0-13.9.99',
            'tt_address' => '9.0.0-9.9.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Failx\\LmrNrw\\' => 'Classes',
        ],
    ],
];
