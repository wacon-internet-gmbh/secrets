<?php

declare(strict_types=1);

namespace WACON\Secrets\Controller;


/**
 * This file is part of the "Secrets" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Kerstin Schmitt <info@wacon.de>, WACON Internet GmbH
 */

/**
 * SecretsController
 */
class SecretsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * secretsRepository
     *
     * @var \WACON\Secrets\Domain\Repository\SecretsRepository
     */
    protected $secretsRepository = null;

    /**
     * @param \WACON\Secrets\Domain\Repository\SecretsRepository $secretsRepository
     */
    public function injectSecretsRepository(\WACON\Secrets\Domain\Repository\SecretsRepository $secretsRepository)
    {
        $this->secretsRepository = $secretsRepository;
    }

     /**
     * persistenceManager
     *
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     */
    protected $persistenceManager = null;

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager $persistenceManager
     */
    public function injectPersistenceManager(\TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager $persistenceManager)
    {
        $this->persistenceManager = $persistenceManager;
    }

    /**
     * action list
     *
     * 
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        if($this->request->hasArgument('show'))$secret = $this->request->getArgument('show');
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($arguments);
        $pid = $this->settings['showPid'] ?? 1;
        $this->view->assign('pid', $pid);
        $this->view->assign('secret', $secret);
        return $this->htmlResponse();
    }

     /**
     * action ask
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function askAction(): \Psr\Http\Message\ResponseInterface
    {
        $arguments = $this->request->getArguments();
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($arguments);
       //if($this->request->hasArgument('secret'))$secret = $this->request->getArgument('secret');
       $secret = ($this->request->getQueryParams()['secretid'] ?? 0);
        $key2 = $this->settings['secretkey'] ?? 'default';
$c = base64_decode($secret); 
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC"); 
$iv = substr($c, 0, $ivlen); 
$hmac = substr($c, $ivlen, $sha2len=32); 
$ciphertext_raw = substr($c, $ivlen+$sha2len); 
$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key2, $options=OPENSSL_RAW_DATA, $iv); 
$calcmac = hash_hmac('sha256', $ciphertext_raw, $key2, $as_binary=true); 
if(hash_equals($hmac, $calcmac)){ //PHP 5.6+ Timing attack safe string comparison 
    
    $keyarray = explode('+',$original_plaintext);
    $uid=(int)$keyarray['0'];
    $key1=$keyarray['1'];
    $secretdata = $this->secretsRepository->findByUid($uid);

    $c = base64_decode($secretdata->getSecret()); 
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC"); 
    $iv = substr($c, 0, $ivlen); 
    $hmac = substr($c, $ivlen, $sha2len=32); 
    $ciphertext_raw = substr($c, $ivlen+$sha2len); 
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key1, $options=OPENSSL_RAW_DATA, $iv); 
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key1, $as_binary=true); 
    if(hash_equals($hmac, $calcmac)){ //PHP 5.6+ Timing attack safe string comparison 
        
      $this->view->assign('secret', $secret);
    }else{ 
        $this->view->assign('failed', '1');
    }
   
    
  }else{ 
      $this->view->assign('failed', '1');
  }

        return $this->htmlResponse();
    }

    /**
     * action show
     *
     
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(): \Psr\Http\Message\ResponseInterface
    {
        $arguments = $this->request->getArguments();
         //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($arguments);
        //if($this->request->hasArgument('secret'))$secret = $this->request->getArgument('secret');
        $secret = ($this->request->getQueryParams()['secretid'] ?? 0);
        $key2 = $this->settings['secretkey'] ?? 'default';
$c = base64_decode($secret); 
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC"); 
$iv = substr($c, 0, $ivlen); 
$hmac = substr($c, $ivlen, $sha2len=32); 
$ciphertext_raw = substr($c, $ivlen+$sha2len); 
$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key2, $options=OPENSSL_RAW_DATA, $iv); 
$calcmac = hash_hmac('sha256', $ciphertext_raw, $key2, $as_binary=true); 
if(hash_equals($hmac, $calcmac)){ //PHP 5.6+ Timing attack safe string comparison 
    
    $keyarray = explode('+',$original_plaintext);
    $uid=(int)$keyarray['0'];
    $key1=$keyarray['1'];
    $secretdata = $this->secretsRepository->findByUid($uid);

    $c = base64_decode($secretdata->getSecret()); 
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC"); 
    $iv = substr($c, 0, $ivlen); 
    $hmac = substr($c, $ivlen, $sha2len=32); 
    $ciphertext_raw = substr($c, $ivlen+$sha2len); 
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key1, $options=OPENSSL_RAW_DATA, $iv); 
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key1, $as_binary=true); 
    if(hash_equals($hmac, $calcmac)){ //PHP 5.6+ Timing attack safe string comparison 
        
      $this->view->assign('plaintext', $original_plaintext);
    }else{ 
        $this->view->assign('failed', '1');
    }
    $this->secretsRepository->remove($secretdata);
        $this->persistenceManager->persistAll();
    
  }else{ 
      $this->view->assign('failed', '1');
  }



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
     * @param \WACON\Secrets\Domain\Model\Secrets $newSecrets
     */
    public function createAction(\WACON\Secrets\Domain\Model\Secrets $newSecrets)
    {
         $key2 = $this->settings['secretkey'] ?? 'default';
        $this->secretsRepository->add($newSecrets);
        $this->persistenceManager->persistAll();
        $secretUid = $newSecrets->getUid();
        $key1 = $this->generateRandomString();
        $id=$secretUid.'+'.$key1; 
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC"); 
        $iv = openssl_random_pseudo_bytes($ivlen); 
        $ciphertext_raw = openssl_encrypt($newSecrets->getSecret(), $cipher, $key1, $options=OPENSSL_RAW_DATA, $iv); 
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key1, $as_binary=true); 
 
        $newSecrets->setSecret(base64_encode($iv.$hmac.$ciphertext_raw));
        $this->secretsRepository->update($newSecrets);
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC"); 
        $iv = openssl_random_pseudo_bytes($ivlen); 
        $ciphertext_raw = openssl_encrypt($id, $cipher, $key2, $options=OPENSSL_RAW_DATA, $iv); 
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key2, $as_binary=true); 
 
        $ciphertext = base64_encode($iv.$hmac.$ciphertext_raw);

        $this->view->assign('secrets', $ciphertext);
        $uri = $this->uriBuilder->uriFor('list', ['show' => $ciphertext]);
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($uri);
        return $this->responseFactory->createResponse(307)
            ->withHeader('Location', $uri);
    }

    /**
     * action delete
     *
     * @param \WACON\Secrets\Domain\Model\Secrets $secrets
     */
    public function deleteAction(\WACON\Secrets\Domain\Model\Secrets $secrets)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->secretsRepository->remove($secrets);
        $this->redirect('list');
    }
        /**
    * Generates a random string with $length characters
    *
     * @param int $length Length of the string (optional)
    * @return string
    */
    function generateRandomString($length = 10) {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(implode('', range('!','z')));
        $alphabet = '$%()*,-.0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz';
	    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }
}
