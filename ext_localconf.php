<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Secrets',
        'Create',
        [
            \WACON\Secrets\Controller\SecretsController::class => 'new, create,list'
        ],
        // non-cacheable actions
        [
            \WACON\Secrets\Controller\SecretsController::class => 'create,list'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Secrets',
        'Show',
        [
            \WACON\Secrets\Controller\SecretsController::class => 'ask, show, delete'
        ],
        // non-cacheable actions
        [
            \WACON\Secrets\Controller\SecretsController::class => 'ask, show, delete'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    create {
                        iconIdentifier = secrets-plugin-create
                        title = LLL:EXT:secrets/Resources/Private/Language/locallang_db.xlf:tx_secrets_create.name
                        description = LLL:EXT:secrets/Resources/Private/Language/locallang_db.xlf:tx_secrets_create.description
                        tt_content_defValues {
                            CType = list
                            list_type = secrets_create
                        }
                    }
                    show {
                        iconIdentifier = secrets-plugin-show
                        title = LLL:EXT:secrets/Resources/Private/Language/locallang_db.xlf:tx_secrets_show.name
                        description = LLL:EXT:secrets/Resources/Private/Language/locallang_db.xlf:tx_secrets_show.description
                        tt_content_defValues {
                            CType = list
                            list_type = secrets_show
                        }
                    }
                }
                show = *
            }
       }'
    );
})();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Scheduler\Task\TableGarbageCollectionTask::class]['options']['tables']['tx_secrets_domain_model_secrets'] = [
    'dateField' => 'tstamp',
    'expirePeriod' => '14',
 ];
