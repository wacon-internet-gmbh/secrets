<?php
defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Secrets',
    'Create',
    'Create Secret '
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Secrets',
    'Show',
    'Show Secret'
);
