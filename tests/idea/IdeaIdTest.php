<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \Idy\Idea\Domain\Model\IdeaId;
use Ramsey\Uuid\Uuid;

class IdeaIdTest extends TestCase
{
    public function testCanBeInstantiated() : void
    {
        $ideaId = new IdeaId();

        $this->assertInstanceOf(IdeaId::class, $ideaId);
    }

    public function testCanGenerateOwnUuidOnNull() : void
    {
        $ideaId = new IdeaId();

        $this->assertTrue(Uuid::isValid($ideaId->id()));
    }

    public function testCanHoldSuppliedUuid() : void
    {
        $ideaId = new IdeaId('7f692713-9d7d-47b0-988d-96e40e8afb54');

        $this->assertEquals('7f692713-9d7d-47b0-988d-96e40e8afb54', $ideaId->id());
    }

}