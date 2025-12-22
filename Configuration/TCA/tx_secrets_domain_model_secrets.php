<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:secrets/Resources/Private/Language/locallang_db.xlf:tx_secrets_domain_model_secrets',
        'label' => 'secret',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true
        ],

        'iconfile' => 'EXT:secrets/Resources/Public/Icons/Extension.png'
    ],
    'types' => [
        '1' => ['showitem' => 'secret, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
      
       

        'secret' => [
            'exclude' => false,
            'label' => 'LLL:EXT:secrets/Resources/Private/Language/locallang_db.xlf:tx_secrets_domain_model_secrets.secret',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
    
    ],
];
