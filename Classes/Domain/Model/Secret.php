<?php

declare(strict_types=1);

namespace Wacon\Secrets\Domain\Model;


/**
 * This file is part of the "Secrets" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Philipp Kuhlmay <philipp.kuhlmay@wacon.de>, Wacon Internet GmbH
 */

/**
 * Secret
 */
class Secret extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * beschreibung
     *
     * @var string
     */
    protected $beschreibung = null;

    /**
     * kunde
     *
     * @var string
     */
    protected $kunde = null;

    /**
     * secret
     *
     * @var string
     */
    protected $secret = null;

    /**
     * secretKey
     *
     * @var string
     */
    protected $secretKey = null;

    /**
     * Returns the beschreibung
     *
     * @return string
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    /**
     * Sets the beschreibung
     *
     * @param string $beschreibung
     * @return void
     */
    public function setBeschreibung(string $beschreibung)
    {
        $this->beschreibung = $beschreibung;
    }

    /**
     * Returns the kunde
     *
     * @return string
     */
    public function getKunde()
    {
        return $this->kunde;
    }

    /**
     * Sets the kunde
     *
     * @param string $kunde
     * @return void
     */
    public function setKunde(string $kunde)
    {
        $this->kunde = $kunde;
    }

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

    /**
     * Returns the secretKey
     *
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }

    /**
     * Sets the secretKey
     *
     * @param string $secretKey
     * @return void
     */
    public function setSecretKey(string $secretKey)
    {
        $this->secretKey = $secretKey;
    }
}
