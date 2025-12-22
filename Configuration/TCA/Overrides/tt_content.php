<?php
defined('TYPO3') || die();
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

(static function (): void {
  ExtensionUtility::registerPlugin(
    'secrets',
    'Create',
    'Create Secret',
    'secrets-plugin-create',
    'default',
    'Secrets is used to encrypt messages and share them as a one-time link.'
  );

  ExtensionUtility::registerPlugin(
    'secrets',
    'Show',
    'Show Secret',
    'secrets-plugin-show',
    'default',
    'Secrets is used to encrypt messages and share them as a one-time link.'
  );
})();