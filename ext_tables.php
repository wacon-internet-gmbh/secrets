<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_secrets_domain_model_secrets', 'EXT:secrets/Resources/Private/Language/locallang_csh_tx_secrets_domain_model_secrets.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_secrets_domain_model_secrets');
})();
