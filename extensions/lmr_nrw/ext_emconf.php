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
            'typo3' => '10.4.0-11.5.99',
            'news' => '8.3.0-8.9.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Failx\\LMRNRW\\' => 'Classes',
        ],
    ],
];
