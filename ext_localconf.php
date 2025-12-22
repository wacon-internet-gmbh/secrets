<?php
defined('TYPO3') || die();

use \TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use \WACON\Secrets\Controller\SecretsController;

(static function() {
    ExtensionUtility::configurePlugin(
        'secrets',
        'Create',
        [
            SecretsController::class => 'new, create,list'
        ],
        // non-cacheable actions
        [
            SecretsController::class => 'create,list'
        ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
    );

    ExtensionUtility::configurePlugin(
        'secrets',
        'Show',
        [
            SecretsController::class => 'ask, show, delete'
        ],
        // non-cacheable actions
        [
            SecretsController::class => 'ask, show, delete',
     
        ],   
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
    );


    

})();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\TableGarbageCollectionTask::class]['options']['tables']['tx_secrets_domain_model_secrets'] = [
    'dateField' => 'tstamp',
    'expirePeriod' => '14',
 ];
