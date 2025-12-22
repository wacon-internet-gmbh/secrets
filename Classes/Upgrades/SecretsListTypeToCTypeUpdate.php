<?php

declare(strict_types=1);

namespace WACON\Secrets\Upgrades;


use TYPO3\CMS\Core\Attribute\UpgradeWizard;
use TYPO3\CMS\Core\Upgrades\AbstractListTypeToCTypeUpdate;

#[UpgradeWizard('SecretsListTypeToCTypeUpdate')]
final class SecretsListTypeToCTypeUpdate extends AbstractListTypeToCTypeUpdate
{
    protected function getListTypeToCTypeMapping(): array
    {
        return [
            'secrets_create' => 'secrets_create',
            'secrets_show' => 'secrets_show',
        ];
    }

    public function getTitle(): string
    {
        return 'Migrates Secrets plugins';
    }

    public function getDescription(): string
    {
        return 'Migrates secrets_create, secrets_show from list_type to CType.';
    }
}