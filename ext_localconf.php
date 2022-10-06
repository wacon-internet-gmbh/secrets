<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Secrets',
        'Secret',
        [
            \Wacon\Secrets\Controller\SecretController::class => 'show'
        ],
        // non-cacheable actions
        [
            \Wacon\Secrets\Controller\SecretController::class => 'show'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    secret {
                        iconIdentifier = secrets-plugin-secret
                        title = LLL:EXT:secrets/Resources/Private/Language/locallang_db.xlf:tx_secrets_secret.name
                        description = LLL:EXT:secrets/Resources/Private/Language/locallang_db.xlf:tx_secrets_secret.description
                        tt_content_defValues {
                            CType = list
                            list_type = secrets_secret
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder