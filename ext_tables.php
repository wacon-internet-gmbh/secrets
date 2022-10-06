<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Secrets',
        'tools',
        'secret',
        '',
        [
            \Wacon\Secrets\Controller\SecretController::class => 'list, show, new, create, delete',
            
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:secrets/Resources/Public/Icons/user_mod_secret.svg',
            'labels' => 'LLL:EXT:secrets/Resources/Private/Language/locallang_secret.xlf',
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_secrets_domain_model_secret', 'EXT:secrets/Resources/Private/Language/locallang_csh_tx_secrets_domain_model_secret.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_secrets_domain_model_secret');
})();
