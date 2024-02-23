<?php

declare(strict_types=1);

namespace WACON\Secrets\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Kerstin Schmitt <info@wacon.de>
 */
class SecretsControllerTest extends UnitTestCase
{
    /**
     * @var \WACON\Secrets\Controller\SecretsController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\WACON\Secrets\Controller\SecretsController::class))
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

        $secretsRepository = $this->getMockBuilder(\WACON\Secrets\Domain\Repository\SecretsRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $secretsRepository->expects(self::once())->method('findAll')->will(self::returnValue($allSecrets));
        $this->subject->_set('secretsRepository', $secretsRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('secrets', $allSecrets);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenSecretsToView(): void
    {
        $secrets = new \WACON\Secrets\Domain\Model\Secrets();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('secrets', $secrets);

        $this->subject->showAction($secrets);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenSecretsToSecretsRepository(): void
    {
        $secrets = new \WACON\Secrets\Domain\Model\Secrets();

        $secretsRepository = $this->getMockBuilder(\WACON\Secrets\Domain\Repository\SecretsRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $secretsRepository->expects(self::once())->method('add')->with($secrets);
        $this->subject->_set('secretsRepository', $secretsRepository);

        $this->subject->createAction($secrets);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenSecretsFromSecretsRepository(): void
    {
        $secrets = new \WACON\Secrets\Domain\Model\Secrets();

        $secretsRepository = $this->getMockBuilder(\WACON\Secrets\Domain\Repository\SecretsRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $secretsRepository->expects(self::once())->method('remove')->with($secrets);
        $this->subject->_set('secretsRepository', $secretsRepository);

        $this->subject->deleteAction($secrets);
    }
}
