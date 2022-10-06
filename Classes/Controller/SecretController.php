<?php

declare(strict_types=1);

namespace Wacon\Secrets\Controller;

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
 * SecretController
 */
class SecretController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * secretRepository
     *
     * @var \Wacon\Secrets\Domain\Repository\SecretRepository
     */
    protected $secretRepository = null;

    /**
     * @param \Wacon\Secrets\Domain\Repository\SecretRepository $secretRepository
     */
    public function injectSecretRepository(\Wacon\Secrets\Domain\Repository\SecretRepository $secretRepository)
    {
        $this->secretRepository = $secretRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $secrets = $this->secretRepository->findAll();
        $this->view->assign('secrets', $secrets);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Wacon\Secrets\Domain\Model\Secret $secret
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Wacon\Secrets\Domain\Model\Secret $secret): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('secret', $secret);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \Wacon\Secrets\Domain\Model\Secret $newSecret
     */
    public function createAction(\Wacon\Secrets\Domain\Model\Secret $newSecret)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->secretRepository->add($this->generateMd5Hash($newSecret));
        $this->redirect('list');
    }

    /**
     * Generates the MD5 hashed secret
     *
     * @param Secret $secret
     * @return Secret
     */
    private function generateMd5Hash(Secret $secret)
    {
        $_secret = $secret;

        //$_secret->setKunde(password_needs_rehash($_secret->getSecret(), PASSWORD_BCRYPT));
        $_secret->setSecret(openssl_encrypt($secret->getSecret(), "seed", $secret->getSecretKey()));
        $_secret->setSecretKey("");
        return $_secret;
    }

    /**
     * action delete
     *
     * @param \Wacon\Secrets\Domain\Model\Secret $secret
     */
    public function deleteAction(\Wacon\Secrets\Domain\Model\Secret $secret)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->secretRepository->remove($secret);
        $this->redirect('list');
    }
}
