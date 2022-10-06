<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Secrets',
    'description' => 'Share secrets which are encrypted by your own webserver and not by any other third party.',
    'category' => 'plugin',
    'author' => 'Philipp Kuhlmay',
    'author_email' => 'philipp.kuhlmay@wacon.de',
    'state' => 'alpha',
    'clearCacheOnLoad' => 0,
    'version' => '0.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
