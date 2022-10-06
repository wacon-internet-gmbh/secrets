<?php

declare(strict_types=1);

namespace Wacon\Secrets\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Philipp Kuhlmay <philipp.kuhlmay@wacon.de>
 */
class SecretControllerTest extends UnitTestCase
{
    /**
     * @var \Wacon\Secrets\Controller\SecretController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Wacon\Secrets\Controller\SecretController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllSecretsFromRepositoryAndAssignsThemToView(): void
    {
        $allSecrets = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $secretRepository = $this->getMockBuilder(\Wacon\Secrets\Domain\Repository\SecretRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $secretRepository->expects(self::once())->method('findAll')->will(self::returnValue($allSecrets));
        $this->subject->_set('secretRepository', $secretRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('secrets', $allSecrets);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenSecretToView(): void
    {
        $secret = new \Wacon\Secrets\Domain\Model\Secret();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('secret', $secret);

        $this->subject->showAction($secret);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenSecretToSecretRepository(): void
    {
        $secret = new \Wacon\Secrets\Domain\Model\Secret();

        $secretRepository = $this->getMockBuilder(\Wacon\Secrets\Domain\Repository\SecretRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $secretRepository->expects(self::once())->method('add')->with($secret);
        $this->subject->_set('secretRepository', $secretRepository);

        $this->subject->createAction($secret);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenSecretFromSecretRepository(): void
    {
        $secret = new \Wacon\Secrets\Domain\Model\Secret();

        $secretRepository = $this->getMockBuilder(\Wacon\Secrets\Domain\Repository\SecretRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $secretRepository->expects(self::once())->method('remove')->with($secret);
        $this->subject->_set('secretRepository', $secretRepository);

        $this->subject->deleteAction($secret);
    }
}
