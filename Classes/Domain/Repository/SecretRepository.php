<?php

declare(strict_types=1);

namespace Wacon\Secrets\Domain\Repository;


use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use Wacon\Secrets\Domain\Model\Secret;

/**
 * This file is part of the "Secrets" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Philipp Kuhlmay <philipp.kuhlmay@wacon.de>, Wacon Internet GmbH
 */

/**
 * The repository for Secrets
 */
class SecretRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function remove($object)
    {
        // parent::remove($object); // TODO: Really remove the entry. Do not set it to deleted. It should be really removed out of the database
        
        GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('tx_secrets_domain_model_secret')
            ->delete('tx_secrets_domain_model_secret', ['uid' => $object->getUid()]);
    }
}
