<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Secrets',
    'description' => 'secrets is used to encrypt messages and share them as a one-time link. The extension is suitable for organizations that place particular emphasis on security and trustworthiness. Since all communication takes place via your own web server, no third-party tools from servers whose location is not known (DSGVO) are necessary. Your own domain name in the link is more trustworthy and makes a more professional impression.',
    'category' => 'plugin',
    'author' => 'Kerstin Schmitt',
    'author_email' => 'info@wacon.de',
    'author_company' => 'WACON Internet GmbH',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '2.0.4',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
