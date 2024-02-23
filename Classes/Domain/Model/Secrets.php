<?php

declare(strict_types=1);

namespace WACON\Secrets\Domain\Model;


/**
 * This file is part of the "Secrets" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Kerstin Schmitt <info@wacon.de>, WACON Internet GmbH
 */

/**
 * Secrets
 */
class Secrets extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * secret
     *
     * @var string
     */
    protected $secret = null;

    /**
     * Returns the secret
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Sets the secret
     *
     * @param string $secret
     * @return void
     */
    public function setSecret(string $secret)
    {
        $this->secret = $secret;
    }
}
