<?php

declare(strict_types=1);

namespace WACON\Secrets\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Kerstin Schmitt <info@wacon.de>
 */
class SecretsTest extends UnitTestCase
{
    /**
     * @var \WACON\Secrets\Domain\Model\Secrets|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \WACON\Secrets\Domain\Model\Secrets::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getSecretReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSecret()
        );
    }

    /**
     * @test
     */
    public function setSecretForStringSetsSecret(): void
    {
        $this->subject->setSecret('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('secret'));
    }
}
