<?php
defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'secrets',
    'Create',
    'Create Secret'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'secrets',
    'Show',
    'Show Secret'
);
