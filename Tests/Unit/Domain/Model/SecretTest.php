<?php

declare(strict_types=1);

namespace Wacon\Secrets\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Philipp Kuhlmay <philipp.kuhlmay@wacon.de>
 */
class SecretTest extends UnitTestCase
{
    /**
     * @var \Wacon\Secrets\Domain\Model\Secret|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Wacon\Secrets\Domain\Model\Secret::class,
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
    public function getBeschreibungReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getBeschreibung()
        );
    }

    /**
     * @test
     */
    public function setBeschreibungForStringSetsBeschreibung(): void
    {
        $this->subject->setBeschreibung('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('beschreibung'));
    }

    /**
     * @test
     */
    public function getKundeReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getKunde()
        );
    }

    /**
     * @test
     */
    public function setKundeForStringSetsKunde(): void
    {
        $this->subject->setKunde('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('kunde'));
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

    /**
     * @test
     */
    public function getSecretKeyReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSecretKey()
        );
    }

    /**
     * @test
     */
    public function setSecretKeyForStringSetsSecretKey(): void
    {
        $this->subject->setSecretKey('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('secretKey'));
    }
}
