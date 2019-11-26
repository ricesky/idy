<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \Idy\Idea\Domain\Model\Idea;

class IdeaTest extends TestCase
{

    public function testCanBeInstantiated() : void
    {
        $idea = Idea::makeIdea("my idea", "my description", "John Doe", "john.doe@mail.com");

        $this->assertEquals("my idea", $idea->title());
        $this->assertEquals("my description", $idea->description());
    }
    
}